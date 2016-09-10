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

function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}

function calcBackground($templateParams, $colorKey, $opacityKey="") {
	$backgroundColor = $templateParams->get($colorKey);
	if (empty($backgroundColor)) { return ""; }
	if (!empty($opacityKey)) {
		$backgroundOpacity = $templateParams->get($opacityKey);
		if (!empty($backgroundOpacity)) {
			$backgroundOpacity = $backgroundOpacity/100;
			return "rgba(".hex2RGB($backgroundColor,true).",".$backgroundOpacity.")";
		}
	}
	return "rgb(".hex2RGB($backgroundColor,true).")";	
}
 
// Instantiate the application.
$app = JFactory::getApplication('site');
$templateParams = JFactory::getApplication()->getTemplate(true)->params;

$templateColor = $templateParams->get('templateColor');
$templateForegroundColor = $templateParams->get('templateForegroundColor');
$templateLinkColor = $templateParams->get('templateLinkColor');
$templateLinkDecoration = $templateParams->get('templateLinkDecoration');
$templateRadius = $templateParams->get('templateRadius');
$templateFontSize = $templateParams->get('templateFontSize');
if (empty($templateFontSize)) { $templateFontSize = '12'; }

$bodyBackgroundColor = $templateParams->get('bodyBackgroundColor');
$bodyBackgroundFile = $templateParams->get('bodyBackgroundFile');
$bodyBackgroundRepeat = $templateParams->get('bodyBackgroundRepeat');
$bodyBackgroundAttachment = $templateParams->get('bodyBackgroundAttachment');
$bodyBackgroundPosition = $templateParams->get('bodyBackgroundPosition');

$headerBackgroundColor = calcBackground($templateParams,'headerBackgroundColor','headerBackgroundOpacity');

$menuType = $templateParams->get('menuType');
$menuBackgroundColor = calcBackground($templateParams,'menuBackgroundColor','menuBackgroundOpacity');
$menuEntryBackgroundColor = $templateParams->get('menuEntryBackgroundColor');
$menuEntryForegroundColor = $templateParams->get('menuEntryForegroundColor');
$menuEntryRadius = $templateParams->get('menuEntryRadius');
$menuEntryHorizontalSpacing = $templateParams->get('menuEntryHorizontalSpacing');
$menuEntryFocusBackgroundColor = $templateParams->get('menuEntryFocusBackgroundColor');
$menuEntryFocusForegroundColor = $templateParams->get('menuEntryFocusForegroundColor');
$menuEntryHoverBackgroundColor = $templateParams->get('menuEntryHoverBackgroundColor');
$menuEntryHoverForegroundColor = $templateParams->get('menuEntryHoverForegroundColor');
$menuChildBackgroundColor = $templateParams->get('menuChildBackgroundColor');
$menuChildForegroundColor = $templateParams->get('menuChildForegroundColor');
$menuChildBorderColor = $templateParams->get('menuChildBorderColor');
$menuChildFocusBackgroundColor = $templateParams->get('menuChildFocusBackgroundColor');
$menuChildFocusForegroundColor = $templateParams->get('menuChildFocusForegroundColor');
$menuChildHoverBackgroundColor = $templateParams->get('menuChildHoverBackgroundColor');
$menuChildHoverForegroundColor = $templateParams->get('menuChildHoverForegroundColor');
$menuFontSize = $templateParams->get('menuFontSize');
$menuMobileType = $templateParams->get('menuMobileType');

$moduleBackgroundColor = calcBackground($templateParams,'moduleBackgroundColor','moduleBackgroundOpacity');
$moduleBorderColor = $templateParams->get('moduleBorderColor');
$moduleBorderSize = $templateParams->get('moduleBorderSize');
$moduleBorderType = $templateParams->get('moduleBorderType');
$modulePaddingSize = $templateParams->get('modulePaddingSize');
$moduleTitleBackgroundFile = $templateParams->get('moduleTitleBackgroundFile');
$moduleTitleIcon = $templateParams->get('moduleTitleIcon');
$moduleTitleDecoration = $templateParams->get('moduleTitleDecoration');

$contentBackgroundColor = calcBackground($templateParams,'contentBackgroundColor','contentBackgroundOpacity');
$contentBackgroundFile = $templateParams->get('contentBackgroundFile');
$contentBackgroundRepeat = $templateParams->get('contentBackgroundRepeat');
$contentBackgroundAttachment = $templateParams->get('contentBackgroundAttachment');
$contentBackgroundPosition = $templateParams->get('contentBackgroundPosition');
$contentBorderType = $templateParams->get('contentBorderType');
$contentBorderSize = $templateParams->get('contentBorderSize');
$contentBorderColor = $templateParams->get('contentBorderColor');

$footerBackgroundColor = calcBackground($templateParams,'footerBackgroundColor','footerBackgroundOpacity');
$footerBackgroundFile = $templateParams->get('footerBackgroundFile');
$footerBackgroundRepeat = $templateParams->get('footerBackgroundRepeat');
$footerBackgroundAttachment = $templateParams->get('footerBackgroundAttachment');
$footerBackgroundPosition = $templateParams->get('footerBackgroundPosition');
$footerBorderType = $templateParams->get('footerBorderType');
$footerBorderSize = $templateParams->get('footerBorderSize');
$footerBorderColor = $templateParams->get('footerBorderColor');
?>