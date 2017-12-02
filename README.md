# TAMK Media and Art WordPress Theme

TAMK's art and media blogs are moving from Blogger to WordPress. Therefore, we are doing a makeover in order to improve the overall quality of the websites.

## To Do:
- [x] Link styles.
- [x] Category list on index.
- [x] Make the header accessible on scroll up.
- [ ] Information sections on front page that can be edited through the admin panel.
- [x] Post type icons in the blog post gallery.
- [x] Social media links on the post page.
- [ ] Author description on the post page.
- [ ] Like feature on the post page.
- [ ] Design footer.

## Requirements

* This project uses [Vagrant](https://www.vagrantup.com) for a consistent development environment. Follow the instructions in the docs to get started with it.
* To make things even easier, [VCCW](http://www.vccw.cc) is a tool that does all the heavy lifting.
* Webpack and Node.js for managing static assets and transpiling (Babel, minification, SCSS, etc.).

## VM Configuration
* Download and install the tools mentioned above.
* Clone this repository.
* Copy `provision/default.yml` to `site.yml`.
* Edit the `site.yml` and fill out the details regarding the wordpress installation.
* Run `vagrant up`.

## Static Files Handling
* Install [Node.js](https://nodejs.org/en/) LTS or latest.
* Install either [NPM](https://www.npmjs.com) or [Yarn](https://yarnpkg.com) for package managing.
* Once you have either go ahead and run `npm install` or `yarn install`. This will install all the dependencies and packages for building the assets.
* Finally, hit `npm run watch` which starts up webpack and watches for changes in the js and scss folders.
* Navigate to http://vccw.dev/ to view the newly installed WordPress site. You might have to change the themes in the admin panel.

### Note

* The `site.yml` has to be in the same directory with Vagrantfile.
* You can put difference to the `site.yml`.
