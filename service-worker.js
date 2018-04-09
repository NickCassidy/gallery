

//first section invokes workbox js file which is configured to scan for jpg files for them to be cached
//https://developers.google.com/web/tools/workbox/guides/get-started 


importScripts('https://storage.googleapis.com/workbox-cdn/releases/3.0.0/workbox-sw.js');

if (workbox) {
  console.log(`Yup! Workbox is loaded 🎉`);
} else {
  console.log(`Boo! Workbox didn't load 😬`);
}


workbox.routing.registerRoute(
  /\.(?:png|gif|jpg|jpeg|svg)$/,
  workbox.strategies.cacheFirst({
    cacheName: 'images',
    plugins: [
      new workbox.expiration.Plugin({
        maxEntries: 200,
        maxAgeSeconds: 30 * 24 * 60 * 60, // 30 Days
      }),
    ],
  }),
);

workbox.routing.registerRoute(
  /\.(?:js|css|php|json)$/,
  workbox.strategies.staleWhileRevalidate({
    cacheName: 'static-resources',
  }),
);




//start of service worker
//https://blog.angular-university.io/service-workers/

const VERSION = 'v1';


self.addEventListener('install', event => event.waitUntil(installServiceWorker()));


async function installServiceWorker() {

    log("Service Worker installation started ");

    const cache = await caches.open(getCacheName());

    return cache.addAll([
        '/',
        'index.php',
        './manifest/manifest.json',
        './portfolio/index.php',
        './portfolio/config.xml',
        './portraits/index.php',
        './portraits/config.xml',
        './posters/index.php',
        './posters/config.xml',
        './archive/index.php',
        './archive/config.xml',
        './ella/index.php',
        './ella/config.xml',
        './css/gallery.css',
        './css/homeAndContact.css',
        './css/theme.css',
        './images/home/lionking-398w.jpg',
        './images/home/lionking-195w.jpg',
        './images/home/fs-398w.jpg',
        './images/home/fs-195w.jpg',
        './images/home/oac-398w.jpg',
        './images/home/oac-195w.jpg',
        './images/home/equus-398w.jpg',
        './images/home/equus-195w.jpg',
        './images/home/ella-398w.jpg',
        './images/home/ella-195w.jpg'

    ]);
}

self.addEventListener('activate', () => activateSW());


async function activateSW() {

    log('Service Worker activated');

    const cacheKeys = await caches.keys();

    cacheKeys.forEach(cacheKey => {
        if (cacheKey !== getCacheName() ) {
            caches.delete(cacheKey);
        }
    });

}


self.addEventListener('fetch', event => event.respondWith(cacheThenNetwork(event)));


async function cacheThenNetwork(event) {

    const cache = await caches.open(getCacheName());

    const cachedResponse = await cache.match(event.request);

    if (cachedResponse) {
        log('Serving From Cache: ' + event.request.url);
        return cachedResponse;
    }

    const networkResponse = await fetch(event.request);

    log('Calling network: ' + event.request.url);

    return networkResponse;

}

function getCacheName() {
    return "app-cache-" + VERSION;
}


function log(message, ...data) {
    if (data.length > 0) {
        console.log(VERSION, message, data);
    }
    else {
        console.log(VERSION, message);
    }
}