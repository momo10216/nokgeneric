<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.nok-generic
 *
 * @copyright   Copyright (C) 2014 Norbert Kuemin. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

function detectNoHoverDevice(){
	global $_SERVER;
	if (!isset($_SERVER['HTTP_USER_AGENT'])) { return true; }
	$agent = $_SERVER['HTTP_USER_AGENT'];
	$useragents = array (
		"android",
		"iphone",
		"ipad",
		"ipod",
		"blackberry",
		"kindle",
		"opera mobi",
		"playbook",
		"webos",
		"windows phone"
	);
	foreach ( $useragents as $useragent ) {
		if (preg_match("/".$useragent."/i",$agent)){
			return true;
		}
	}
	return false;
}

function getAlternateTemplateStyleId(){
	$activeMenu = JFactory::getApplication()->getMenu()->getActive();
	if (is_null($activeMenu)) { return ''; }
	$templateStyleId = $activeMenu->template_style_id;
	if (empty($templateStyleId) || ($templateStyleId == '0')) { return ''; }
	return $templateStyleId;
}

// Getting global params from template
$styleId = getAlternateTemplateStyleId();
$app = JFactory::getApplication();
$params = $app->getTemplate(true)->params;
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
JHtml::_('jquery.ui');
$doc->addScript('templates/' .$this->template. '/js/template.js');
$menuMobileType = $params->get('menuMobileType');
if (($menuMobileType == "nav-select-left") || ($menuMobileType == "nav-select-right")) {
	$doc->addScriptDeclaration("
		jQuery(document).ready(function() {
			jQuery('<select class=navselect />').appendTo('.navbar');
			jQuery('<option />', {
				'selected': 'selected',
				'value'   : '',
				'text'    : '".JText::_('TPL_NOK-GENERIC_GOTO')."'
			}).appendTo('.navbar select');
			jQuery('nav a').each(function() {
				var el = jQuery(this);
				var level = '';
				for (j = 0; j < jQuery(this).parents('ul, ol').length - 1; j++) {
					level += '-';
				}
				jQuery('<option />', {
					'value'   : el.attr('href'),
					'text'    : level+' '+el.text()
				}).appendTo('.navbar select');
			});
			jQuery('.navbar select').change(function() {
				window.location = jQuery(this).find('option:selected').val();
			});
		});
	");
}
// Add Stylesheets
$cssurl = 'templates/'.$this->template.'/css/template.php';
if (!empty($styleId)) {$cssurl .= '?styleId='.$styleId; }
$doc->addStyleSheet($cssurl);
if (detectNoHoverDevice()) {
	$doc->addStyleSheet('templates/'.$this->template.'/css/template_nohover.php');
}

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Add current user information
$user = JFactory::getUser();

// Check modules
$showLeftColumn  = ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));
$showRightColumn = ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom      = ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));

// Adjusting content width
if ($showLeftColumn && $showRightColumn) {
	$span = "span6";
} elseif ($showLeftColumn && !$showRightColumn) {
	$span = "span9";
} elseif (!$showLeftColumn && $showRightColumn) {
	$span = "span9";
} else {
	$span = "span12";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
<?php if ($params->get('faviconFile')) : ?>
	<link rel="shortcut icon" href="<?php echo JURI::base()."/".$params->get('faviconFile'); ?>" />
<?php endif; ?>
	<?php
	// Use of Google Font
	if ($this->params->get('googleFont'))
	{
	?>
		<link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title {
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName'));?>', sans-serif;
			}
		</style>
	<?php
	}
	?>
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">

	<!-- Body -->
	<div class="body">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
			<!-- Header -->
			<header class="header" role="banner">
				<div class="header-inner clearfix">
					<?php if ($this->countModules('position-13')) : ?>
					<div class="header-logo pull-left">
						<jdoc:include type="modules" name="position-13" style="none" />
					</div>
					<?php endif; ?>
					<?php if ($this->countModules('position-0')) : ?>
					<div class="header-search pull-right">
						<jdoc:include type="modules" name="position-0" style="none" />
					</div>
					<?php endif; ?>
				</div>
			</header>
			<?php if ($this->countModules('position-1')) : ?>
			<nav class="navigation" role="navigation">
				<div class="navbar">
					<div class="navbar-inner">
						<?php if (($menuMobileType == "nav-btn-left") || ($menuMobileType == "nav-btn-right")) : ?>
						<a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<div class="nav-collapse collapse">
							<jdoc:include type="modules" name="position-1" style="none"/>
						</div>
						<?php else: ?>
						<jdoc:include type="modules" name="position-1" style="none"/>
						<?php endif; ?>
					</div>
				</div>
			</nav>
			<?php endif; ?>
			<?php if ($this->countModules('position-2')) : ?>
			<div id="breadcrumbs">
				<jdoc:include type="modules" name="position-2" style="none" />
			</div>
			<?php endif; ?>
			<jdoc:include type="modules" name="banner" style="xhtml" />
			<div class="row-fluid">
				<?php if ($showLeftColumn) : ?>
				<!-- Begin Sidebar -->
				<div id="sidebar" class="span3">
					<div class="sidebar-nav">
						<jdoc:include type="modules" name="position-7" style="xhtml" />
						<jdoc:include type="modules" name="position-4" style="xhtml" />
						<jdoc:include type="modules" name="position-5" style="xhtml" />
					</div>
				</div>
				<!-- End Sidebar -->
				<?php endif; ?>
				<main id="content" role="main" class="<?php echo $span;?>">
					<!-- Begin Content -->
					<?php if ($this->countModules('position-12')) : ?>
					<div id="top">
						<jdoc:include type="modules" name="position-12" />
					</div>
					<?php endif; ?>
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<jdoc:include type="modules" name="position-14" style="none" />
					<!-- End Content -->
				</main>
				<?php if ($showRightColumn) : ?>
				<div id="aside" class="span3">
					<!-- Begin Right Sidebar -->
					<jdoc:include type="modules" name="position-6" style="well" />
					<jdoc:include type="modules" name="position-8" style="well" />
					<jdoc:include type="modules" name="position-3" style="well" />
					<!-- End Right Sidebar -->
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
			<hr />
			<div id="bottom">
				<jdoc:include type="modules" name="position-9" style="none" />
				<jdoc:include type="modules" name="position-10" style="none" />
				<jdoc:include type="modules" name="position-11" style="none" />
			</div>
			<p class="pull-right">
				<a href="#top" id="back-top">
					<?php echo JText::_('TPL_NOK-GENERIC_BACKTOTOP'); ?>
				</a>
			</p>
		</div>
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
