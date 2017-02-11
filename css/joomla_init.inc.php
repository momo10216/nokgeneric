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

function calcBackground($colorValue, $opacityValue="") {
	if (empty($colorValue)) { return ""; }
	if (!empty($opacityValue)) {
		$opacityValue = $opacityValue/100;
		return "rgba(".hex2RGB($colorValue,true).",".$opacityValue.")";
	}
	return "rgb(".hex2RGB($colorValue,true).")";	
}

// Instantiate the application.
$app = JFactory::getApplication('site');
if (isset($_GET['styleId'])) {
	JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');
	$style = JTable::getInstance('Style', 'TemplatesTable');
	$style->load($_GET['styleId']);
	$paramsText = str_replace('{','',str_replace('}','',$style->params));
	$params = array();
	foreach(explode('","', $paramsText) as $item) {
		list($key,$value) = explode('":"', $item,2);
		$params[str_replace('"','',$key)] = str_replace('"','',$value);
	}
	$templateParams = JFactory::getApplication()->getTemplate(true)->params;
} else {
	$templateParams = JFactory::getApplication()->getTemplate(true)->params;
	$varnames = array('templateColor',
'templateForegroundColor',
'templateLinkColor',
'templateLinkDecoration',
'googleFont',
'googleFontName',
'templateFontSize',
'fluidContainer',
'templateRadius',
'faviconFile',
'templateParagraphMarginTop',
'templateParagraphMarginBottom',
'bodyBackgroundColor',
'bodyBackgroundFile',
'bodyBackgroundRepeat',
'bodyBackgroundAttachment',
'bodyBackgroundPosition',
'headerBackgroundColor',
'headerBackgroundOpacity',
'menuType',
'menuBackgroundColor',
'menuFontSize',
'menuBackgroundOpacity',
'menuEntryBackgroundColor',
'menuEntryForegroundColor',
'menuEntryRadius',
'menuEntryHorizontalSpacing',
'menuEntryFocusBackgroundColor',
'menuEntryFocusForegroundColor',
'menuEntryHoverBackgroundColor',
'menuEntryHoverForegroundColor',
'menuChildBackgroundColor',
'menuChildForegroundColor',
'menuChildFocusBackgroundColor',
'menuChildFocusForegroundColor',
'menuChildHoverBackgroundColor',
'menuChildHoverForegroundColor',
'menuChildBorderColor',
'menuMobileType',
'contentBackgroundColor',
'contentBackgroundOpacity',
'contentBackgroundFile',
'contentBackgroundRepeat',
'contentBackgroundAttachment',
'contentBackgroundPosition',
'contentBorderType',
'contentBorderSize',
'contentBorderColor',
'moduleBackgroundColor',
'moduleBackgroundOpacity',
'moduleBorderType',
'moduleBorderSize',
'moduleBorderColor',
'modulePaddingSize',
'moduleTitleIcon',
'moduleTitleDecoration',
'footerBackgroundColor',
'footerBackgroundOpacity',
'footerBackgroundFile',
'footerBackgroundRepeat',
'footerBackgroundAttachment',
'footerBackgroundPosition',
'footerBorderType',
'footerBorderSize',
'footerBorderColor',
'cssTemplate',
'cssPage');
	$params = array();
	foreach($varnames as $varname) {
		$params[$varname] = $templateParams->get($varname);
	}
}
if (!isset($params['templateFontSize']) || empty($params['templateFontSize'])) { $params['templateFontSize'] = '12'; }
if (!isset($params['templateParagraphMarginTop']) || empty($params['templateParagraphMarginTop'])) { $params['templateParagraphMarginTop'] = '0'; }
if (!isset($params['templateParagraphMarginBottom']) || empty($params['templateParagraphMarginBottom'])) { $params['templateParagraphMarginBottom'] = '1'; }
if (!isset($params['menuFontSize']) || empty($params['menuFontSize'])) { $params['menuFontSize'] = '12'; }
?>