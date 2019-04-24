### 9.0.7: December 28th, 2018
*


# [Dancefloor](http://www.dancefloorgenevasalsa.ch/)

Dancefloor 2 is a WordPress theme the dancefloor danceschool. It is based on the [Roots Sage Started theme](https://roots.io/sage/)

## Plugins & Requirements

* [WordPress](https://wordpress.org/) >= 4.7
* [PHP](http://php.net/manual/en/install.php) >= 7.0
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 6.9.x
* [Yarn](https://yarnpkg.com/en/docs/install)
* [Sage](https://github.com/roots/sage) >= 9.0
* [Piklist](https://piklist.com/) >= 0.9.9
* SEO framework
* [Favorite Posts](https://favoriteposts.com/) >= 2.1.6

## Version 3.0
<!-- * Dancefloor app
* Posts + Notifications
* Schedule -->

## Version 2.5

<!-- * Change loop from cpt to taxonomy -->
<!-- * move teachers.php to class in controller -->
<!-- * Video templates info toolbox added with location -->
<!-- * Video templates share buttons -->
<!-- check google calendar integration -->
<!-- * Schedule template add link to course, teacher, Classroom, share buttons and Inscription
* Create People profile pages
* Add add_more for teachers in the teachers dropdown menu -->
<!-- * choose color for footer and header  -->
<!-- should we add email and phone number of the teacher in class description when user is logged in? -->

## Version 2.4
<!-- * Add Favorite posts -->
<!-- * Adapt favorite posts to be Inscription -->


## Meeting
- Authentification (Facebook/google)
- Inscription buttons
- Figures (Cadre - Gif - Histoire)
- Programme du cours
- Graphic multicolors
- Ajouter un text quand les stages sont vides (et partout ou il y a une boucle)
- Youtube Channel
- Faire disparaitre cours lorsqu'il y a Plus selon date
- Liste de presence
- Improve User profile
- Documentation
- Database steps
- Define skills/talents
- Franchise

## Version 2.6
* debug: react schedule {this.props.course.location[0].name} -> {this.props.course.classroom }

## Version 2.5
* Removed teachers templates
* Removed teachers.php from app folder
* Update sage, boostrap and dependencies
* Improve mobile blog page display
* Contact page added form BV (list of places)
* member social icons improved
* Member profile page added

## Version 2.4
* Featured image url added to WP Rest API in "app/api/feature_image"
* Figures custom post type created
* Program template for Figures post type created
* Add alert message on Schedule page
* translation Serbian language
* Added support for changing the logo
* Separete colors for classes
* Teacher title (roles)
* display Schedule mobile
* display feature image in course single
* Added Team template
* added new section for team page, team sorting

## Version 2.3
* Display correct Form according to the classes/Workshops , needs gravity form id (Default '23')
* Fix youtube problem homepage
* fix pricing display problem for workshops with multi pricing
* display a list of levels
* display list of days in the right order
* Displays only one date in case begining day and end date is the same

## Version 2.2
* Apperance > Settings added with 4 tabs [General | Social Media | Design(coming soon) | Pricing ]
* Dynamic pricing
* Fix sidebar problem
* Migration from fontawesome 4 > fontawesome 5
* Change and integrate classroom cpt to taxonomy
* transform and integrate day to taxonomy, now slug = day_of_week
* Course dashboard filters by taxonomies (day, level, style, classroom)
* Phone number added to menu
* Fullwidth layout created
* Fullwidth added to homepage layout
* lang folder created in "resources/lang"
* instagram link added to footer
* integration of setting page to theme
* dynamics social links integrated to the setting page
* Dynamic pricing (if price and currency not set, use default price + currency)
* Debugged: Schedule title and Thursday title
* Schedule is ordered by hour of classes automatically

## Version 2.1
* Stage/Workshops pages added
* Videos pages improve with youtube Videos
* cadre noir homepage
* Menu width fixed

## Version 2

* Custom Post Type df_Videos
* Replace Semantic-UI CSS framework with Twitter Bootstrap
* Tachyons CSS included
* New Header menu
* New SVG Logo
* Footer Social icons improved
* Footer contact information centered
* Teachers template improved (bootstrap grid, and card, with hover effect)
* Upgrade from Sage 8 to Sage 9
* Price page updated (new design)
* All buttons updated
* Form typography increased
* Update server from PHP 5.6 to PHP 7.1

## Version 1

* Custom Post Type Classroom
* Custom Post Type Course
* Home Page Template
* Semantic-UI Integrated
* PNG Dancefloor Logo
* Redisign of complete website
* Teachers template created
* Schedule template created
* Integration of Piklist

## Features

* Sass for stylesheets
* ES6 for JavaScript
* [Webpack](https://webpack.github.io/) for compiling assets, optimizing images, and concatenating and minifying files
* [Browsersync](http://www.browsersync.io/) for synchronized browser testing
* [Laravel Blade](https://laravel.com/docs/5.3/blade) as a templating engine
* [Controller](https://github.com/soberwp/controller) for passing data to Blade templates
* CSS framework options:
* [Bootstrap 4](http://getbootstrap.com/)
* [Tachyons](http://tachyons.io/)
* Font Awesome

CRUD Management of courses (CPT)
CRUD Management of classrooms (taxonomy)
CRUD Management of classrooms (Level)
CRUD Management of classrooms (Styles)
CRUD Management of classrooms (Day)

## Documentation

Sage 8 documentation is available at [https://roots.io/sage/docs/](https://roots.io/sage/docs/).

Sage 9 documentation is currently in progress and can be viewed at [https://github.com/roots/docs/tree/sage-9/sage](https://github.com/roots/docs/tree/sage-9/sage).

Controller documentation is available at [https://github.com/soberwp/controller#usage](https://github.com/soberwp/controller#usage).
