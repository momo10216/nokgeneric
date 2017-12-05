<?php
/**
* @version	$Id$
* @package	Joomla
* @subpackage	NoK-Generic
* @copyright	Copyright (c) 2017 Norbert Kuemin. All rights reserved.
* @license	http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE
* @author	Norbert Kuemin
* @authorEmail	momo_102@bluemail.ch
*/
if (file_exists(__DIR__ . '/joomla_init.inc.php'))
{
	include_once __DIR__ . '/joomla_init.inc.php';
}
?>
body {
	padding-top: 0;
}
.header {
	background: transparent;
}
.header .brand {
	float: none;
	display: block;
	text-align: center;
}
.header .nav.pull-right,
.header-search {
	float: none;
	display: block;
}
.header-search form {
	margin: 0;
}
.header-search .search-query {
	width: 90%;
}
.header .nav-pills > li > a {
	border: 1px solid #ddd;
	border-bottom: 0;
	margin: 0;
	-webkit-border-radius: <?php echo $templateRadius; ?>px;
	-moz-border-radius: <?php echo $templateRadius; ?>px;
	border-radius: <?php echo $templateRadius; ?>px;
	margin-right: <?php echo $templateRadius; ?>px;
}
.header .nav-pills > li:first-child > a {
	-webkit-border-radius: <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px 0 0;
	-moz-border-radius: <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px 0 0;
	border-radius: <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px 0 0;
}
.header .nav-pills > li:last-child > a {
	-webkit-border-radius: 0 0 <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px;
	-moz-border-radius: 0 0 <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px;
	border-radius: 0 0 <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px;
	border-bottom: 1px solid #ddd;
}
.modal.fade {
	top: -100%;
}
.nav-tabs {
	border-bottom: 0;
}
.nav-tabs > li {
	float: none;
}
.nav-tabs > li > a {
	border: 1px solid #ddd;
	-webkit-border-radius: <?php echo $templateRadius; ?>px;
	-moz-border-radius: <?php echo $templateRadius; ?>px;
	border-radius: <?php echo $templateRadius; ?>px;
	margin-right: 0;
}
.nav-tabs > li:first-child > a {
	-webkit-border-radius: <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px 0 0;
	-moz-border-radius: <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px 0 0;
	border-radius: <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px 0 0;
}
.nav-tabs > li:last-child > a,
.nav-tabs > .active:last-child > a {
	-webkit-border-radius: 0 0 <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px;
	-moz-border-radius: 0 0 <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px;
	border-radius: 0 0 <?php echo $templateRadius; ?>px <?php echo $templateRadius; ?>px;
	border-bottom: 1px solid #ddd;
}
.nav-tabs > li > a:hover {
	border-color: #ddd;
	z-index: 2;
}
.nav-tabs.nav-dark > li > a {
	border: 1px solid #333;
}
.nav-tabs > li:last-child > a,
.nav-tabs > .active:last-child > a {
	border-bottom: 1px solid #333;
}
.nav-tabs.nav-dark > li > a:hover {
	border-color: #333;
}
.nav-pills > li {
	float: none;
}
.nav-pills > li > a {
	margin-right: 0;
}
.nav-child {
	margin: 0px;
	position: static;
	top: auto;
	left: 0px;
	float: none;
	max-width: none;
	margin: 0px 15px;
	padding: 0px;
	background-color: transparent;
	border: medium none;
	border-radius: 0px;
	box-shadow: none;
	display: none;
}
.nav-pills > li > a {
	margin-bottom: 3px;
}
.nav-pills  > li:last-child > a {
	margin-bottom: 1px;
}
.form-search > .pull-left,
.form-search > .pull-right {
	float: none;
	display: block;
	margin-bottom: 9px;
}
.navigation .nav > li {
	position: static;
}
.navigation .nav-child:before,
.navigation .nav-child:after {
	display: none;
}
.navigation .nav-child a {
	padding: 3px 14px;
}
.navbar .btn-navbar {
	display: block;
}
<?php if (($menuMobileType == "nav-select-left") || ($menuMobileType == "nav-select-right")) : ?>
.navbar {
	height: 28px;
}
.navbar-inner {
	display: none;
}
.navselect {
	display: block;
<?php if ($menuMobileType == "nav-select-left") : ?>
	float: left;
<?php else : ?>
	float: right;
<?php endif; ?>
}
<?php else : ?>
.navigation .nav .active > .nav-child {
	position: static;
	float: none;
	display: inline-block;
}
<?php endif; ?>

