//const baseUrl = window.location.href;
const baseUrl = 'https://www.buena-vista.me/';
//const baseUrl = 'https://www.dancefloorgenevasalsa.ch/';
//const baseUrl = 'http://localhost/dancefloor/web/';

const apiPath = 'wp-json/df-rest-api/course';
const levelApi = 'wp-json/wp/v2/level';
const dayApi = 'wp-json/wp/v2/day_of_week';
const locationApi = 'wp-json/wp/v2/classroom';
const styleApi = 'wp-json/wp/v2/style';
let dataURL = '';

if (baseUrl === 'http://localhost:3000/') {
  dataURL = 'http://localhost/dancefloor/web' + apiPath;
} else {
  dataURL = baseUrl + apiPath;
}

export {baseUrl, apiPath, levelApi, dayApi, locationApi, styleApi, dataURL}
