# Showcode - Better Retail Category

`/web` - Web API for Manager Panel and Mobile interactions. Controls Single Sign On system.

`/app` - Android OS application for managers to map store boundaries.

`/design` - Any design images and related files

## Running the Web Panel
Prerequisites:
 - Composer 2
 - Docker

Run the commands: 
```
composer update && npm install && npm build dev
```
```
./vendor/bin/sail up
```

### Things to note
For security reasons, Socialite Logins (Facebook, Google, Apple) have been left unfunctional for security reasons. In order to test them, you should create your own API keys and modify the .env file for your own use. 

This panel has been designed with a "mobile first" approach, meaning for best experience, we recommend viewing this on a mobile device, or using developer tools to simulate the appropriate screen sizing.
