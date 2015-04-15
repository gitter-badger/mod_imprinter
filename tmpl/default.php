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

$imprintercss = htmlspecialchars($params->get('imprintercss'));
if($imprintercss == 1) :
    //add css
    $document->addStyleSheet($urlModuleTemplate . 'css/imprinter.min.css');
endif;

$title = htmlspecialchars($module->title);
$showtitle = htmlspecialchars($module->showtitle);

// Imprint Tab
$companyname = htmlspecialchars($params->get('companyname'));
$companyservice = htmlspecialchars($params->get('companyservice'));

$firstname = htmlspecialchars($params->get('firstname'));
$secondname = htmlspecialchars($params->get('secondname'));
$lastname = htmlspecialchars($params->get('lastname'));
$authorurl = htmlspecialchars($params->get('authorurl'));
$nameurl = htmlspecialchars($params->get('nameurl'));
$nameurltitle = htmlspecialchars($params->get('nameurltitle'));
$jobtitle = htmlspecialchars($params->get('jobtitle'));

$start_business = htmlspecialchars($params->get('start_business'));
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

$microformat2 = htmlspecialchars($params->get('microformat2'));

?>
<article <?php $moduleclass_sfx ? print 'class="' . $moduleclass_sfx . '"' : ''; ?>>
<?php
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
    if($companyname) :
        ?>
        <div class="h-card vcard" vocab="http://schema.org/" typeof="Organization" itemscope itemtype="http://data-vocabulary.org/#Organization">
        <?php
    else:
        ?>
        <div>
        <?php
    endif;
    ?>

        <?php
        if($companyname) :
            ?>
            <p class="p-org">
                <?php if($companyname) :
                    ?>
                    <span class="p-organization-name" itemprop="name"><?php print $companyname; ?></span>
                    <?php
                endif;

                if($companyservice) :
                    ?>
                    <span class="p-category" itemprop="description"><?php print $companyservice; ?></span>
                    <?php
                endif;
                ?>
            </p>
            <?php
        endif;
        ?>

        <?php
        if($firstname || $lastname) :
            ?>
            <span vocab="http://schema.org/" typeof="Person" itemscope itemtype="http://data-vocabulary.org/#Person">
                <span class="p-n" property="name" itemprop="name">
                    <?php
                    // start link: p-name u-url
                    if($authorurl) :
                        ?>
                        <a class="p-name u-url" href="https://plus.google.com/112687566145330736121?rel=author">
                        <?php
                    endif;
                    // start link: p-name u-url

                    if($firstname) :
                        ?>
                        <span class="p-given-name" property="foaf:name"><?php print $firstname; ?></span>
                        <?php
                    endif;

                    if($lastname) :
                        ?>
                        <span class="p-family-name" property="foaf:givenName"><?php print $lastname; ?></span>
                        <?php
                    endif;

                    // end link: p-name u-url
                    if($authorurl) :
                        ?>
                        </a>
                        <?php
                    endif;
                    // end link: p-name u-url
                    ?>
                </span>

                <span class="p-fn u-url" property="name" itemprop="name">
                    <?php
                    // start link: p-name u-url
                    if($nameurl) :
                        ?>
                        <a class="p-name u-url" href="<?php print $nameurl; ?>"<?php $nameurltitle ? ' title="' . print $nameurltitle . '"' : ''; ?>>
                        <?php
                    endif;
                    // start link: p-name u-url

                        if($honorificprefix) :
                            ?>
                            <span class="p-honorific-prefix"><?php print $honorificprefix; ?></span>
                            <?php
                        endif;

                        if($honorificsuffix) :
                            ?>
                            <span class="p-honorific-suffix"><?php print $honorificsuffix; ?></span>
                            <?php
                        endif;

                        if($firstname) :
                            ?>
                            <span class="p-given-name"><?php print $firstname; ?></span>
                            <?php
                        endif;

                        if($secondname) :
                            ?>
                            <abbr class="p-additional-name" title="<?php print $secondname; ?>"><?php print $secondname; ?>.</abbr>
                            <?php
                        endif;

                        if($lastname) :
                            ?>
                            <span class="p-family-name"><?php print $lastname; ?></span>
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
                    <span class="p-job-title" property="jobTitle" itemprop="jobTitle"><?php print $jobtitle; ?></span>
                    <?php
                endif;
                ?>
            </span>
            <?php
        endif;
        ?>

        <span itemprop="location" itemscope itemtype="http://schema.org/#Place">
            <?php
            if($street || $postalcode || $city) :
                ?>
                <span class="h-adr" itemprop="address" itemscope itemtype="http://schema.org/#PostalAddress">
                <?php
                if($street) :
                    ?>
                    <span class="p-street-address" itemprop="streetAddress"><?php print $street; ?></span>
                    <?php
                endif;

                if($postalcode || $city) :
                    ?>
                    <span class="city">
                        <span class="p-postal-code" itemprop="postalCode"><?php print $postalcode; ?></span>
                        <span class="p-locality" itemprop="addressLocality"><?php print $city; ?></span>
                    </span>
                    <?php
                endif;

                if($region || $country) :
                    ?>
                    <span>
                        <?php
                        if($region) :
                            ?>
                            <abbr class="p-region" itemprop="addressRegion" title="<?php print $region; ?>"><?php print $region; ?></abbr>
                            <span>/</span>
                            <?php
                        endif;

                        if($country) :
                            ?>
                            <span class="p-country-name"><?php print $country; ?></span>
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
            if($telephone) :
                ?>
                <div class="p-tel cell" itemprop="telephone">
                    <span class="type work">Tel: </span>
                    <span class="value" property="telephone"><?php print $telephone; ?></span>
                    <?php
                    if($telephonephonecall == 1) :
                        ?>
                        <a class="u-url" href="tel:<?php print $telephone; ?>" title="Anruf tätigen"><span></span>Anruf</a>
                        <?php
                    endif;
                ?>
                </div>
                <?php
            endif;

            if($mobilephone) :
                ?>
                <span class="p-tel mobil" itemprop="telephone">
                    <span class="type mobil">Mobil: </span>
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

            if($telefax) :
                ?>
                <span class="p-fax" itemprop="faxNumber">
                    <span class="type work">Fax: </span>
                    <span class="value" property="faxNumber"><?php print $telefax; ?></span>
                </span>
                <?php
            endif;
            ?>
        </span>

        <?php
        if($email):
            ?>
            <span class="u-email org pref">
                <span class="type" title="pref">E-Mail: </span>
                <span class="value"><a class="email" itemprop="email" href="mailto:<?php print $email; ?>" title=""><?php print $email; ?></a></span>
            </span>
            <?php
        endif;
        ?>

        <?php
        if($url):
            ?>
            <span class="url">
                <span title="online">//www: </span>
                <span><a class="p-name u-url org" itemprop="url" href="<?php print $url; ?>" title=""><?php print $url; ?></a></span>
            </span>
            <?php
        endif;
        ?>

        </div>
    </section>

    <?php
    if($vatid):
        ?>
        <p data-vatid="de">USt-IdNr. gemäß § 19 UStG / § 27 UStG: <?php print $vatid; ?></p>
        <?php
    endif;
    ?>

    <?php
    if($microformat2 == 1):
        ?>
        <small class="microformat2">This content uses <a target="_blank" href="http://microformats.org/wiki/microformats2">microformats 2</a></small>
        <?php
    endif;
    ?>
</article>
