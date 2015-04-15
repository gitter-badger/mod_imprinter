<?php

/**
 * Helper class for mod_imprinter
 *
 * @package     Joomla
 * @subpackage  Imprinter Module
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
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
