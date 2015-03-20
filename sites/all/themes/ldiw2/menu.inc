			<div id="mainmenu" class="right">
				<div id="primary"><?php global $user; print theme('links',array_merge($primary_links,$user->uid ? array(array('title' => t('Logout'),'attributes'=>array('title'=>t('Logout')),'href'=>'logout')) : array(array('title' => t('Login'),'attributes'=>array('title'=>t('Login')),'href'=>'user/login')))); ?></div>
			</div>