Gallery CMS
===========

Info
----
A CMS to manage your images and push it on a network

Features
--------

 + Multiple image uploader
 + Drag and drop ordering
 + User management
 + Feed organizer

Dependencies
------------

 + PHP >= 5.2
 + MySQL Database
 + GD2 Library enabled

You'll need to have the following items installed before continuing.

  * [Node.js](http://nodejs.org): Use the installer provided on the NodeJS website.
  * [Grunt](http://gruntjs.com/): Run `[sudo] npm install -g grunt-cli`
  * [Bower](http://bower.io): Run `[sudo] npm install -g bower`


## Quickstart

1. Create a MySQL database.

2. Edit application/config/database.php and enter your database credentials.

3. Upload to your webserver.

4. Navigate to the URL of which you uploaded the application and complete the registration. Creating your account will generate all of the database tables and finish the installation.

for SASS and Grunt Files
-------------------------

```bash
git clone git@github.com:zurb/foundation-libsass-template.git
npm install && bower install
```

While you're working on your project, run:

`grunt`

And you're set!

## Directory Structure

  * `scss/_settings.scss`: Foundation configuration settings go in here
  * `scss/app.scss`: Application styles go here

Known Issues
------------
PNG Uploads fail. This is a known CodeIgniter 2.1 issue.