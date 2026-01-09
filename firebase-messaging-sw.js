importScripts('https://www.gstatic.com/firebasejs/7.18.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.18.0/firebase-messaging.js');

var firebaseConfig = {
	apiKey: "AIzaSyAdt6Ogu5s4rf0yV42r-FszfIiLB50IHOE",
    authDomain: "thedigicoders-website-8fcb0.firebaseapp.com",
    projectId: "thedigicoders-website-8fcb0",
    storageBucket: "thedigicoders-website-8fcb0.appspot.com",
    messagingSenderId: "207041730023",
    appId: "1:207041730023:web:ffe0c75170747693f55942",
    measurementId: "G-Y7WPYKLX10"
};

firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

messaging.usePublicVapidKey("BHDhu_2aoGaCKuMLTtrBu-WIIgf6CCyznjd-F5Apk1jkq0A6yaJrjItDwNsiVsU_-ReaSvzcj5XfpOUZn8IZ5zo");

messaging.onBackgroundMessage(function(payload) {
    const notificationTitle = payload.data.title;
    const notificationOptions = {
	body: payload.data.message,
    	icon: './public/assets/images/favicon.png',
    	data: {
    		    url: payload.data.onClick
    	    }, //the url which we gonna use later
    };
	return self.registration.showNotification(notificationTitle, notificationOptions);
});

//Code for adding event on click of notification
self.addEventListener('notificationclick', function(event) {
	let url = event.notification.data.url;
	event.notification.close();
	event.waitUntil(
	    clients.matchAll({
				type: 'window'
			}).then(windowClients => { 
			    // Check if there is already a window/tab open with the target URL
			    for (var i = 0; i < windowClients.length; i++) 
			    {
			        var client = windowClients[i];
			        // If so, just focus it.
			        if (client.url === url && 'focus' in client) {
			            return client.focus();
			        }
			    }
			    // If not, then open the target URL in a new window/tab.
			    if (clients.openWindow) {
			        return clients.openWindow(url);
			    }
			})
		);
    });