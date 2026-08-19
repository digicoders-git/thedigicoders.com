// Dynamically determine the base path based on where sw.js is hosted
const serviceWorkerPath = self.location.pathname;
const basePath = serviceWorkerPath.substring(0, serviceWorkerPath.lastIndexOf('/') + 1);

const CACHE_NAME = 'digicoders-pwa-cache-v2';
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

// Fetch Event (Network First, Fallback to Cache for Offline Support)
self.addEventListener('fetch', event => {
  // Only handle standard http/https GET requests
  if (!event.request.url.startsWith(self.location.origin) || event.request.method !== 'GET') {
    return;
  }

  event.respondWith(
    fetch(event.request)
      .then(networkResponse => {
        // If response is valid, save updated copy to cache for offline fallback
        if (networkResponse && networkResponse.status === 200 && networkResponse.type === 'basic') {
          const responseToCache = networkResponse.clone();
          caches.open(CACHE_NAME).then(cache => {
            cache.put(event.request, responseToCache);
          });
        }
        return networkResponse;
      })
      .catch(() => {
        // If offline / network request fails, serve from cache
        return caches.match(event.request).then(cachedResponse => {
          if (cachedResponse) {
            return cachedResponse;
          }
          return caches.match(basePath + 'about');
        });
      })
  );
});


