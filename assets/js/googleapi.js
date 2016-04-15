// Specify your actual API key here:
var API_KEY = 'AIzaSyC3Bvek-NqzVNwJFhAFzD8O_isTyHtyjh0';

// Specify the URL you want PageSpeed results for here:
var URL_TO_GET_RESULTS_FOR = 'http://www.handaragolfresort.com/';

var API_URL = 'https://www.googleapis.com/pagespeedonline/v2/runPagespeed?';
var CHART_API_URL = 'http://chart.apis.google.com/chart?';

// Object that will hold the callbacks that process results from the
// PageSpeed Insights API.
var callbacks = {}

// Invokes the PageSpeed Insights API. The response will contain
// JavaScript that invokes our callback with the PageSpeed results.
function runPagespeed(url, strategy) {
  var s = document.createElement('script');
  s.type = 'text/javascript';
  s.async = true;
  var query = [
    'url=http://' + url,
    'callback=runPagespeedCallbacks',
    'key=' + API_KEY,
    'strategy=' + strategy,
    'screenshot=true'
  ].join('&');
  s.src = API_URL + query;
  document.head.insertBefore(s, null);
  console.log(s);
}

// Our JSONP callback. Checks for errors, then invokes our callback handlers.
function runPagespeedCallbacks(result) {
  if (result.error) {
    var errors = result.error.errors;
    for (var i = 0, len = errors.length; i < len; ++i) {
      if (errors[i].reason == 'badRequest' && API_KEY == 'yourAPIKey') {
        alert('Please specify your Google API key in the API_KEY variable.');
      } else {
        // NOTE: your real production app should use a better
        // mechanism than alert() to communicate the error to the user.
        alert(errors[i].message);
      }
    }
    return false;
  }

  // Dispatch to each function on the callbacks object.
  for (var fn in callbacks) {
    var f = callbacks[fn];
    if (typeof f == 'function') {
      callbacks[fn](result);
    }
  }
}
