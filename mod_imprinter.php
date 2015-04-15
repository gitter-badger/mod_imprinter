<?php
/**
 * mod_imprinter Module Entry Point
 * 
 * @package         Joomla
 * @subpackage      Imprinter Module
 * @author          Michael S. RitZenhoff by Interim Webmanagement
 * @author url      http://interim-webmanagement.net
 * @author email    info@interim-webmanagement.net
 * @license         GNU/GPL, see /assets/license.txt
 * @copyright       Copyright (C) 2015. Michael S. RitZenhoff by Interim Webmanagement. All rights reserved.
 **/

// no direct access
defined('_JEXEC') or die;

//include helpers of the component and module
require_once dirname(__FILE__) . '/helper.php';

$imprinter          = modImprinterHelper::getImprinter($params);
$moduleclass_sfx    = htmlspecialchars($params->get('moduleclass_sfx'));

// Render the module
require JModuleHelper::getLayoutPath('mod_imprinter', $params->get('layout', 'default'));
