var CACHE = 'network-or-cache';


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
      'index.html',
        './portfolio/index.html',
        './portfolio/config.xml',
        './portraits/index.html',
        './portraits/config.xml',
        './posters/index.html',
        './posters/config.xml',
        './archive/index.html',
        './archive/config.xml',
        './ella/index.html',
        './ella/config.xml',
        './css/common.css',
        './css/theme.css',
        './images/home/lionking-398w.jpg',
        './images/home/lionking-195w.jpg',
        './images/home/fs-398w.jpg',
        './images/home/fs-195w.jpg',
        './images/home/equus-398w.jpg',
        './images/home/equus-195w.jpg',
        './images/home/oac-398w.jpg',
        './images/home/oac-195w.jpg',
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

