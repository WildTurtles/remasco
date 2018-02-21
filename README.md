# Remasco

## Warning, Never use it

By lack of time (money), this project should be see like a proof of concept.
There is several issues. 

1. Role issues (no check server side, etc).
2. Some part of code should be move from controller to model.
3. No Database prefixes support.
4. No Unit or others kind of test.
5. No Release (Tag)

## Requirement, if you want test it
- A Database
- Git 
- [Cakephp 3 requirement](https://book.cakephp.org/3.0/en/installation.html#requirements) 
- Optionnal but fairly recommand a wiki engine for profive courses content.(i use [MediaWiki](https://www.mediawiki.org/wiki/MediaWiki)) 

## Installation 
This installation was test on a debian stable (Stretch) and testing (Buster) with a postgresql database.
The cakephp official readme is include after. You should read all the document before trying anything.

Go in a web server directory.

Retrieve sources.
```bash
git clone https://github.com/WildTurtles/remasco.git
```
go inside the new directory

```bash
cd remasco
```

Install the composer manage requirement.

```bash
composer install --prefer-dist
```
Follow the composer installer but if the user running the project is not a standard one (using mpm_itk module for ie) say no to "Set Folder Permissions ?" and run the following script :

```bash
HTTPDUSER=YourUserName
setfacl -R -d -m u:${HTTPDUSER}:rwx tmp
setfacl -R -m u:${HTTPDUSER}:rwx logs
setfacl -R -d -m u:${HTTPDUSER}:rwx logs
```

I also advice to you to check the [cakephp deployement documentation](https://book.cakephp.org/3.0/en/deployment.html), it provides more useful hints.

## Configuration

### Set up
You have to edit the config/app.php file in order to edit database section. 

When it’s done you can use the online installer with your privacy compliant favorite web-browser.
Go to : https://domain-name.org/remasco if you execute git on the web server root directory.

Fist step should list your configuration php setting and tmp/log rights.

Second step should test the database connection.

Third step will create the database schema and populate it.
You also have to provide some administrator account information.

Fourth step ask you the link to courses aka the wiki.
If the installer stop with a permission issue you should add the write right to your user/group. 

After that the installation is finich and you can sign in the remasco application.

Feel free to contact me for issues. 

### Reset the installation

If you want to reset your installation just drop your database schema (dump your data before if needed).

Change the content of config/install.php to :
```php
<?php
return array (
  'Install' => 
  array (
    'done' => false,
  ),
);
```
And redo the Set Up part.

# Original Cakephp Readme

## CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.

## Layout

The app skeleton uses a subset of [Foundation](http://foundation.zurb.com/) CSS
framework by default. You can, however, replace it with any other library or
custom styles.
