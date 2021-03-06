<?php
/**
 * 
 * Security check. No one can access without Wordpress itself
 * 
 * */
if( !defined('ABSPATH') ) die();

?>

<div class='col-sidebar'>

	<?php if(!defined('FILE_MANAGER_PREMIUM') || !defined('FILE_MANAGER_THEMEPACK')): ?>
	<div class='row'><?php require_once( 'sales.php' ); ?></div>
	
	<div class='row'><?php require_once( 'donate.php' ); ?></div>
	<?php endif; ?>
	
	<?php if(!defined('FILE_MANAGER_PREMIUM')): ?>
	<div class='row'><?php require_once( 'extensions.php' ); ?></div>
	<?php endif; ?>

	<?php if(!defined('FILE_MANAGER_THEMEPACK')): ?>
	<div class='row'><?php require_once( 'extension-themepack.php' ); ?></div>
	<?php endif; ?>
</div>
