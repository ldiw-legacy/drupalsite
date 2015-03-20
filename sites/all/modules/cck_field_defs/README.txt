
-- SUMMARY --

CCK Field Definitions displays content type fields with their descriptions in
a dictionary format. It also allows users with proper permissions to update
those definitions without having to have the administer nodes permission.

This is especially useful for content types with many (hundreds) fields that
span multiple fieldgroups or multiple pages, allowing the users to see all the
field definitions at a glance.

For a full description visit the project page:
  http://drupal.org/project/cck_field_defs
Bug reports, feature suggestions and latest developments:
  http://drupal.org/project/issues/cck_field_defs


-- REQUIREMENTS --

This module depends on CCK, which can be found here:
  http://drupal.org/project/cck


-- INSTALLATION --

* Install as usual, see http://drupal.org/node/70151 for further information.


-- USE --

Go to http://www.example/com/field_defs to view the field definitions. Don't
forget to enable the 'view definitions' permission.


-- CONFIGURATION --

* Configure user permissions in Administer >> User management >> Access
  control >> cck_field_defs module:

  - administer cck field defs: Allows users to enable/disable the functionality
    in each content type and edit overall administrative settings. 

  - view definitions: Allows users to view the definitions for enabled content
    types.
    
  - edit definitions: Allows users to change field definitions from within the
    dictionary view.

* Customize module settings in Administer >> Site configuration >> Data
  Dictionary.
  
  - Title for definitions page: Set the title that will be displayed when
    users access the definitions page. This will also be the label that will
    appear on the menu.
    
  - Allow labels to be changed?: Allow users to change the display label of
    the field. This should be used with caution, as changing the field label
    to something too diferent that its intended purpose might make old data
    irrelevant.
    
  - Allow descriptions to be changed?: Allow users to change the field
    description. This is the definition that will appear on the definitions
    page. It might be a good idea to leave this as Yes if you have field
    descriptions that are revised periodically.
    
  - Should fieldgroups be collapsed by default?: This collapses the
    fieldgroups on the definitions page. Use this if your content type has too
    many fields so that displaying them all at the same time is ugly.


-- CUSTOMIZATION --

Nothing here...yet.


-- TROUBLESHOOTING --

Nothing here either.


-- FAQ --

Q: I have a Data Dictionary entry in my menu, but the page is empty when I
   click on it.

A: You have to enable the dictionary for each content type you need it for.
   Go to Administer >> Content management >> Content types and enable
   definitions for whichever content type you need. 


-- CONTACT --

Author:
* Victor Kareh (vkareh) - http://www.vkareh.net
