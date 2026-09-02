function getBaseOrigin() {
    let origin = self.location.origin;
    if (self.location.pathname.indexOf('/thedigicoders-com') !== -1) {
        return origin + '/thedigicoders-com/';
    }
    return origin + '/';
}

// Universal Service Worker Push Event Handler for VAPID & Web Push
self.addEventListener('push', function(event) {
    console.log('[Service Worker] Push event received:', event);

    var title = 'DigiCoders Notification';
    var body = 'You have a new update from DigiCoders Technologies.';
    var icon = getBaseOrigin() + 'public/assets/images/favicon.png';
    var image = undefined;
    var targetUrl = getBaseOrigin();

    if (event.data) {
        try {
            var data = event.data.json();
            console.log('[Service Worker] Parsed push payload:', data);

            // Handle VAPID payload format
            if (data.title) title = data.title;
            if (data.body) body = data.body;
            else if (data.message) body = data.message;
            if (data.icon) icon = data.icon;
            if (data.image) image = data.image;
            if (data.url) targetUrl = data.url;
            else if (data.onClick) targetUrl = data.onClick;

            // Handle FCM payload format
            if (data.notification) {
                if (data.notification.title) title = data.notification.title;
                if (data.notification.body) body = data.notification.body;
                if (data.notification.icon) icon = data.notification.icon;
                if (data.notification.image) image = data.notification.image;
            }

            if (data.data) {
                if (data.data.title) title = data.data.title;
                if (data.data.body) body = data.data.body;
                else if (data.data.message) body = data.data.message;
                if (data.data.icon) icon = data.data.icon;
                if (data.data.image) image = data.data.image;
                if (data.data.url) targetUrl = data.data.url;
                else if (data.data.onClick) targetUrl = data.data.onClick;
            }
        } catch (e) {
            console.log('[Service Worker] Text push payload:', event.data.text());
            body = event.data.text();
        }
    }

    var options = {
        body: body,
        icon: icon,
        badge: icon,
        data: {
            url: targetUrl
        }
    };

    if (image && typeof image === 'string' && image.length > 5) {
        options.image = image;
    }

    // Direct, rock-solid W3C showNotification
    event.waitUntil(
        self.registration.showNotification(title, options)
    );
});

// Event on click of notification
self.addEventListener('notificationclick', function(event) {
    let targetUrl = (event.notification.data && event.notification.data.url) ? event.notification.data.url : getBaseOrigin();
    event.notification.close();

    if (!targetUrl) targetUrl = getBaseOrigin();

    event.waitUntil(
        clients.matchAll({
            type: 'window',
            includeUncontrolled: true
        }).then(windowClients => {
            for (var i = 0; i < windowClients.length; i++) {
                var client = windowClients[i];
                if (client.url === targetUrl && 'focus' in client) {
                    return client.focus();
                }
            }
            if (clients.openWindow) {
                return clients.openWindow(targetUrl);
            }
        })
    );
});