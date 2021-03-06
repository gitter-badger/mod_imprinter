<?php
/**
 * default for mod_imprinter
 *
 * @package         Module Imprinter for Joomla! 3.x
 * @author          Michael S. RitZenhoff
 * @author url      http://iwm.agency
 * @author email    info@iwm.agency
 * @copyright       Copyright (C) 2015. Michael S. RitZenhoff. All rights reserved.
 * @license         GNU/GPLv3, http://www.gnu.org/licenses/gpl-3.0.html, see /assets/en-GB.license.txt
 **/

// No direct access
defined('_JEXEC') or die;

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

        <?php
        print ($headlinede == 1) ? '<h3 class="p-note">Inhaltliche Verantwortlichkeit gem&auml;&szlig; <a title="Informationspflichten und Informationsrechte" href="//www.juris.de/jportal/portal/page/bshaprod.psml?doc.id=jlr-RdFunkStVtrHAV3P55&amp;st=lr&amp;showdoccase=1&amp;paramfromHL=true#focuspoint">&sect; 55 Abs. 2 RStV</a> sowie <a title="Allgemeine Informationspflichten" href="//www.gesetze-im-internet.de/tmg/__5.html">&sect; 5 TMG</a></h3>' : '';
        ?>

    <?php
    /*
     * $organizationname
     */
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
         * $organizationdesc
         */
        if($organizationname) :
            ?>
            <span class="p-org org">
                <?php
                print $organizationname ? '<span class="p-organization-name organization-name" itemprop="legalName">' . $organizationname . '</span>' : '';
                print $organizationdesc ? '<span class="p-category category" itemprop="description">' . $organizationdesc . '</span>' : '';
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
                <span class="p-name p-n n" property="name" itemprop="name" hidden>
                    <?php
                    if($authorurl):
                        ?>
                        <a class="u-url url" href="<?php print $authorurl; ?>?rel=author">
                        <?php
                    endif;
                    // start link: p-name u-url

                    print $firstname ? '<span class="p-given-name given-name" itemprop="givenName">' . $firstname .  $space . '</span>' : '';
                    print $lastname ? '<span class="p-family-name family-name" itemprop="familyName">' . $lastname . '</span>' : '';

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
                        <a class="p-fn u-url fn url" href="<?php print $nameurl; ?>"<?php print $nameurltitle ? ' title="' . $nameurltitle . '"' : ''; ?>>
                        <?php
                    endif;
                    // start link: p-name u-url

                    if ($honorificprefix == 1) :
                        print 'Herr' .  $space;
                    elseif ($honorificprefix == 2) :
                        print 'Frau' .  $space;
                    endif;

                    print $honorificsuffix ? '<span class="p-honorific-suffix honorific-suffix" itemprop="honorificSuffix">' . $honorificsuffix . $space . '</span>' : '';

                    print $firstname ? '<span class="p-given-name given-name" itemprop="givenName">' . $firstname .  $space . '</span>' : '';

                    if($secondname) :
                        if($secondnameinitialbtn == 1) :
                            print '<span class="p-additional-name additional-name" itemprop="additionalName" title="' . $secondname . '">' . $secondnameinitial . $space . '</span>';
                        else:
                            print '<span class="p-additional-name additional-name" itemprop="additionalName">' . $secondname .  $space . '</span>';
                        endif;
                    endif;

                    print $lastname ? '<span class="p-family-name family-name" itemprop="familyName">' . $lastname . '</span>' : '';

                    print $gender ? '<meta itemprop="gender" content="' . $gender . '" />' : '';
                    /*
                    ($honorificprefix == 1) ? 'Männlich' .  $space
                    ($honorificprefix == 1) ? 'Weiblich' .  $space
                    ($honorificprefix == 1) ? 'Agender' .  $space
                    ($honorificprefix == 1) ? 'Androgyne' .  $space
                    ($honorificprefix == 1) ? 'Androgynous' .  $space
                    ($honorificprefix == 1) ? 'Bigender' .  $space
                    ($honorificprefix == 1) ? 'Cis' .  $space
                    ($honorificprefix == 1) ? 'Cisgender' .  $space
                    ($honorificprefix == 1) ? 'Cis Female' .  $space
                    ($honorificprefix == 1) ? 'Cis Male' .  $space
                    ($honorificprefix == 1) ? 'Cis Man' .  $space
                    ($honorificprefix == 1) ? 'Cis Woman' .  $space
                    ($honorificprefix == 1) ? 'Cisgender Female' .  $space
                    ($honorificprefix == 1) ? 'Cisgender Male' .  $space
                    ($honorificprefix == 1) ? 'Cisgender Man' .  $space
                    ($honorificprefix == 1) ? 'Cisgender Woman' .  $space
                    ($honorificprefix == 1) ? 'Female to Male' .  $space
                    ($honorificprefix == 1) ? 'FTM' .  $space
                    */

                    // end link: p-name u-url
                    if($nameurl) :
                        ?>
                        </a>
                        <?php
                    endif;
                    ?>
                </span>
                <?php
                print $jobtitle ? '<span class="p-job-title title" itemprop="jobTitle">' . $jobtitle . '</span>' : '';
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
         * $extendedaddress
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
                        <span class="p-post-office" itemprop="PostOffice">
                            <?php
                            print $postoffice ? '<span>' . $postoffice . $space . '</span>' : '';
                            ?>
                            <span class="p-post-office-box" itemprop="postOfficeBox"><?php print $postofficeboxaddress . $space; ?></span>
                            <span class="p-post-office-box-number" itemprop="postOfficeBoxNumber"><?php print $postofficeboxnumber; ?></span>
                        </span>
                        <?php
                    endif;

                    print $street ? '<span class="p-street-address street-address" itemprop="streetAddress">' . $street . '</span>' : '';

                    print $extendedaddress ? '<span class="p-extended-address extended-address">' . $extendedaddress . '</span>' : '';

                    if($postalcode || $city) :
                        ?>
                        <span class="city">
                            <?php
                            print $postalcode ? '<span class="p-postal-code postal-code" itemprop="postalCode">' . $postalcode . $space . '</span>' : '';
                            print $city ? '<span class="p-locality locality" itemprop="addressLocality">' . $city . '</span>' : '';
                            ?>
                        </span>
                        <?php
                    endif;

                    if($region || $country) :
                        ?>
                        <span>
                            <?php
                            print $region ? '<span class="p-region region" itemprop="addressRegion">' . $region . '</span><span>/</span>' : '';
                            print $country ? '<span class="p-country-name country-name" itemprop="addressCountry">' . $country . '</span>' : '';
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
             * $geohidden
             *
             * $geolatitude
             * $geolongitude
             * $geoaltitude
             */
            if($geolatitude && $geolongitude) :
                ?>
                <span class="h-geo" itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates"<?php print ($geohidden == 1) ? ' ' . $hidden : ''; ?>>
                    <span class="type work">GEO:<?php print $space; ?></span>
                    <?php // backward compatibility ?>
                    <span class="p-latitude" itemprop="latitude"><?php print $geolatitude; ?></span>
                    <span class="p-longitude" itemprop="longitude"><?php print ';' . $geolongitude; ?></span>
                    <?php
                    if($geoaltitude) :
                        ?>
                        <span class="p-altitude" itemprop="altitude"><?php print ';' . $geoaltitude; ?></span>
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
                    <span class="type work VOICE">Tel:<?php print $space; ?></span>
                    <span class="value" property="telephone"><?php print $telephone; ?></span>
                    <?php
                    print ($telephonecall == 1) ? '<a class="u-url" href="tel:' . $telephone . '" title="Anruf t&auml;tigen"><span></span>Anruf</a>' : '';
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
                    <span class="type fax work">Fax:<?php print $space; ?></span>
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
                    <span class="type work VOICE mobil msg">Mobil:<?php print $space; ?></span>
                    <span class="value" property="telephone"><?php print $mobilephone; ?></span>
                    <?php
                    print ($mobilephonecall == 1) ? '<a class="u-url" href="tel:' . $mobilephone . '" title="Anruf t&auml;tigen"><span></span>Anruf</a>' : '';
                    print ($mobilephonesms == 1) ? '<a class="u-url" href="sms:' . $mobilephone . '" title="SMS schicken"><span></span>SMS</a>' : '';
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
                <span class="type" title="pref">E-Mail:<?php print $space; ?></span>
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
                <span title="online">//www:<?php print $space; ?></span>
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

            <div itemscope itemtype="http://schema.org/OpeningHoursSpecification">
                <link itemprop-reverse="openingHoursSpecification" href="http://www.freebase.com/m/02j81" />Opening hours: Mo-Fri,
                <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Monday" />
                <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Tuesday" />
                <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Wednesday" />
                <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Thursday" />
                <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Friday" />
                <meta itemprop="opens" content="08:00:00">8:00 a.m. -
                <meta itemprop="closes" content="20:00:00">8:00 p.m.
            </div>
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
        <h3 hidden><?php print 'Extended Information for ' . $organizationname; ?></h3>
        <?php
        /*
         * $startbusiness
         */
        //print $startbusiness ? '<span itemprop="startDate">' . $startbusiness . '</span>' : '';

        /*
         * $vatid
         */
        print $vatid ? '<p class="vatid">USt-IdNr. gem&auml;&szlig; 19 UStG: ' . $vatid . '</p>' : '';
        /*
         * <p data-vatid="de">USt-IdNr. gem&auml&szlig; Â§ 19 UStG / Â§ 27 UStG: <?php print $vatid; ?></p>
         */

        /*
         * $imprintfooter
         * $imprintcopy
         * $microformat2
         */
        if( (empty($imprintkey) == ($imprintkey == 0)) && $microformat2 == 0 || (empty($imprintkey) == ($imprintkey == 0)) && $microformat2 == 1 ):
            print '<div class="imprintfooter">';
                print ($imprintkey == 0) ? '<span class="imprintcopy">' . (date('Y') == '2015') ? '&#169; ' . htmlspecialchars(date('Y')) . $space . $imprinthome : '&#169; 2014&ndash;' . htmlspecialchars(date('Y')) . $imprinthome . '</span>' : '';
                print ($microformat2 == 1) ? '<span class="microformat2">' . $microformathome . '</span>' : '';
            print '</div>';
        endif;
        ?>
    </section>

    <?php
    /*
     * $accessory
     */
    if($accessory):
        ?>
        <section>
            <h3 hidden><?php print 'Additional Information for ' . $organizationname; ?></h3>
            <?php
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
