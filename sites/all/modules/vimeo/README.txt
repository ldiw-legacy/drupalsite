# $Id: README.txt,v 1.1.2.2 2010/04/19 17:41:41 starnox Exp $

==============================
Required Modules
==============================

 - CCK (http://drupal.org/project/cck)
 - Image API (http://drupal.org/project/imageapi)
 - ImageCache (http://drupal.org/project/imagecache)
 - jQuery UI (http://drupal.org/project/jquery_ui) [Must be 1.3]

Note: cURL PHP Library is also required (http://www.php.net/manual/en/book.curl.php).

==============================
Installation
==============================

 1. Drop the 'vimeo' folder into the modules directory (/sites/all/modules/)
 2. Enable the 'Vimeo' module found in the CCK category (?q=admin/build/modules)
 3. Add at least one source (?q=/admin/settings/vimeo/add-new-source)
 4. Add the Vimeo CCK field to one of your content types (?q=admin/content/types)
 5. Setup your permissions (?q=/admin/user/permissions)

==============================
Customise
==============================

You can highly customise exactly what you see when you insert a video into your node through the custom CCK formatter. To enabled and setup the custom formatter follow these steps:

 1. Change the display format to 'Custom' (?q=admin/content/node-type/{content-type-name}/display/basic)
 2. Copy the 'vimeo_custom_formatter.tpl.php' file from (/sites/all/modules/vimeo/theme/) and drop it in your theme folder (/sites/all/themes/{theme-name}/)
 3. Customise the file and include any variables you want (you may need to flush your cache to see changes take effect).

==============================
To Do
==============================

 - Check CSS & JS in IE7 & IE8.
 - Tidy up code

==============================
Support
==============================

If you have any questions, issues, or feature suggestions then please do leave feedback on the project page (http://drupal.org/project/vimeo)