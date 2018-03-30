var CACHE = 'network-or-cache';


//first section invokes workbox js file which is configured to scan for jpg files for them to be cached
//https://developers.google.com/web/tools/workbox/guides/get-started 


importScripts('https://storage.googleapis.com/workbox-cdn/releases/3.0.0/workbox-sw.js');

if (workbox) {
  console.log(`Yay! Workbox is loaded 🎉`);
} else {
  console.log(`Boo! Workbox didn't load 😬`);
}


workbox.routing.registerRoute(
  new RegExp('.*\.jpg'),
  workbox.strategies.networkFirst()
);

//end of workbox jpg file caching

//start of service worker
//https://developers.google.com/web/fundamentals/codelabs/offline/ 

self.addEventListener('install', function(evt) {
  console.log('The service worker is being installed.');

evt.waitUntil(precache());
});

self.addEventListener('fetch', function(evt) {
  console.log('The service worker is serving the asset.');

 evt.respondWith(fromNetwork(evt.request, 400).catch(function () {
    return fromCache(evt.request);
  }));
});

function precache() {
  return caches.open(CACHE).then(function (cache) {
    return cache.addAll([
        'index.php',
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
  });
}

function fromNetwork(request, timeout) {
  return new Promise(function (fulfill, reject) {

 var timeoutId = setTimeout(reject, timeout);

 fetch(request).then(function (response) {
      clearTimeout(timeoutId);
      fulfill(response);

      }, reject);
  });
}

function fromCache(request) {
  return caches.open(CACHE).then(function (cache) {
    return cache.match(request).then(function (matching) {
      return matching || Promise.reject('no-match');
    });
  });
}

