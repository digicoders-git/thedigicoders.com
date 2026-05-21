// Capture the basePath dynamically when the script is parsed
const scriptSrc = document.currentScript ? document.currentScript.src : window.location.origin + '/';
const scriptURL = new URL(scriptSrc);
const basePath = scriptURL.pathname.substring(0, scriptURL.pathname.lastIndexOf('/') + 1);

if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    // Dynamically register the service worker from the correct base path
    navigator.serviceWorker.register(basePath + 'sw.js')
      .then(reg => {
        console.log('DigiCoders PWA Service Worker registered successfully:', reg.scope);
      })
      .catch(err => {
        console.log('DigiCoders PWA Service Worker registration failed:', err);
      });
  });
}

