<?php
/**
 * Installer class for mod_imprinter
 * 
 * @package         Joomla
 * @subpackage      Imprinter Module
 * @author          Michael S. RitZenhoff by Interim Webmanagement
 * @author url      http://interim-webmanagement.net
 * @author email    info@interim-webmanagement.net
 * @license         GNU/GPL, see /assets/license.txt
 * @copyright       Copyright (C) 2015. Michael S. RitZenhoff by Interim Webmanagement. All rights reserved.
 **/

/*
 * https://docs.joomla.org/Deploying_an_Update_Server
 * https://docs.joomla.org/J3.x:Creating_a_simple_module/Using_the_Database
 * https://docs.joomla.org/J3.x:Creating_a_simple_module/Adding_an_install-uninstall-update_script_file
 */

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
        print '<h4>The module has been installed</h4>';
    }

    /**
     * Method to uninstall the extension
     * $parent is the class calling this method
     *
     * @return void
     */
    function uninstall($parent) {
        print '<h4>The module has been uninstalled</h4>';
    }

    /**
     * Method to update the extension
     * $parent is the class calling this method
     *
     * @return void
     */
    function update($parent) {
        print '<h4>The module has been updated to version: <code>' . $parent->get('manifest')->version . '</code></h4>';
    }

    /**
     * Method to run before an install/update/uninstall method
     * $parent is the class calling this method
     * $type is the type of change (install, update or discover_install)
     *
     * @return void
     */
    function preflight($type, $parent) {
        //print '<h4>Anything here happens before the installation/update/uninstallation of the module</h4>';
    }

    /**
     * Method to run after an install/update/uninstall method
     * $parent is the class calling this method
     * $type is the type of change (install, update or discover_install)
     *
     * @return void
     */
    function postflight($type, $parent) {
        //print '<h4>Anything here happens after the installation/update/uninstallation of the module</h4>';
    }

}
