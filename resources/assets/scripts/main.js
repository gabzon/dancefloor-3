// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

import 'bootstrap/js/dist/dropdown';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import videos from './routes/videos';
import program from './routes/program';
import react from './routes/react';
import schedule from './routes/schedule';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  // Videos page
  videos,
  // Program page
  program,
  // React test of multifilters
  react,
  //
  schedule,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
