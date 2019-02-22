//const hostname = window.location.href;
const hostname = window.location.hostname;

//const baseUrl = 'https://www.buena-vista.me/';
//const baseUrl = 'https://www.dancefloorgenevasalsa.ch/';
//const baseUrl = 'http://localhost/dancefloor/web/';
//let baseUrl = 'http://localhost/dancefloor/web/';
let baseUrl = 'https://www.buena-vista.me/';
const apiPath = 'wp-json/df-rest-api/course';
const levelApi = 'wp-json/wp/v2/level';
const dayApi = 'wp-json/wp/v2/day_of_week';
const locationApi = 'wp-json/wp/v2/classroom';
const styleApi = 'wp-json/wp/v2/style';
let dataURL = '';

if (hostname === 'localhost') {
  dataURL = 'https://www.buena-vista.me/' + apiPath;
} else if (hostname === 'www.buena-vista.me') {
  baseUrl = 'https://www.buena-vista.me/';
  dataURL = 'https://www.buena-vista.me/' + apiPath;
} else if (hostname === 'www.dancefloorgenevasalsa.ch'){
  baseUrl = 'https://www.dancefloorgenevasalsa.ch/';
  dataURL = 'https://www.dancefloorgenevasalsa.ch/' + apiPath;
} else {
  dataURL = baseUrl + apiPath;
}

const url = {
  apiKey:'AIzaSyBD9A5ryoTl0-1FB5ktY-TzVf70qkpucJA',
  gzClientID: '273028042455-jtqdk6fol32ebkb3p56l7o5t7hb53jcn.apps.googleusercontent.com',
  clientID: 'AIzaSyAOYG1Ai4mZy6L-ifZgQ8bzS87vA6v3JdA',
  channelID: 'UCXgGY0wkgOzynnHvSEVmE3A',
  bvChannelID: 'UCY35x-Zq2qqgWubuDPSzLGA',
  gzChannelID: 'UCht8-pEFkJv40lNfMmKP0Qw',
  dfChannelID: 'UCPHPIzyomTiHI9uRuRfbsLQ',
  nbResults: 50,
  ytBaseUrl: 'https://www.googleapis.com/youtube/v3',
  frameUrl: 'https://www.youtube.com/embed/',
}

export {baseUrl, apiPath, levelApi, dayApi, locationApi, styleApi, dataURL, url};
