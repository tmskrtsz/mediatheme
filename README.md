# TAMK Media and Art WordPress Theme

TAMK's art and media blogs are moving from Blogger to WordPress. Therefore, we are doing a makeover in order to improve the overall quality of the websites.

## Requirements 

* This project uses [Vagrant](https://www.vagrantup.com) for a consistent development environment. Follow the instructions in the docs to get started with it.
* To make things even easier, [VCCW](http://www.vccw.co) is a tool that does all the heavy lifting.
* Node.js for managing static assets and transpiling (Babel, minification, SCSS, etc.).

## Configuration
* Download and install the tools mentioned above
* Copy `provision/default.yml` to `site.yml`.
* Edit the `site.yml` and fill out the details regarding the wordpress installation.
* Run `vagrant up`.

### Note

* The `site.yml` has to be in the same directory with Vagrantfile.
* You can put difference to the `site.yml`.
