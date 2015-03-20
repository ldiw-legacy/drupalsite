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
session_start();
$admin = false;
if(in_array($_SESSION['fb-user-id'], $config->admins)) {
	$admin = true;
}
if($_POST['letsdoit'] == 'how') {
	require_once("lib/facebook.php");
	$app_id = "129532973871040";
	$auth_url = "https://www.facebook.com/dialog/oauth?client_id="  . $config->fb->id . "&redirect_uri=" . urlencode($config->fb->canvas);
	$facebook = new Facebook(array(
	  'appId'  => $config->fb->id,
	  'secret' => $config->fb->secret,
	  'cookie' => true,
	));
	$user = $facebook->getUser();
	if($user && isset($_POST['text'])) {
		$pageContent = file_get_contents('http://graph.facebook.com/' . $user);
		$parsedJson  = json_decode($pageContent);
		$insert['facebook_id'] = $user;
		$insert['category_id'] = intval($main->escape($_POST['cat']));
		$insert['facebook_name'] = $parsedJson->name;
		$insert['entry_text'] = $main->escape(nl2br($_POST['text']));
		if($_POST['link'] != '') {
			$url = $_POST['link'];
			$parsed = parse_url( $url );
			if (empty($parsed['scheme'])) $url = "http://" . $url;
			$insert['entry_link'] = $main->escape($url);
		}
		if($main->query_insert($config->mysql->table,$insert)) {
			echo 1;
		} else {
			echo 'error-adding';
		}
	} else {
		echo 'not-logged-in';	
	}
} else if($_POST['letsdoit'] == 'edit' && $admin == true && isset($_POST['id'])) {
	if(isset($_POST['text'])) {
		$insert['entry_text'] = $main->escape(nl2br($_POST['text']));
		if($_POST['link'] != '') {
			$url = $_POST['link'];
			$parsed = parse_url( $url );
			if (empty($parsed['scheme'])) $url = "http://" . $url;
			$insert['entry_link'] = $main->escape($url);
		}
		if($main->query_update($config->mysql->table,$insert, 'id = "'.intval($_POST['id']).'"')) {
			echo 1;
		} else {
			echo 'error-adding';
		}
	} else {
		echo 'not-logged-in';	
	}
} else if($_POST['delete'] == 'comment' && isset($_POST['id'])) {
	$owner = $main->query_first('SELECT id FROM ' . $config->mysql->table_comments . ' WHERE id = "'.intval($_POST['id']).'" AND facebook_id = "'.$_SESSION['fb-user-id'].'"');
	if($admin == true || $owner['id'] > 0) {
		if($main->query_delete($config->mysql->table_comments, 'id = "'.intval($_POST['id']).'"')) {
			echo 1;	
		}else {
			echo 'error';
		}
	}else {
		echo 0;	
	}
} else if($_POST['delete'] == 'entry' && $admin == true && isset($_POST['id'])) {
	if($main->query_delete($config->mysql->table, 'id = "'.intval($_POST['id']).'"')) {
		echo 1;	
	}else {
		echo 'error';
	}
} else if($_POST['move'] == 'comment' && $admin == true && isset($_POST['cat']) && isset($_POST['id'])) {
	$update['category_id'] = intval($_POST['cat']);
	if($main->query_update($config->mysql->table, $update, 'id = "'.intval($_POST['id']).'"')) {
		echo 1;	
	}else {
		echo 'error';
	}
} else if($_POST['move'] == 'choice' && $admin == true && isset($_POST['choice']) && isset($_POST['id'])) {
	$update['choice'] = intval($_POST['choice']);
	if($main->query_update($config->mysql->table, $update, 'id = "'.intval($_POST['id']).'"')) {
		echo 1;	
	}else {
		echo 'error';
	}
} else if($_POST['vote'] == 'how') {
	require_once("lib/facebook.php");
	$app_id = "129532973871040";
	$auth_url = "https://www.facebook.com/dialog/oauth?client_id="  . $config->fb->id . "&redirect_uri=" . urlencode($config->fb->canvas);
	$facebook = new Facebook(array(
	  'appId'  => $config->fb->id,
	  'secret' => $config->fb->secret,
	  'cookie' => true,
	));
	$user = $facebook->getUser();
	if($user && isset($_POST['id'])) {
		$id = intval($_POST['id']);
		$insert['facebook_id'] = $user;
		$insert['entry_id'] = $id;
		$voted = $main->query_first('SELECT id FROM ' . $config->mysql->table_votes . ' WHERE entry_id = "'.$insert['entry_id'].'" AND facebook_id = "'.$insert['facebook_id'].'"');
		if($voted['id'] > 0) {
			echo 'already-voted';
		}else {
			if($main->query_insert($config->mysql->table_votes,$insert)) {
				$main->query('UPDATE ' . $config->mysql->table . ' SET votes = votes + 1 WHERE id = "'.$insert['entry_id'].'"');
				echo 1;
			} else {
				echo 'error-voting';
			}
		}
	} else {	
		echo 'not-logged-in';
	}
	
} else if($_POST['add'] == 'comment') {
	require_once("lib/facebook.php");
	$app_id = "129532973871040";
	$auth_url = "https://www.facebook.com/dialog/oauth?client_id="  . $config->fb->id . "&redirect_uri=" . urlencode($config->fb->canvas);
	$facebook = new Facebook(array(
	  'appId'  => $config->fb->id,
	  'secret' => $config->fb->secret,
	  'cookie' => true,
	));
	$user = $facebook->getUser();
	if($user && isset($_POST['id'])) {
		$pageContent = file_get_contents('http://graph.facebook.com/' . $user);
		$parsedJson  = json_decode($pageContent);
		$id = intval($_POST['id']);
		$insert['facebook_id'] = $user;
		$insert['entry_id'] = $id;
		$insert['facebook_name'] = $parsedJson->name;
		$insert['comment_text'] = $main->escape($_POST['text']);
		if($main->query_insert($config->mysql->table_comments,$insert)) {
			echo 1;
		} else {
			echo 'error-adding-comment';
		}
	} else {	
		echo 'not-logged-in';
	}
	
} else if($_POST['get'] == 'comments') {
	$query = $main->query('SELECT * FROM ' . $config->mysql->table_comments . ' WHERE entry_id = "'.intval($_POST['id']).'" ORDER BY time DESC');
	?>
      <div class="add-new-comment" <?php if(!isset($_POST['add'])) echo 'style="display:none"'; ?>>
      <button type="button" class="btn btn-green btn-small btn-comment" data-loading-text="Loading ...">Add comment</button>
      <textarea rows="3" class="tRegular" onfocus="this.value = ''">Write your own comment here...</textarea>
      </div>
      <ul class="comments">
        <?php
		while($output=&$main->fetch_array($query)) { ?>
        <li class="clearfix">
          <div class="date"><?php echo $main->convDate($output['time'], 'datetime'); ?> <?php if($admin || $output['facebook_id'] == $_SESSION['fb-user-id']) { ?><input type="hidden" value="<?php echo $output['id']; ?>" class="comment-id" /><button type="button" class="close">&times;</button><?php } ?></div>
          <div class="thumb"><img src="//graph.facebook.com/<?php echo $output['facebook_id']; ?>/picture?type=square" /></div>
          <div class="content">
            <span class="user"><?php echo utf8_encode($output['facebook_name']); ?></span>
            <p><?php echo utf8_encode(strip_tags($output['comment_text'])); ?></p>
          </div>
        </li>
        <?php } ?>
      </ul>
    <?php	
} else if($_POST['get'] == 'posts') {
	if(isset($_POST['page'])) {
		$page = intval($_POST['page']);
	}else {
		$page = 0;
	}
	$per_page = 5;
	function check($a, $b, $c) {
		if($b == 0) {
			return $b;
		}else {
			if($a >= ceil($b/$c)) {
				return ceil($b/$c)-1;
			}else {
				return $a;	
			}
		}
	}
	switch($_POST['type']) {
		case 'top':
			$count = $main->query_first('SELECT COUNT(id) as count FROM ' . $config->mysql->table . ' WHERE category_id = "'.intval($_POST['cat']).'" ORDER BY votes');
			$page = check($page, $count['count'], $per_page);
			$query = $main->query('SELECT * FROM ' . $config->mysql->table . ' WHERE category_id = "'.intval($_POST['cat']).'" ORDER BY votes DESC LIMIT ' . $page*$per_page . ', ' . $per_page);
		break;
		case 'editor':
			$count = $main->query_first('SELECT COUNT(id) as count FROM ' . $config->mysql->table . ' WHERE category_id = "'.intval($_POST['cat']).'" AND choice = "1" ORDER BY time DESC');
			$page = check($page, $count['count'], $per_page);
			$query = $main->query('SELECT * FROM ' . $config->mysql->table . ' WHERE category_id = "'.intval($_POST['cat']).'" AND choice = "1" ORDER BY time DESC LIMIT ' . $page*$per_page . ', ' . $per_page);
		break;
		default:
			$count = $main->query_first('SELECT COUNT(id) as count FROM ' . $config->mysql->table . ' WHERE category_id = "'.intval($_POST['cat']).'" ORDER BY id DESC');
			$page = check($page, $count['count'], $per_page);
			$query = $main->query('SELECT * FROM ' . $config->mysql->table . ' WHERE category_id = "'.intval($_POST['cat']).'" ORDER BY id DESC LIMIT ' . $page*$per_page . ', ' . $per_page);
		break;	
	}?>
  <ul class="posts">
    <?php
	while($output=&$main->fetch_array($query)) { ?>
	<li class="clearfix">
	  <div class="thumb"><img src="//graph.facebook.com/<?php echo $output['facebook_id']; ?>/picture?type=square" /></div>
	  <div class="content">
		<span class="user"><?php echo utf8_encode($output['facebook_name']); ?>
		<?php if($admin) { ?>
        <!-- if admin -->
        <div class="btn-group">
          <button class="btn btn-mini dropdown-toggle" data-toggle="dropdown">Edit <span class="caret"></span></button>
          <ul class="dropdown-menu admin-dropdown">
            <li><a href="#">Edit post</a></li>
            <li><a href="#">Move to Me</a></li>
            <li><a href="#">Move to Company</a></li>
            <li><a href="#">Move to Community</a></li>
            <?php if($output['choice'] == 1) { ?>
            <li data-choice="0"><a href="#">Remove from Editors choice</a></li>
            <? } else { ?>
            <li data-choice="1"><a href="#">Set as Editors choice</a></li>
            <?php } ?>
            <li class="divider"></li>
            <li><a href="#">Delete post</a></li>
          </ul>
        </div>
        <!-- if admin -->
        <?php } ?></span>
		<p class="how-main-text"><?php echo utf8_encode(str_replace('<br />n', '<br />', strip_tags($output['entry_text'], '<br /><br><br/>'))); ?></p><?php
		if($output['entry_link']) {
			?><a href="<?php echo $output['entry_link']; ?>" target="_blank" class="link-entry">Click to see link to page</a><?php
		}
		?>
        <input type="hidden" class="how-main-link" value="<?php echo $output['entry_link']; ?>" />
		<div class="actions">
		  <a href="#" class="add-comments"><span>Add comment</span></a><a href="#" class="read-comments"><span class="read">Read comments</span> (<span class="count-comments" style="text-decoration:none"><?php 
		  $comments = $main->query_first('SELECT COUNT(id) as count FROM ' . $config->mysql->table_comments . ' WHERE entry_id = "'.$output['id'].'"');
		  echo $comments['count'];
		  ?></span>)</a><span class="date"><?php echo $main->convDate($output['time'], 'datetime'); ?></span>
		</div>
	  </div>
	  <div class="likes">
		<input type="hidden" class="entry-id" value="<?php echo $output['id']; ?>" />
		<button type="button" class="btn btn-light btn-small <?php
		$voted = $main->query_first('SELECT id FROM ' . $config->mysql->table_votes . ' WHERE entry_id = "'.$output['id'].'" AND facebook_id = "'.$_SESSION['fb-user-id'].'"');
		if($voted['id'] > 0) {
			echo ' disabled';	
		} else {
			echo ' btn-like';
		}
		?>"><i class="icon-f2"></i> I like it</button>
		<span class="count"><span class="count-number"><?php echo $output['votes']; ?></span> likes</span>
	  </div>
      <!-- begin .commentsArea -->
      <div class="commentsArea">
      </div>
      <!-- end .commentsArea -->
	</li>
    <?php } ?>
  </ul> 
  </div>
  <div class="bottomArea">
    <div class="pagination">
      <ul>
        <li class="prev"><a href="#"><i class="icon-arrow icon-prev">Previous</i></a></li>
        <li class="next"><a href="#"><i class="icon-arrow icon-next">Next</i></a></li>
      </ul>
      <input type="hidden" value="<?php echo $page; ?>" id="current-page-id" />
      <div class="count"><?php echo ($page+1); ?>/<?php if(ceil($count['count']/$per_page) == 0) echo 1; else echo ceil($count['count']/$per_page); ?></div>
    </div>
  </div>
	<?php
} else {
	echo 0;
}
?>