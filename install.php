<?php
/**
 * @package     Joomla
 * @subpackage  Imprinter Module for Joomla 3.4+
 * @author      interim-webmanagement.net
 * @copyright   (C) 2015 - Interim Webmanagement. All rights reserved.
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * */

// No direct access to this file
defined('_JEXEC') or die;

/**
 * Script file of Imprinter module
 */
class mod_ImprinterInstallerScript {

    /**
     * Method to install the extension
     * $parent is the class calling this method
     *
     * @return void
     */
    function install($parent) {
        print '<p>The module has been installed</p>';
    }

    /**
     * Method to uninstall the extension
     * $parent is the class calling this method
     *
     * @return void
     */
    function uninstall($parent) {
        print '<p>The module has been uninstalled</p>';
    }

    /**
     * Method to update the extension
     * $parent is the class calling this method
     *
     * @return void
     */
    function update($parent) {
        print '<p>The module has been updated to version' . $parent->get('manifest')->version . '</p>';
    }

    /**
     * Method to run before an install/update/uninstall method
     * $parent is the class calling this method
     * $type is the type of change (install, update or discover_install)
     *
     * @return void
     */
    function preflight($type, $parent) {
        print '<p>Anything here happens before the installation/update/uninstallation of the module</p>';
    }

    /**
     * Method to run after an install/update/uninstall method
     * $parent is the class calling this method
     * $type is the type of change (install, update or discover_install)
     *
     * @return void
     */
    function postflight($type, $parent) {
        print '<p>Anything here happens after the installation/update/uninstallation of the module</p>';
    }

}
