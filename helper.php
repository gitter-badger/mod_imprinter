<?php
/**
 * Helper class for mod_imprinter
 *
 * @package         Module Imprinter for Joomla! 3.x
 * @author          Michael S. RitZenhoff
 * @author url      http://iwm.agency
 * @author email    info@iwm.agency
 * @copyright       Copyright (C) 2015. Michael S. RitZenhoff. All rights reserved.
 * @license         GNU/GPLv3, http://www.gnu.org/licenses/gpl-3.0.html, see /assets/en-GB.license.txt
 **/

// no direct access
defined('_JEXEC') or die;

/* ========================================================================= */

class modImprinterHelper {

    private $params;
    private $database;
    private $string;
    private $value;
    private $query;
    private $result;

    public static function getImprinter($params) {
        // https://docs.joomla.org/Securing_Joomla_extensions

        $database = JFactory::getDbo();
        $string = $database->escape($string);

        $value = intval($_GET['value']);

        $query = $database->getQuery(true);
        $query = "SELECT * FROM #__modules mod_imprinter WHERE id = $value";

        $database->setQuery($query);

        $result = $database->loadResult();

        return $result;
    }

}

/* convert E-Mail to ASCII
 * ========================================================================= */

function convert_email($email) {
    $pieces = str_split(trim($email));
    $emailAddress = '';

    foreach ($pieces as $val) {
        $emailAddress .= '&#' . ord($val) . ';';
    }

    return $emailAddress;
}
