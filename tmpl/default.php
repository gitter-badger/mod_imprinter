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

$authorurl = htmlspecialchars($params->get('authorurl'));
$nameurl = htmlspecialchars($params->get('nameurl'));
$nameurltitle = htmlspecialchars($params->get('nameurltitle'));
$jobtitle = htmlspecialchars($params->get('jobtitle'));

$startbusiness = htmlspecialchars($params->get('startbusiness'));
$vatid = htmlspecialchars($params->get('vatid'));

// Contact Tab
$telephone = htmlspecialchars($params->get('telephone'));
$telephonecall = htmlspecialchars($params->get('telephonecall'));

$telefax = htmlspecialchars($params->get('telefax'));

$mobilephone = htmlspecialchars($params->get('mobilephone'));
$mobilephonecall = htmlspecialchars($params->get('mobilephonecall'));
$mobilephonesms = htmlspecialchars($params->get('mobilephonesms'));

$email = htmlspecialchars($params->get('email'));
$url = htmlspecialchars($params->get('url'));

// Location Tab
$street = htmlspecialchars($params->get('street'));
$postalcode = htmlspecialchars($params->get('postalcode'));
$city = htmlspecialchars($params->get('city'));
$region = htmlspecialchars($params->get('region'));
$country = htmlspecialchars($params->get('country'));

$georegion = htmlspecialchars($params->get('georegion'));
$geoplacename = htmlspecialchars($params->get('geoplacename'));
$geolatitude = htmlspecialchars($params->get('geolatitude'));
$geolongitude = htmlspecialchars($params->get('geolongitude'));

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

    <h3>Inhaltliche Verantwortlichkeit gemäß <small><a title="Informationspflichten und Informationsrechte" href="http://www.juris.de/jportal/portal/page/bshaprod.psml?doc.id=jlr-RdFunkStVtrHAV3P55&amp;st=lr&amp;showdoccase=1&amp;paramfromHL=true#focuspoint" rel="external">§ 55 Abs. 2 RStV</a></small> sowie <small><a title="Allgemeine Informationspflichten" href="http://www.gesetze-im-internet.de/tmg/__5.html" rel="external">§ 5 TMG</a></small></h3>

    <section data-role="imprint-vcard">
        <h3 hidden><?php print 'h-card for:' . $companyname; ?></h3>

    <?php
    if($organizationname) :
        ?>
        <div class="h-card vcard" vocab="http://schema.org/" typeof="Organization" itemscope itemtype="http://data-vocabulary.org/#Organization">
        <?php
    else:
        ?>
        <div class="h-card vcard">
        <?php
    endif;
    ?>

        <?php
        /*
         * $companyname
         * $companyservice
         */
        if($organizationname) :
            ?>
            <span class="p-org org">
                <?php
                $organizationname ? print '<span class="p-organization-name organization-name" itemprop="name">' . $organizationname . '</span>' : print '';
                $organizationdescription ? print '<span class="p-category category" itemprop="description">' . $organizationdescription . '</span>' : print '';
                ?>
            </span>
            <?php
        endif;

        /*
         * $firstname
         * $secondname
         * $lastname
         * 
         * $honorificprefix
         * $honorificsuffix
         *
         * $authorurl
         * $nameurl
         * $nameurltitle
         * 
         * $jobtitle
         */
        if($firstname || $lastname) :
            ?>
            <span vocab="http://schema.org/" typeof="Person" itemscope itemtype="http://data-vocabulary.org/#Person">
                <span class="p-n n" property="name" itemprop="name">
                    <?php
                    $authorurl ? print '<a class="p-name u-url url" href="' . $authorurl . '">' : print '';
                    // start link: p-name u-url

                    $firstname ? print '<span class="p-given-name given-name">' . $firstname . '</span>' : print '';
                    $lastname ? print '<span class="p-family-name family-name">' . $lastname . '</span>' : print '';

                    // end link: p-name u-url
                    $authorurl ? print '</a>' : print '';
                    ?>
                </span>

                <span class="p-fn fn" property="name" itemprop="name">
                    <?php
                    // start link: p-name u-url
                    if($nameurl) :
                        ?>
                        <a class="p-name u-url url" href="<?php print $nameurl; ?>"<?php $nameurltitle ? print ' title="' . $nameurltitle . '"' : print ''; ?>>
                        <?php
                    endif;
                    // start link: p-name u-url

                        if($honorificprefix) :
                            ?>
                            <span class="p-honorific-prefix honorific-prefix"><?php print $honorificprefix; ?></span>
                            <?php
                        endif;

                        if($honorificsuffix) :
                            ?>
                            <span class="p-honorific-suffix honorific-suffix"><?php print $honorificsuffix; ?></span>
                            <?php
                        endif;

                        if($firstname) :
                            ?>
                            <span class="p-given-name given-name"><?php print $firstname; ?></span>
                            <?php
                        endif;

                        if($secondname) :
                            if($secondnameinitialbtn == 1) :
                                ?>
                                <span class="p-additional-name additional-name" title="<?php print $secondname; ?>"><?php print $secondnameinitial; ?></span>
                                <?php
                            else:
                                ?>
                                <span class="p-additional-name additional-name"><?php print $secondname; ?></span>
                                <?php
                            endif;
                        endif;

                        if($lastname) :
                            ?>
                            <span class="p-family-name family-name"><?php print $lastname; ?></span>
                            <?php
                        endif;

                    // end link: p-name u-url
                    if($nameurl) :
                        ?>
                        </a>
                        <?php
                    endif;
                    // end link: p-name u-url
                    ?>
                </span>
                <?php
                if($jobtitle) :
                    ?>
                    <span class="p-job-title title" itemprop="jobTitle"><?php print $jobtitle; ?></span>
                    <?php
                endif;
                ?>
            </span>
            <?php
        endif;
        ?>

        <?php
        /*
         * $street
         * $postalcode
         * $city
         * $region
         * $country
         */
        ?>
        <span itemprop="location" itemscope itemtype="http://schema.org/#Place">
            <?php
            if($street || $postalcode || $city) :
                ?>
                <span class="h-adr adr" itemprop="address" itemscope itemtype="http://schema.org/#PostalAddress">
                <?php
                if($street) :
                    ?>
                    <span class="p-street-address street-address" itemprop="streetAddress"><?php print $street; ?></span>
                    <?php
                endif;

                if($postalcode || $city) :
                    ?>
                    <span class="city">
                        <span class="p-postal-code postal-code" itemprop="postalCode"><?php print $postalcode; ?></span>
                        <span class="p-locality locality" itemprop="addressLocality"><?php print $city; ?></span>
                    </span>
                    <?php
                endif;

                if($region || $country) :
                    ?>
                    <span>
                        <?php
                        if($region) :
                            ?>
                            <span class="p-region region" itemprop="addressRegion"><?php print $region; ?></span>
                            <span>/</span>
                            <?php
                        endif;

                        if($country) :
                            ?>
                            <span class="p-country-name country-name"><?php print $country; ?></span>
                            <?php
                        endif;
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
                <span class="h-geo">
                    <span class="type work">GEO: </span>
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
                <div class="p-tel cell" itemprop="telephone">
                    <span class="type work VOICE">Tel: </span>
                    <span class="value" property="telephone"><?php print $telephone; ?></span>
                    <?php
                    if($telephonecall == 1) :
                        ?>
                        <a class="u-url" href="tel:<?php print $telephone; ?>" title="Anruf tätigen"><span></span>Anruf</a>
                        <?php
                    endif;
                ?>
                </div>
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
                    <span class="type work VOICE mobil msg">Mobil: </span>
                    <span class="value" property="telephone"><?php print $mobilephone; ?></span>
                    <?php
                    if($mobilephonecall == 1) :
                        ?>
                        <a class="u-url" href="tel:<?php print $mobilephone; ?>" title="Anruf tätigen"><span></span>Anruf</a>
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

            /*
             * $telefax
             */
            if($telefax) :
                ?>
                <span class="p-fax fax" itemprop="faxNumber">
                    <span class="type fax work">Fax: </span>
                    <span class="value" property="faxNumber"><?php print $telefax; ?></span>
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
                <span class="type" title="pref">E-Mail: </span>
                <span class="value"><a class="email" itemprop="email" href="mailto:<?php print convert_email($email); ?>" title=""><?php print convert_email($email); ?></a></span>
            </span>
            <?php
        endif;
        ?>

        <?php
        /*
         * $url
         */
        if($url):
            ?>
            <span class="domain">
                <span title="online">//www: </span>
                <span><a class="p-name u-url org url" itemprop="url" href="<?php print $url; ?>" title=""><?php print $url; ?></a></span>
            </span>
            <?php
        endif;
        ?>

        </div>
    </section>

    <section>
        <h4 hidden><?php print 'Extended Information for' . $companyname; ?></h4>
        <?php
        /*
         * $vatid
         */
        if($vatid):
            ?>
            <p data-vatid="de">USt-IdNr. gemäß § 19 UStG: <?php print $vatid; ?></p>
            <?php
            /*
             * <p data-vatid="de">USt-IdNr. gemäß § 19 UStG / § 27 UStG: <?php print $vatid; ?></p>
             */
        endif;
        ?>

        <?php
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
            <h4 hidden><?php print 'Additional Information for' . $companyname; ?></h4>
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
