<?php
/**
 * default for mod_imprinter
 *
 * @package         Joomla
 * @subpackage      Imprinter Module
 * @author          Michael S. RitZenhoff by Interim Webmanagement
 * @author url      http://interim-webmanagement.net
 * @author email    info@interim-webmanagement.net
 * @license         GNU/GPL, see /assets/license.txt
 * @copyright       Copyright (C) 2015. Michael S. RitZenhoff by Interim Webmanagement. All rights reserved.
 **/

// No direct access
defined('_JEXEC') or die;

$urlModuleTemplate = JURI::base(true) . "/modules/{$module->module}/tmpl/";
$document = JFactory::getDocument();
$theme = $params->get('theme', 'default');

/* ========================================================================= */

$ws = '&nbsp;';
//$ws = '&#160;';

$hidden = 'hidden';

// Extras Tab
$microformat2 = htmlspecialchars($params->get('microformat2'));
$imprintercss = htmlspecialchars($params->get('imprintercss'));
if($imprintercss == 1) :
    //add css
    $document->addStyleSheet($urlModuleTemplate . 'css/imprinter.min.css');
endif;

$title = htmlspecialchars($module->title);
$showtitle = htmlspecialchars($module->showtitle);

/* ========================================================================= */

// Imprint Tab
$organizationname = htmlspecialchars($params->get('organizationname'));
$organizationdescription = htmlspecialchars($params->get('organizationdescription'));

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
$openingHours = $params->get('openingHours');

// Additional Tab
$accessory = $params->get('accessory');

/* ========================================================================= */

function convert_email($email) {
    $pieces = str_split(trim($email));
    $emailAddress = '';
    foreach ($pieces as $val) {
        $emailAddress .= '&#'.ord($val).';';
    }
    return $emailAddress;

}

/* ========================================================================= */

/*
 * <article <?php $moduleclass_sfx ? print 'class="' . $moduleclass_sfx . '"' : ''; ?>>
 */

if($showtitle == 1) :
    ?>
    <header>
        <h2 role="heading"><?php print $title; ?></h2>
    </header>
    <?php
endif;
?>

    <section data-role="imprint-vcard">
        <h3 hidden><?php print 'h-card for ' . $organizationname; ?></h3>

        <h3 class="p-note">Inhaltliche Verantwortlichkeit gem&auml&szlig; <small><a title="Informationspflichten und Informationsrechte" href="http://www.juris.de/jportal/portal/page/bshaprod.psml?doc.id=jlr-RdFunkStVtrHAV3P55&amp;st=lr&amp;showdoccase=1&amp;paramfromHL=true#focuspoint" rel="external">&sect; 55 Abs. 2 RStV</a></small> sowie <small><a title="Allgemeine Informationspflichten" href="http://www.gesetze-im-internet.de/tmg/__5.html" rel="external">&sect; 5 TMG</a></small></h3>

    <?php
    if($organizationname) :
        ?>
        <div class="h-card vcard" typeof="Organization" itemscope itemtype="http://schema.org/Organization">
        <?php
    else:
        ?>
        <div class="h-card vcard">
        <?php
    endif;
    ?>

        <?php
        /*
         * $organizationname
         * $organizationdescription
         */
        if($organizationname) :
            ?>
            <span class="p-org org">
                <?php
                $organizationname ? print '<h4 class="p-organization-name organization-name" itemprop="legalName">' . $organizationname . '</h4>' : print '';
                $organizationdescription ? print '<span class="p-category category" itemprop="description">' . $organizationdescription . '</span>' : print '';
                ?>
            </span>
            <?php
        endif;

        /*
         * $authorurl
         * $nameurl
         * $nameurltitle
         * 
         * $honorificprefix
         * $honorificsuffix
         * 
         * $firstname
         * $secondname
         * $lastname
         * $gender
         *
         * $jobtitle
         */
        if($firstname || $lastname) :
            ?>
            <span vocab="http://schema.org/" typeof="Person" itemscope itemtype="http://schema.org/Person">
                <span class="p-name p-n n" property="name" itemprop="name">
                    <?php
                    if($authorurl):
                        ?>
                        <a class="u-url url" href="<?php print $authorurl; ?>">
                        <?php
                    endif;
                    // start link: p-name u-url

                    $firstname ? print '<span class="p-given-name given-name" itemprop="givenName">' . $firstname .  $ws . '</span>' : print '';
                    $lastname ? print '<span class="p-family-name family-name" itemprop="familyName">' . $lastname . '</span>' : print '';

                    // end link: p-name u-url
                    if($authorurl):
                        ?>
                        </a>
                        <?php
                    endif;
                    ?>
                </span>

                <span class="p-name" property="name" itemprop="name">
                    <?php
                    if($nameurl) :
                        ?>
                        <a class="p-fn u-url fn url" href="<?php print $nameurl; ?>"<?php $nameurltitle ? print ' title="' . $nameurltitle . '"' : print ''; ?>>
                        <?php
                    endif;
                    // start link: p-name u-url

                    //$honorificprefix ? print '<span class="p-honorific-prefix honorific-prefix" itemprop="honorificPrefix">' . $honorificprefix .  $ws . '</span>' : print '';

                    $honorificsuffix ? print '<span class="p-honorific-suffix honorific-suffix" itemprop="honorificSuffix">' . $honorificsuffix . $ws . '</span>' : print '';

                    $firstname ? print '<span class="p-given-name given-name" itemprop="givenName">' . $firstname .  $ws . '</span>' : print '';

                    if($secondname) :
                        if($secondnameinitialbtn == 1) :
                            print '<span class="p-additional-name additional-name" itemprop="additionalName" title="' . $secondname . '">' . $secondnameinitial . $ws . '</span>';
                        else:
                            print '<span class="p-additional-name additional-name" itemprop="additionalName">' . $secondname .  $ws . '</span>';
                        endif;
                    endif;

                    $lastname ? print '<span class="p-family-name family-name" itemprop="familyName">' . $lastname . '</span>' : print '';

                    $gender ? print '<meta itemprop="gender" content="' . $gender . '" />' : print '';

                    // end link: p-name u-url
                    if($nameurl) :
                        ?>
                        </a>
                        <?php
                    endif;
                    ?>
                </span>
                <?php
                $jobtitle ? print '<span class="p-job-title title" itemprop="jobTitle">' . $jobtitle . '</span>' : print '';
                ?>
            </span>
            <?php
        endif;
        ?>

        <?php
        /*
         * $postoffice
         * $postofficeboxaddress
         * $postofficeboxnumber
         * 
         * $street
         * $postalcode
         * $city
         * $region
         * $country
         */
        ?>
        <span itemprop="location" itemscope itemtype="http://schema.org/Place">
            <?php
            if($postofficeboxaddress || $street || $postalcode || $city) :
                ?>
                <span class="p-adr h-adr adr" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <?php
                    if($postofficeboxaddress && $postofficeboxnumber) :
                        ?>
                        <span class="p-post-office">
                            <?php
                            $postoffice ? print '<span>' . $postoffice . $ws . '</span>' : print '';
                            ?>
                            <span class="p-post-office-box" itemprop="postOfficeBox"><?php print $postofficeboxaddress . $ws; ?></span>
                            <span class="p-post-office-box-number" itemprop="postOfficeBoxNumber"><?php print $postofficeboxnumber; ?></span>
                        </span>
                        <?php
                    endif;

                    $street ? print '<span class="p-street-address street-address" itemprop="streetAddress">' . $street . '</span>' : print '';

                    $extendedaddress ? print '<span class="p-extended-address extended-address" itemprop="extendedAddress">' . $extendedaddress . '</span>' : print '';

                    if($postalcode || $city) :
                        ?>
                        <span class="city">
                            <?php
                            $postalcode ? print '<span class="p-postal-code postal-code" itemprop="postalCode">' . $postalcode . $ws . '</span>' : print '';
                            $city ? print '<span class="p-locality locality" itemprop="addressLocality">' . $city . '</span>' : print '';
                            ?>
                        </span>
                        <?php
                    endif;

                    if($region || $country) :
                        ?>
                        <span>
                            <?php
                            $region ? print '<span class="p-region region" itemprop="addressRegion">' . $region . '</span><span>/</span>' : print '';
                            $country ? print '<span class="p-country-name country-name" itemprop="addressCountry">' . $country . '</span>' : print '';
                            ?>
                        </span>
                        <?php
                    endif;
                    ?>
                </span>
                <?php
            endif;
            ?>

            <?php
            /*
             * $geolatitude
             * $geolongitude
             * $geoaltitude
             */
            if($geolatitude && $geolongitude) :
                ?>
                <span class="h-geo"<?php ($geohidden == 1) ? print $hidden : print ''; ?>>
                    <span class="type work">GEO:<?php print $ws; ?></span>
                    <?php // backward compatibility ?>
                    <span class="p-latitude"><?php print $geolatitude; ?></span>
                    <span class="p-longitude"><?php print ';' . $geolongitude; ?></span>
                    <?php
                    if($geoaltitude) :
                        ?>
                        <span class="p-altitude"><?php print ';' . $geoaltitude; ?></span>
                        <?php
                    endif;
                    ?>
                </span>
                <?php
            endif;
            ?>

            <?php
            /*
             * $telephone
             * $telephonephonecall
             */
            if($telephone) :
                ?>
                <span class="p-tel cell" itemprop="telephone">
                    <span class="type work VOICE">Tel:<?php print $ws; ?></span>
                    <span class="value" property="telephone"><?php print $telephone; ?></span>
                    <?php
                    if($telephonecall == 1) :
                        ?>
                        <a class="u-url" href="tel:<?php print $telephone; ?>" title="Anruf t&auml;tigen"><span></span>Anruf</a>
                        <?php
                    endif;
                ?>
                </span>
                <?php
            endif;

            /*
             * $telefax
             */
            if($telefax) :
                ?>
                <span class="p-fax fax" itemprop="faxNumber">
                    <span class="type fax work">Fax:<?php print $ws; ?></span>
                    <span class="value"><?php print $telefax; ?></span>
                </span>
                <?php
            endif;

            /*
             * $mobilephone
             * $mobilephonecall
             * $mobilephonesms
             */
            if($mobilephone) :
                ?>
                <span class="p-tel mobil" itemprop="telephone">
                    <span class="type work VOICE mobil msg">Mobil:<?php print $ws; ?></span>
                    <span class="value" property="telephone"><?php print $mobilephone; ?></span>
                    <?php
                    if($mobilephonecall == 1) :
                        ?>
                        <a class="u-url" href="tel:<?php print $mobilephone; ?>" title="Anruf t&auml;tigen"><span></span>Anruf</a>
                        <?php
                    endif;

                    if($mobilephonesms == 1) :
                        ?>
                        <a class="u-url" href="sms:<?php print $mobilephone; ?>" title="SMS schicken"><span></span>SMS</a>
                        <?php
                    endif;
                ?>
                </span>
                <?php
            endif;
            ?>
        </span>

        <?php
        /*
         * $email
         */
        if($email):
            ?>
            <span class="u-email org pref">
                <span class="type" title="pref">E-Mail:<?php print $ws; ?></span>
                <span class="value"><a class="email" itemprop="email" href="mailto:<?php print convert_email($email); ?>" title=""><?php print convert_email($email); ?></a></span>
            </span>
            <?php
        endif;


        /*
         * $url
         */
        if($url):
            ?>
            <span class="domain">
                <span title="online">//www:<?php print $ws; ?></span>
                <span><a class="p-name u-url org url" itemprop="url" href="<?php print $url; ?>" title=""><?php print $url; ?></a></span>
            </span>
            <?php
        endif;


        /*
         * $openingHours
         */
        if($openingHours):
            ?>
            <span><?php print $openingHours . ': '; ?><time itemprop="openingHours" datetime="Mo-Fr 07:00-23:00">Monday-Friday 7am-11pm</time></span>
            <?php
        endif;
        /*
         * <time itemprop="openingHours" datetime="Tu,Th 16:00-20:00">Tuesdays and Thursdays 4-8pm</time>
         * <time itemprop="openingHours" datetime="Mo-Su">Monday through Sunday, all day</time>
         * 
         * Montag 10:00-18:00
         * Dienstag 10:00-18:00
         * Mittwoch 10:00-18:00
         * Donnerstag 10:00-18:00
         * Freitag 10:00-18:00
         * Samstag Geschlossen
         * Sonntag Geschlossen
         */
        ?>
        </div>
    </section>

    <section>
        <h4 hidden><?php print 'Extended Information for ' . $organizationname; ?></h4>
        <?php
        /*
         * $vatid
         */
        if($vatid):
            ?>
            <p data-vatid="de">USt-IdNr. gem&auml;&szlig; 19 UStG: <?php print $vatid; ?></p>
            <?php
            /*
             * <p data-vatid="de">USt-IdNr. gem&auml&szlig; Â§ 19 UStG / Â§ 27 UStG: <?php print $vatid; ?></p>
             */
        endif;


        /*
         * $microformat2
         */
        if($microformat2 == 1):
            ?>
            <small class="microformat2">This content uses <a target="_blank" href="http://microformats.org/wiki/microformats2">microformats 2</a></small>
            <?php
        endif;
        ?>
    </section>

    <?php
    if($accessory):
        ?>
        <section>
            <h4 hidden><?php print 'Additional Information for ' . $organizationname; ?></h4>
            <?php
            /*
             * $accessory
             */
            if($accessory):
                print $accessory;
            endif;
            ?>
        </section>
        <?php
    endif;
    ?>
<?php
/*
 * </article>
 */
