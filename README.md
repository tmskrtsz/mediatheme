# TAMK Media and Art WordPress Theme

TAMK's art and media blogs are moving from Blogger to WordPress. Therefore, we are doing a makeover in order to improve the overall quality of the websites.

## To Do:
- [x] Link styles.
- [x] Category list on index.
- [x] Make the header accessible on scroll up.
- [x] Information sections on front page that can be edited through the admin panel. (ACF)
- [x] Add section for important links and announcements. (ACF)
- [x] Post type icons in the blog post gallery.
- [x] Social media links on the post page.
- [x] Author description on the post page.
- [x] Like feature on the post page.
- [ ] Design footer.
- [ ] Responsive Design.
- [ ] Make the logo replaceable from the dashboard.
- [x] Sidebar scrolling and body overflow.
- [ ] Add newsletter signup form.

## Requirements

* This project is using [Docker](http://docker.com) container.
* Webpack and Node.js for managing static assets and transpiling (Babel, minification, SCSS, etc.).

## VM Configuration
* Download and install the tools mentioned above.
* Clone this repository.
* Running `docker-compose up` will start the instance and hopefully get everything online.

## Static Files Handling
* Install [Node.js](https://nodejs.org/en/) LTS or latest.
* Install either [NPM](https://www.npmjs.com) or [Yarn](https://yarnpkg.com) for package managing.
* Once you have either go ahead and run `npm install` or `yarn install`. This will install all the dependencies and packages for building the assets.
* Finally, hit `yarn watch` which starts up webpack and watches for changes in the js and scss folders.
* Navigate to http://localhost:8080 to view the newly installed WordPress site. You might have to change the themes in the admin panel.
