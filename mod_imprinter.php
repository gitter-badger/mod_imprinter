<?php

/**
 * mod_imprinter Module Entry Point
 *
 * @package     Joomla
 * @subpackage  Imprinter Module for Joomla 3.4+
 * @author      interim-webmanagement.net
 * @copyright   (C) 2015 - Interim Webmanagement
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 **/
// no direct access
defined('_JEXEC') or die;

//include helpers of the component and module
require_once dirname(__FILE__) . '/helper.php';

$imprinter = modImprinterHelper::getImprinter($params);

// Render the module
require JModuleHelper::getLayoutPath('mod_imprinter', $params->get('layout', 'default'));
