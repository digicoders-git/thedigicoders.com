// Dynamically determine the base path based on where sw.js is hosted
const serviceWorkerPath = self.location.pathname;
const basePath = serviceWorkerPath.substring(0, serviceWorkerPath.lastIndexOf('/') + 1);

const CACHE_NAME = 'digicoders-pwa-cache-v1';
const ASSETS_TO_CACHE = [
  basePath,
  basePath + 'about',
  basePath + 'contact',
  basePath + 'public/assets/images/favicon.png',
  basePath + 'public/assets/css/style.css',
  basePath + 'public/assets/css/typography.css',
  basePath + 'public/assets/css/color/color-1.css',
  basePath + 'public/assets/css/color/color-3.css'
];

// Install Event
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('DigiCoders PWA: Caching basic assets');
        return cache.addAll(ASSETS_TO_CACHE);
      })
      .then(() => self.skipWaiting())
  );
});

// Activate Event
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== CACHE_NAME) {
            console.log('DigiCoders PWA: Clearing old cache');
            return caches.delete(cache);
          }
        })
      );
    }).then(() => self.clients.claim())
  );
});

// Fetch Event (Cache First, Fallback to Network)
self.addEventListener('fetch', event => {
  // Only handle standard http/https GET requests
  if (!event.request.url.startsWith(self.location.origin) || event.request.method !== 'GET') {
    return;
  }

  event.respondWith(
    caches.match(event.request)
      .then(cachedResponse => {
        if (cachedResponse) {
          return cachedResponse;
        }

        return fetch(event.request)
          .then(networkResponse => {
            // Check if response is valid for caching
            if (!networkResponse || networkResponse.status !== 200 || networkResponse.type !== 'basic') {
              return networkResponse;
            }

            // Dynamically cache other GET requests to self-domain
            const responseToCache = networkResponse.clone();
            caches.open(CACHE_NAME)
              .then(cache => {
                cache.put(event.request, responseToCache);
              });

            return networkResponse;
          })
          .catch(() => {
            // Fallback offline support if network fails (dynamic about page)
            return caches.match(basePath + 'about');
          });
      })
  );
});

