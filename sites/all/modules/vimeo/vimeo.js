// $Id: vimeo.js,v 1.1.2.2 2010/02/20 11:10:32 starnox Exp $

/**
 * @file vimeo.js
 *
 * All the javascript for Vimeo
 */

/**
 * Make things happen on page load
 */
Drupal.behaviors.vimeo = function(context) {
  var protection = false;

  // Add on click function for browse button
  vimeo_browse();
  
  // Add on click function for remove button
  vimeo_remove();
  
  // Add on click function for refresh button
  vimeo_refresh();
  
  // Add on click function for insert button
  vimeo_insert();
  
  // Add on submit to code insert form
  vimeo_code_insert();
  
  // Add on focus to code insert field
  vimeo_helper();
  
  // Add on click function to sources
  $("a.vimeo-source").click(function() {
    if (protection == true) { return false }
    protection = true;
    //Change active source
  	$("a.vimeo-source").removeClass('active');
  	$(this).addClass('active');
  	
  	//Show loading message
  	$('#vimeo-view').hide();
  	$('#vimeo-loading').show();
  	
    //Get details
    var url = $(this).attr("href");
    var instance = url.split('/');
    
    $('#vimeo-view').load(Drupal.settings.basePath + 'index.php?q=vimeo/videos/' + instance[0] + '/' + instance[1] + '/' + instance[2] + '/' + instance[3] + '/' + instance[4], function() {
      vimeo_insert();
      $('#vimeo-view').show();
      $('#vimeo-loading').hide();
      protection = false;
    });
    
    return false;
  });
  
  // Add default loading
  vimeo_default();
}

/**
 * Open jQuery UI dialog box.
 */
function vimeo_dialog_open(instance) {
  var url = 'index.php?q=vimeo/browser/' + instance[0] + '/' + instance[1] + '/' + instance[2];
  $("body").append('<div id="vimeo-browser"><iframe id="vimeo-browser-frame" src="' + Drupal.settings.basePath + url + '" width="640" height="420" frameborder="0" /></div>');
  $("#vimeo-browser").dialog({ modal: true, height: 450, width: 640, title: 'Vimeo Browser', beforeclose: function(event, ui) { vimeo_dialog_close(); } }).show();
}

/**
 * Close jQuery UI dialog box.
 */
function vimeo_dialog_close() {
  $("#vimeo-browser").remove();
}

/**
 * Update CCK field via AHAH.
 */
function vimeo_ahah(instance) {
  $('.vimeo-container-field-' + instance[0] + '-' + instance[1]).load(Drupal.settings.basePath + 'index.php?q=vimeo/ahah/insert/' + instance[0] + '/' + instance[1] + '/' + instance[2] + '/' + instance[3], function() {
    vimeo_dialog_close();
    vimeo_remove();
    vimeo_refresh();
  });
}

/**
 * Add triggers to videos for inserting.
 */
function vimeo_insert() {
  $("a.vimeo-insert").click(function() {
    //Get details
    var url = $(this).attr("href");
    var instance = url.split('/');
    
    //Inserting message
    $('#vimeo-view').hide();
    $('#vimeo-inserting').show();
    
    //Update CCK Field && Close Browser
    parent.vimeo_ahah(instance);
    
    return false;
  });
}

function vimeo_remove() {
  $(".vimeo-options > a.remove").click(function() {
    var url = $(this).attr("href");
    var instance = url.split('/');
    
    $('.vimeo-container-field-' + instance[0] + '-' + instance[1]).load(Drupal.settings.basePath + 'index.php?q=vimeo/ahah/remove/' + instance[0] + '/' + instance[1] + '/' + instance[2] + '/' + instance[3], function() {
      vimeo_browse();
    });
    
    return false;
  });
}

function vimeo_browse() {
  $(".vimeo-options > a.browse").click(function() {
    var url = $(this).attr("href");
    var instance = url.split('/');
    vimeo_dialog_open(instance);
    return false;
  });
}

function vimeo_refresh() {
  $(".vimeo-options > a.refresh").click(function() {
    var url = $(this).attr("href");
    var instance = url.split('/');
    
    $('.vimeo-container-field-' + instance[0] + '-' + instance[1]).load(Drupal.settings.basePath + 'index.php?q=vimeo/ahah/insert/' + instance[0] + '/' + instance[1] + '/' + instance[2] + '/' + instance[3], function() {
      vimeo_remove();
      vimeo_refresh();
    });
    return false;
  });
}

function vimeo_code_insert() {
  $("#vimeo-url-form").submit(function(){
    var url = $("#vimeo-url-form").attr('action');
    var instance = url.split('/');
    
    var id = $("#vimeo-url").val();
    var id = id.split('/');
    var id = id[id.length-1];
    instance.push(id);
    
    //Inserting message
    $('#vimeo-view').hide();
    $('#vimeo-inserting').show();
    
    //Update CCK Field && Close Browser
    parent.vimeo_ahah(instance);
    
    return false;
  });
}

function vimeo_helper() {
  $("#vimeo-url").focus(function(){
    $("#vimeo-url").val('');
  });
}

function vimeo_default() {
  var url = $("#vimeo-nav .default").click(); 
}