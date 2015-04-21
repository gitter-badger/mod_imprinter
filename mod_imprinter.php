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

$document = JFactory::getDocument();

$base = JUri::base(true);
$modTemplate = $base . "modules/{$module->module}/tmpl/";

//include helpers of the component and module
require_once dirname(__FILE__) . '/helper.php';

$imprinter = modImprinterHelper::getImprinter($params);


/* # *
 * ========================================================================= */

$showtitle = htmlspecialchars($module->showtitle);
$title = htmlspecialchars($module->title);

/* EXTRA
 * ========================================================================= */

// Extras Tab
$microformat2 = htmlspecialchars($params->get('microformat2'));

// add CSS
$imprintercss = htmlspecialchars($params->get('imprintercss'));
if($imprintercss == 1) :
    JFactory::getDocument()->addStyleSheet($modTemplate . 'css/imprinter.min.css');
endif;


/* set show/hide values
 * ========================================================================= */

// Owner Tab
$honorificprefix = htmlspecialchars($params->get('honorificprefix'));
$honorificsuffix = htmlspecialchars($params->get('honorificsuffix'));
$hprefix0 = htmlspecialchars($params->get('hprefix0'));
$hprefix1 = htmlspecialchars($params->get('hprefix1'));

$firstname = htmlspecialchars($params->get('firstname'));
$secondname = htmlspecialchars($params->get('secondname'));
$secondnameinitialbtn = htmlspecialchars($params->get('secondnameinitialbtn'));
$secondnameinitial = htmlspecialchars($params->get('secondnameinitial'));
$lastname = htmlspecialchars($params->get('lastname'));
$gender = htmlspecialchars($params->get('gender'));

$authorurl = htmlspecialchars($params->get('authorurl'));
$nameurl = htmlspecialchars($params->get('nameurl'));
$nameurltitle = htmlspecialchars($params->get('nameurltitle'));
$jobtitle = htmlspecialchars($params->get('jobtitle'));

// Imprint Tab
$organizationname = htmlspecialchars($params->get('organizationname'));
$organizationdesc = htmlspecialchars($params->get('organizationdesc'));

$startbusiness = htmlspecialchars($params->get('startbusiness'));
$vatid = htmlspecialchars($params->get('vatid'));

// Location Tab
$street = htmlspecialchars($params->get('street'));
$extendedaddress = htmlspecialchars($params->get('extendedaddress'));
$postalcode = htmlspecialchars($params->get('postalcode'));
$city = htmlspecialchars($params->get('city'));
$region = htmlspecialchars($params->get('region'));
$country = htmlspecialchars($params->get('country'));

$georegion = htmlspecialchars($params->get('georegion'));
$geoplacename = htmlspecialchars($params->get('geoplacename'));
$geolatitude = htmlspecialchars($params->get('geolatitude'));
$geolongitude = htmlspecialchars($params->get('geolongitude'));
$geoaltitude = htmlspecialchars($params->get('geoaltitude'));
$geohidden = htmlspecialchars($params->get('geohidden'));

// Contact Tab
$postoffice = htmlspecialchars($params->get('postoffice'));
$postofficeboxaddress = htmlspecialchars($params->get('postofficeboxaddress'));
$postofficeboxnumber = htmlspecialchars($params->get('postofficeboxnumber'));

$telephone = htmlspecialchars($params->get('telephone'));
$telephonecall = htmlspecialchars($params->get('telephonecall'));

$telefax = htmlspecialchars($params->get('telefax'));

$mobilephone = htmlspecialchars($params->get('mobilephone'));
$mobilephonecall = htmlspecialchars($params->get('mobilephonecall'));
$mobilephonesms = htmlspecialchars($params->get('mobilephonesms'));

$email = htmlspecialchars($params->get('email'));

$url = htmlspecialchars($params->get('url'));

// OpeningHours Tab
$openingHours = htmlspecialchars($params->get('openingHours'));

// Additional Tab
$headlinede = htmlspecialchars($params->get('headlinede'));
$headlinededesc = htmlspecialchars($params->get('headlinededesc'));
$accessory = $params->get('accessory');


/* ========================================================================= */

$space = '&nbsp;';
//$space = '&#160;';

$hidden = 'hidden';


/* #
 * ========================================================================= */

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Render the module
require JModuleHelper::getLayoutPath('mod_imprinter', $params->get('layout', 'default'));
