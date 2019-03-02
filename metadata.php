<?php

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'                =>  'werde_countryspecificvat',
    'title'             =>  'Country Specific VAT',
    'description'       =>  array(
        'en'            =>  'Set different VAT Taxes for specific countries',
    ),
    'thumbnail'         =>  'logo.png',
    'version'           =>  '1.0',
    'author'            =>  'Marjan Kolev',
    'url'               =>  'http://www.marjankolev.com',
    'email'             =>  'marjankolev1994@yahoo.com',

    // Extend class that will setting up entered VAT to any country
    'extend'            => array(
        'oxvatselector'              =>  'werde/countryspecificvat/Application/models/modvatselector'
    ),

    // Block in Admin->Countries, adding field for entering VAT for each country
    'blocks' => array(
        array(
              'template' => 'country_main.tpl',
              'block'    => 'admin_country_main_form',
              'file'     => '/views/blocks/admin_country_main_form.tpl',
        ),
    ), 

    // Alter table oxcountry on activate (Adding field for Country Specific VAT)
    'files'  =>  array(
        'countryspecificvat_events'                      =>  'werde/countryspecificvat/admin/countryspecificvat_events.php',
    ), 

    // Alter table oxcountry on activate (Adding field for Country Specific VAT)
    'events'   =>  array(
            'onActivate'    =>  'countryspecificvat_events::onActivate',

    ),
);