# P.One PHP Framework
This is my simple implementation of the MVC pattern for building web applications in PHP.
It's not all done yet, but it's available to helping others to understanding the pattern. 

**Under construction!**


### Requirements
You'll need:

- a webserver with PHP 7.2.0 or higher 
- the possibility to rewrite a URL (IIS, Apache, Nginx, etc). 

You also can use [composer](https://getcomposer.org/) for PSR-4 pre-loading and package management.

### Instructions
There is two ways to use this:

1. Cloning this repo;
2. Download as .zip file to your project root directory.

After, run composer update to generate the needed PSR-4 preloading files or insert an autoload yourself.

This framework use htaccess ([Apache](https://httpd.apache.org/)) by default. If you need to other server, please use the correct file based on your setup.

### Directory Structure

>`App`
>
>>`Controllers` *Application Controllers*
>>
>>`Models` *Application Models*
>>
>>`Views` *Application Views*
>
-
>`Core`
>
>>`Config` *Configurations file*
>>
>>`libs` *Libraries*
>>
>
-
>`public`
>
>>`css` *Style files*
>>`js` *Javascript files*

### Let's start it!
So, enjoy it! :-)