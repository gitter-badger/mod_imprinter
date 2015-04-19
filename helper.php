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

/* ========================================================================= */

class modImprinterHelper {

    public static function getImprinter($params) {
        // https://docs.joomla.org/Securing_Joomla_extensions

        $db = JFactory::getDbo();
        $string = $db->escape( $string );

        $value = $_GET['value'];
        $value = intval($value);

        $query = $db->getQuery(true);
        $query = "SELECT * FROM #__modules mod_imprinter WHERE id = $value";

        $db->setQuery($query);

        $result = $db->loadResult();

        return $result;
    }

}


/* convert E-Mail to ASCII
 * ========================================================================= */

function convert_email($email) {
    $pieces = str_split(trim($email));
    $emailAddress = '';

    foreach ($pieces as $val) {
        $emailAddress .= '&#'.ord($val).';';
    }

    return $emailAddress;
}
