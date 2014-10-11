<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.nok-generic
 *
 * @copyright   Copyright (C) 2014 Norbert Kuemin. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
header("Content-type: text/css; charset: UTF-8");

if (version_compare(PHP_VERSION, '5.3.10', '<'))
{
	die('Your host needs to use PHP 5.3.10 or higher to run this version of Joomla!');
}

/**
 * Constant that is checked in included files to prevent direct access.
 * define() is used in the installation folder rather than "const" to not error for PHP 5.2 and lower
 */
define('_JEXEC', 1);

if (file_exists(__DIR__ . '/../../../defines.php'))
{
	include_once __DIR__ . '/../../../defines.php';
}

if (!defined('_JDEFINES'))
{
	define('JPATH_BASE', __DIR__.'/../../..');
	require_once JPATH_BASE . '/includes/defines.php';
}

require_once JPATH_BASE . '/includes/framework.php';

// Instantiate the application.
$app = JFactory::getApplication('site');
$templateParams = JFactory::getApplication()->getTemplate(true)->params;

$templateColor = $templateParams->get('templateColor');
$templateForegroundColor = $templateParams->get('templateForegroundColor');
$templateLinkColor = $templateParams->get('templateLinkColor');
$templateLinkDecoration = $templateParams->get('templateLinkDecoration');
$templateRadius = $templateParams->get('templateRadius');
$moduleBackgroundColor = $templateParams->get('moduleBackgroundColor');
$moduleBorderColor = $templateParams->get('moduleBorderColor');
$moduleBorderSize = $templateParams->get('moduleBorderSize');
$moduleBorderType = $templateParams->get('moduleBorderType');
$modulePaddingSize = $templateParams->get('modulePaddingSize');
$moduleTitleBackgroundFile = $templateParams->get('moduleTitleBackgroundFile');
$moduleTitleIcon = $templateParams->get('moduleTitleIcon');
$moduleTitleDecoration = $templateParams->get('moduleTitleDecoration');
$bodyBackgroundColor = $templateParams->get('bodyBackgroundColor');
$bodyBackgroundFile = $templateParams->get('bodyBackgroundFile');
$bodyBackgroundRepeat = $templateParams->get('bodyBackgroundRepeat');
$bodyBackgroundAttachment = $templateParams->get('bodyBackgroundAttachment');
$bodyBackgroundPosition = $templateParams->get('bodyBackgroundPosition');
$menuType = $templateParams->get('menuType');
$menuBackgroundColor = $templateParams->get('menuBackgroundColor');
$menuEntryBackgroundColor = $templateParams->get('menuEntryBackgroundColor');
$menuEntryFocusBackgroundColor = $templateParams->get('menuEntryFocusBackgroundColor');
$menuEntryForegroundColor = $templateParams->get('menuEntryForegroundColor');
$menuEntryRadius = $templateParams->get('menuEntryRadius');
$menuEntryHorizontalSpacing = $templateParams->get('menuEntryHorizontalSpacing');
$menuChildBackgroundColor = $templateParams->get('menuChildBackgroundColor');
$menuChildFocusBackgroundColor = $templateParams->get('menuChildFocusBackgroundColor');
$menuChildForegroundColor = $templateParams->get('menuChildForegroundColor');
$menuChildBorderColor = $templateParams->get('menuChildBorderColor');
$menuMobileType = $templateParams->get('menuMobileType');
$contentBackgroundColor = $templateParams->get('contentBackgroundColor');
$contentBackgroundFile = $templateParams->get('contentBackgroundFile');
$contentBackgroundRepeat = $templateParams->get('contentBackgroundRepeat');
$contentBackgroundAttachment = $templateParams->get('contentBackgroundAttachment');
$contentBackgroundPosition = $templateParams->get('contentBackgroundPosition');
$contentBorderType = $templateParams->get('contentBorderType');
$contentBorderSize = $templateParams->get('contentBorderSize');
$contentBorderColor = $templateParams->get('contentBorderColor');
$footerBackgroundColor = $templateParams->get('footerBackgroundColor');
$footerBackgroundFile = $templateParams->get('footerBackgroundFile');
$footerBackgroundRepeat = $templateParams->get('footerBackgroundRepeat');
$footerBackgroundAttachment = $templateParams->get('footerBackgroundAttachment');
$footerBackgroundPosition = $templateParams->get('footerBackgroundPosition');
$footerBorderType = $templateParams->get('footerBorderType');
$footerBorderSize = $templateParams->get('footerBorderSize');
$footerBorderColor = $templateParams->get('footerBorderColor');
?>

