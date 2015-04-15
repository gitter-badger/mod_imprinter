<?php
/**
 * Helper class for mod_imprinter
 * 
 * @package         Joomla
 * @subpackage      Imprinter Module
 * @author          Michael S. RitZenhoff by Interim Webmanagement
 * @author url      http://interim-webmanagement.net
 * @author email    info@interim-webmanagement.net
 * @license         GNU/GPL, see /assets/license.txt
 * @copyright       Copyright (C) 2015. Michael S. RitZenhoff by Interim Webmanagement. All rights reserved.
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.module.helper');

class ModImprinterHelper {

    /**
     * @param array $params An object containing the module parameters
     * @access public
     */
    public function getImprinter($params) {
        return $params;
    }

}
