<?php
define('CONFIG_FILE_LOCATION', 'lib/Config.class.php', true);
if(file_exists(CONFIG_FILE_LOCATION))
{
	require CONFIG_FILE_LOCATION;
	require 'lib/Database.class.php';
	require 'lib/Main.class.php';
}
else
{
	die("Error!");
}
$config = new Config();
$main = new Main($config);
require_once("lib/facebook.php");
$auth_url = "https://www.facebook.com/dialog/oauth?client_id="  . $config->fb->id . "&redirect_uri=" . urlencode($config->fb->canvas);
$facebook = new Facebook(array(
  'appId'  => $config->fb->id,
  'secret' => $config->fb->secret,
  'cookie' => true,
));
$user = $facebook->getUser();
session_start();
$_SESSION['fb-user-id'] = $user;
if(in_array($_SESSION['fb-user-id'], $config->admins)) {
	$admin = true;
}
$signed_request = $_POST['signed_request'];
if(empty($signed_request)) {
	header("Location:" . $config->fb->tab);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Page title</title>
  <link href="css/default.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-1.8.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
	<script src="js/html5.js"></script>
  <![endif]-->
</head>
<body>
  <script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
  <script type="text/javascript" charset="utf-8">
   window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?php echo $config->fb->id; ?>',
      status     : true,
      cookie     : true,
      oauth      : true,
      xfbml      : true 
    });
    FB.Canvas.setSize({ width: 800, height: 1145 });
    FB.Canvas.setAutoResize();	
   };
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
   $(document).ready(function(e) {
	   var $cat = 0
	   var $sending = false;
	   var $getting = false;
	   $('#tabArea li').click(function (event) {
			event.preventDefault();
			if($('#tabArea .current-item').get(0) != $(this).get(0) && !$getting) {
				$('#tabArea .current-item').removeClass('current-item');
				$(this).addClass('current-item');
				$cat = $(this).index();
	   			update();
			}
	   });
	   $('#overlay-menu li').click(function (event) {
			event.preventDefault();
			if($('#overlay-menu .current-item').get(0) != $(this).get(0) && !$getting) {
				$('#overlay-menu .current-item').removeClass('current-item');
				$(this).addClass('current-item');
				if($(this).index() > 0) {
					$('#entry-link').stop(true).fadeIn('fast');
				}else {
					$('#entry-link').stop(true).fadeOut('fast');
				}
			}			
	   });
	   $('#entry-types li').click(function (event) {
		  	event.preventDefault();
			if($('#entry-types .current-item').get(0) != $(this).get(0) && !$getting) {
				$('#entry-types .current-item').removeClass('current-item');
				$(this).addClass('current-item');
	   			update();
			}
	   });
	   $('.btn-share').click(function (event) {
			event.preventDefault();
			FB.ui({
				method: 'feed',  
				link: '<?php echo $config->fb->tab; ?>',
				name: 'Lets do it',
				caption: 'HOW?',
				description: 'A competition and know-how sharing space on how to make our world a cleaner place for everybody with the resources available to us! Share the ideas you want the world to follow!',
				picture: '<?php echo $config->fb->img; ?>',
				message: ' '
			});  
	   })
	   $('#open-adding-popup').click(function (event) {
			event.preventDefault();
			if(login()) {
				$('#regular-overlay').stop(true).fadeIn("fast");
				$('#regular-overlay').find('#group' + $cat).attr('checked', true);;
				$('#entry-text').val('Write your own comment here...');
				$('#entry-link').val('Your URL...');
			}
	   });
	   $('#regular-overlay .btn-add').click(function (event) {
			event.preventDefault();
			if(login() && !$sending) {
				$sending = true;
				$text = $('#entry-text').val();
				$link = $('#entry-link').val();
				if($text != 'Write your own comment here...' && $text != '') {
					$('#entry-text').removeClass('iError');
					$('#regular-overlay .btn-add').button('loading');
					if($('#overlay-menu .current-item').index() == 0 || $link == 'Your URL...') {
						$link = '';
					}
					$.post('post.php', { 'letsdoit' : 'how', 'text' : $text, 'link' : $link, 'cat' : $('input[name=group]:checked').val()  }, function (data) {
						if(data == 1) {
							get();
						} else {
							error(data);
						}
						$('#regular-overlay').stop(true).fadeOut("slow");
						$('#regular-overlay .btn-add').button('reset');
						$sending = false;
					});
				} else {
					$('#entry-text').addClass('iError');
					$('#regular-overlay .btn-add').button('reset');
					$sending = false;
				}
			}
	   });
	   $('.btn-vote').click(function (event) {
			event.preventDefault();
	   });
	   $('.overlay .close').click(function (event) {
		  	event.preventDefault();
			$('.overlay').stop(true).fadeOut("fast");
	   });
	   function update(page) {
		 if(page == 'prev') {
			 page = parseInt($('#current-page-id').val())-1;
			 if(page < 0) {
				 page = 0;
			 }
		 } else if(page == 'next') {
			 page = parseInt($('#current-page-id').val())+1;
		 } else {
			 page = 0 ;
		 }
		 switch($('#entry-types .current-item').index()) {
			case 0:
				get('', page);
			break;	
			case 1:
				get('top', page);
			break;
			case 2:
				get('editor', page);
			break;
		 }
	   }
	   var admin_obj = null;
	   var admin_id = 0;
	   var admin_func = '';
	   function removeComment() {
		  $.post('post.php', { 'delete' : 'comment', 'id' : admin_obj.parent().find('.comment-id').val() }, function (data) {
			  if(data == 1) {
				  admin_obj.parent().parent().remove();
			  } else {
				  error(data);
			  }
		  });
	   }
	   <?php if($admin) { ?>
	   function doAdminAction() {
	     switch(admin_func) {
			case 'delete-comment':
				removeComment();
			break;
			case 'delete-entry':
				$.post('post.php', { 'delete' : 'entry', 'id' : admin_id }, function (data) {
					if(data == 1) {
						update();
					} else {
						error(data);
					}
				});
			break;
			case 'edit-entry':
				$sending = true;
				$text = $('#admin-entry-text').val();
				$link = $('#admin-entry-link').val();
				if($text != '') {
					$('#entry-text').removeClass('iError');
					$('#regular-overlay .btn-add').button('loading');
					if($link == 'Your URL...') {
						$link = '';
					}
					$.post('post.php', { 'letsdoit' : 'edit', 'text' : $text, 'link' : $link, 'id' : admin_id  }, function (data) {
						if(data == 1) {
							get();
						} else {
							error(data);
						}
						$('#admin-edit-overlay').stop(true).fadeOut("slow");
						$('#admin-edit-overlay .btn-add').button('reset');
						$sending = false;
					});
				} else {
					$('#entry-text').addClass('iError');
					$('#regular-overlay .btn-add').button('reset');
					$sending = false;
				}
			break;
			case 'move-to':
				$.post('post.php', { 'move' : 'comment', 'cat' : admin_obj, 'id' : admin_id }, function (data) {
					if(data == 1) {
						update();
					} else {
						error(data);
					}
				});
			break;
			case 'move-choice':
				$.post('post.php', { 'move' : 'choice', 'choice' : admin_obj, 'id' : admin_id }, function (data) {
					if(data == 1) {
						update();
					} else {
						error(data);
					}
				});
			break;
		 }
	   }
	   $('#admin-edit-overlay .btn-remove').click(function (event) {
		  event.preventDefault();
		  doAdminAction();
	   });
	   <?php } ?>
	   $('#admin-overlay .btn-remove').click(function (event) {
		  event.preventDefault();
		  <?php if($admin) { ?>
		  	doAdminAction();
		  <?php } else { ?>
			removeComment();
		  <?php } ?>
		  $('#admin-overlay').fadeOut('fast');
	   });
	   $('#admin-overlay .btn-cancel').click(function (event) {
		  event.preventDefault();
		  admin_obj = null;
		  admin_func = '';
		  $('#admin-overlay').fadeOut('fast');
	   });
	   function showComments(obj, add) {
		if(!$getting) {
		   $getting = true;
		   if(obj.parent().find('.read').html() == 'Hide comments' && add != 'comments') {
			   obj.parent().find('.read').html('Read comments');
			   obj.parent().parent().parent().find('.commentsArea').hide();
		   	   $getting = false;
			   resize();
		   } else {
			   obj.parent().find('.read').html('Hide comments');
			   $.post('post.php', { 'get' : 'comments', 'id' : obj.parent().parent().parent().find('.entry-id').val(), 'add' : add }, function (data) {
				 obj.parent().parent().parent().find('.commentsArea').hide();
				 obj.parent().parent().parent().find('.commentsArea').html(data);
				 obj.parent().parent().parent().find('.commentsArea').fadeIn('fast');
					$('.comments .close').click(function (event) {
						event.preventDefault();
						admin_obj = $(this);
						admin_func = 'delete-comment';
						$('#admin-overlay').fadeIn('fast');
					});
					$('.btn-comment').click(function (event) {
					  event.preventDefault();
					  if(login()) {
						  var parent = $(this).parent();
						  if(parent.find('textarea').val() != "" && parent.find('textarea').val() != 'Write your own comment here...') {
							  $.post('post.php', { 'add' : 'comment', 'id' : $(this).parent().parent().parent().find('.entry-id').val(), 'text' : parent.find('textarea').val() }, function (data) {
								  if(data == 1) {
									  parent.parent().parent().find('.count-comments').html(parseInt(parent.parent().parent().find('.count-comments').html())+1);
									  $getting = false;
									  showComments(parent.parent().parent().find('.read-comments'));
								  }else {
									  error(data);
								  }
							  });
						  } else {
							parent.find('textarea').addClass('iError'); 
						  }
					  }
					});
				 $getting = false;
				 resize();
			   });
		   }
		}
	   }
	   function get(type, page) {
		if(!$getting) {
		    $getting = true;
			$.post('post.php', { 'get' : 'posts', 'type' : type, 'cat' : $cat, 'page' : page  }, function (data) {
				$('#posts-area').hide();
				$('#posts-area').empty();
				document.getElementById('posts-area').innerHTML = data;
				<?php if($admin) { ?>
					$('.admin-dropdown li').click(function (event) {
						admin_id = $(this).parent().parent().parent().parent().parent().find('.entry-id').val();
						if($(this).index() == 0) {
							admin_obj = $(this).index();
							admin_func = 'edit-entry';
							$text = $(this).parent().parent().parent().parent().parent().find('.how-main-text').html();
							$text = $text.replace(new RegExp('<br>', 'g'), '\n');
							$text = $text.replace(new RegExp('<br/>', 'g'), '\n');
							$text = $text.replace(new RegExp('<br />', 'g'), '\n');
							$('#admin-entry-text').val($text);
							$('#admin-entry-link').val($(this).parent().parent().parent().parent().parent().find('.how-main-link').val());
							if($('#admin-entry-link').val() == "") {
								$('#admin-entry-link').hide();
							}
							$('#admin-edit-overlay').fadeIn('fast');
						}else if($(this).index() >= 1 && $(this).index() <= 3) {
							admin_obj = $(this).index();
							admin_func = 'move-to';
							$('#admin-overlay').fadeIn('fast');
						} else if($(this).index() == 4) {
							admin_obj = $(this).attr('data-choice');
							admin_func = 'move-choice';
							$('#admin-overlay').fadeIn('fast');
						} else if($(this).index() == 6) {
							admin_func = 'delete-entry';
							$('#admin-overlay').fadeIn('fast');
						}
					});
				<?php } ?>
				  $('.pagination .prev').click(function (event) {
					event.preventDefault();
					update('prev');	  
				  });
				  $('.pagination .next').click(function (event) {
					event.preventDefault();
					update('next');
				  });
				  $('.add-comments').click(function (event) {
					event.preventDefault();
					showComments($(this), 'comments' )
				  });
				  $('.read-comments').click(function (event) {
					event.preventDefault();
					showComments($(this))
				  });
				  $('#posts-area .btn-like').click(function (event) {
					event.preventDefault();
					if(login()) {
						var parent = $(this).parent();
						$(this).removeClass('btn-like');
						$(this).addClass('disabled');
						$idea = $(this).parent().parent().find('.how-main-text').html();
						$.post('post.php', { 'vote' : 'how', 'id' : $(this).parent().find('.entry-id').val()  }, function (data) {
							if(data == 1) {
								parent.find('.count-number').html(parseInt(parent.find('.count-number').html())+1);
								FB.ui({
									method: 'feed',  
									link: '<?php echo $config->fb->tab; ?>',
									name: 'Lets do it',
									caption: 'HOW?',
									description: $idea,
									picture: '<?php echo $config->fb->img; ?>',
									message: ' '
								}); 
							} else {
								error(data);
							}
						});
					}
				  });
				$('#posts-area').stop(true).fadeIn('fast');
				$getting = false;
				resize();
			});
		}
	   }
	   function login() {
		 <?php if(!$user) { ?>
		 FB.login(function(response) {
			if (response.status === 'connected') {
				top.location.href = '<?php echo $config->fb->tab; ?>';
			}
		 });
		 return false;
		 <?php } else { ?>
		 return true;
		 <?php } ?>   
	   }
	   function error(msg) {
		top.location.href = '<?php echo $config->fb->tab; ?>';
	   }
	   function resize() {	
		FB.Canvas.setSize({ width: 800, height: $('body').height() });
		FB.Canvas.setAutoResize();	
	   }
	   get();
  });
  </script>
<div id="page">
  <header>
    <div class="row clearfix">
      <div class="col col-left">
        <h1>HOW?</h1>
        <p> A competition and know-how sharing space on how to make our world a cleaner place for everybody with the resources available to us!
Share the ideas you want the world to follow!</p>
        <br/>
        <button type="button" class="btn btn-default btn-share"><i class="icon-f1"></i> Yes, i like it!</button>
      </div>
      <div class="col col-right">
        <iframe width="438" height="274" src="http://www.youtube.com/embed/TySu1VTOC9c" frameborder="0" allowfullscreen wmode=opaque></iframe>
      </div>
    </div>
  </header>
  <!-- begin .contentArea -->
  <div class="contentArea">
    <ul id="tabArea" class="nav-tabs">
      <li class="current-item"><a href="#">Me</a></li>
      <li><a href="#">Company</a></li>
      <li><a href="#">Community</a></li>
    </ul>
    <!-- begin .container -->
    <div class="container">
    
      <!-- begin .box-me -->
      <div class="box-me">
        <ul id="entry-types" class="nav-sub">
          <li class="current-item"><a href="#">Newest ideas</a></li>
          <li><a href="#">Top rated</a></li>
          <li><a href="#">Editors choice</a></li>
        </ul>
        <div id="posts-area">
        </div>
    	<center><button class="btn btn-large btn-green btn-add" id="open-adding-popup">Click here to add a new HOW</button></center>
      </div>
      <!-- end .box-me -->
      
    </div>
    <!-- end .container -->
  </div>
  <!-- end .contentArea -->
  <?php if($admin) { ?>
   <div class="overlay" id="admin-edit-overlay" style="display: none;">
    <div class="bg"></div>
    <!-- begin .container -->
    <div class="container">
      <button type="button" class="close">&times;</button>
      <h2>Edit HOW</h2>
      <textarea rows="3" id="admin-entry-text" class="tRegular">Write your own comment here...</textarea>
      <div class="inputArea"><input type="text" id="admin-entry-link" class="iRegular" value="" /></div>
      <button class="btn btn-large btn-green btn-remove">Change</button> <button class="btn btn-cancel">Cancel</button>
    </div>
    <!-- end .container -->
   </div>
   <?php } ?>
  
   <div class="overlay" id="admin-overlay" style="display: none;">
    <div class="bg"></div>
    <!-- begin .container -->
    <div class="container">
      <button type="button" class="close">&times;</button>
      <h2>Are you sure?</h2>
      <button class="btn btn-large btn-green btn-remove">Yes, I'm sure</button> <button class="btn btn-cancel">Cancel</button>
    </div>
    <!-- end .container -->
   </div>
  
  <div class="overlay" id="regular-overlay" style="display:none;">
    <div class="bg"></div>
    <!-- begin .container -->
    <div class="container">
      <button type="button" class="close">&times;</button>
      <h2>Add a new HOW!</h2>
      <ul id="overlay-menu" class="nav-sub">
        <li class="current-item"><a href="#">Text</a></li>
        <li><a href="#">Video</a></li>
        <li><a href="#">Link</a></li>
      </ul>
      <textarea rows="3" id="entry-text" class="tRegular" onfocus="if(this.value == 'Write your own comment here...') this.value = ''">Write your own comment here...</textarea>
      <div class="inputArea"><input type="text" id="entry-link" class="iRegular" value="Your URL..." style="display:none" onfocus="this.value = ''" /></div>
      <div class="optArea">
        <label><strong>Choose the category:</strong></label>&nbsp;
        <input type="radio" id="group0" name="group" value="0" />&nbsp;<label for="group0">Me</label>&nbsp;&nbsp;
        <input type="radio" id="group1" name="group" value="1" />&nbsp;<label for="group1">Company</label>&nbsp;&nbsp;
        <input type="radio" id="group2" name="group" value="2" />&nbsp;<label for="group2">Community</label>
      </div>
      <br />
      <button class="btn btn-large btn-green btn-add" data-loading-text="Loading ...">Upload your HOW!</button>
    </div>
    <!-- end .container -->
  </div>
</div>
</body>
</html>