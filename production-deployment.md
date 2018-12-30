# Production Deployment

We will host our server using DigitalOcean and use Forge for continuous integration with Git and DB and environment variable management.

[This article](http://selfteach.me/forge-wordpress-digital-ocean/) provides a detailed overview of how to setup continuous WP deployment with DigitalOcean and Laravel Forge.

General steps summarized as follows:
1. Create a Digital Ocean account. [Click here for coupon codes](https://gist.github.com/dexbyte/fb13e994ad180ce86c654cae1ce7d14f)
2. [Register for a Forge account (5 day free trial)](https://forge.laravel.com/auth/register)
3. Follow setup instructions on Forge to connect to github and your Digital Ocean account
4. Create a new server (select the smallest droplet 1GB RAM). It will take 5 mins to provision
5. Install the repo by entering the git repo and branch. Enable Quick Deploy for auto deploy
6. Click on edit files at the bottom of the page and select Edit NGINX Configuration. Remove /public from the address i.e. `root home/forge/domain.com/public;`. Click save
7. Create a composer.json file and insert the script below then run composer install. This is a package to enable us to access .env variables
```php
// composer.json
{
  "name": "ericlbarnes/wp",
  "require": {
    "vlucas/phpdotenv": "^2.2"
  },
  "authors": [{
    "name": "Eric L. Barnes",
    "email": "me@mysite.com"
  }]
}
```
8. Create a .env file and include the relevant environment variables for your local development. Remember to also put this into .gitignore as in production we will be using the Forge console to insert our production .env file
```php
//.env
DB_NAME=wordpress_local
DB_USER=root
DB_PASSWORD=root
```
9. Then in our wp-config.php file
```php
// wp-config.php
<?php
// This code is important to call the .env helper package from our vendors folder
require_once(__DIR__ . '/./vendor/autoload.php');
(new \Dotenv\Dotenv(__DIR__.'/./'))->load();

// ** MySQL settings - You can get this info from your web host ** //
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
...

```
10. Deploy this to master branch then log into your Forge console and find the Database tab. Create a new DB.
11. Go to the environments tab in Forge and click edit .env file. Then enter in the relevant DB variables. The DB name will be the one you just created and the DB_USER and DB_PASSWORD were provided in the automatic email when you created your server.
12. Click deploy