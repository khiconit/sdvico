<?php

/*
 * Hướng dẫn được viết bởi JoomlaBasic.com
 *
 */

defined('_JEXEC') or die('Restricted access');
require_once (dirname(__FILE__).'/helper.php');
$slider = modSliderHelper::getSlider();
require(JModuleHelper::getLayoutPath('mod_slider'));

?>