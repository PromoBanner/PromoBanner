<?php

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function promobanner_config() {
    return [
        'name' => 'PromoBanner',
        'description' => 'Displays a customizable promotional banner with a clickable link.',
        'version' => '1.0',
        'author' => 'PromoBanner',
        'fields' => [
            'bannerEnabled' => [
                'FriendlyName' => 'Banner Enabled',
                'Type' => 'yesno',
                'Description' => 'Tick to enable the promo banner.',
                'Default' => 'yes',
            ],
            'scheduleStart' => [
                'FriendlyName' => 'Schedule Start',
                'Type' => 'text',
                'Size' => '25',
                'Default' => '',
                'Description' => 'Enter the start date and time (YYYY-MM-DD HH:MM:SS). Example: 2024-01-01 12:00:00',
            ],
            'scheduleEnd' => [
                'FriendlyName' => 'Schedule End',
                'Type' => 'text',
                'Size' => '25',
                'Default' => '',
                'Description' => 'Enter the end date and time (YYYY-MM-DD HH:MM:SS). Example: 2024-12-31 23:59:59',
            ],
            'promoCode' => [
                'FriendlyName' => 'Promo Code',
                'Type' => 'text',
                'Size' => '25',
                'Default' => '',
                'Description' => 'Enter the promo code to be used in the link.',
            ],
            'bannerText' => [
                'FriendlyName' => 'Banner Text',
                'Type' => 'text',
                'Size' => '200',
                'Default' => 'Welcome to our latest promotion!',
                'Description' => 'Enter the text to display in the promo banner.',
            ],
            'textBoldness' => [
                'FriendlyName' => 'Text Boldness',
                'Type' => 'dropdown',
                'Options' => [
                    '400' => 'Normal',
                    '700' => 'Bold',
                    '900' => 'Bolder',
                ],
                'Description' => 'Select the boldness of the banner text.',
                'Default' => '400',
            ],
            'linkUnderlineOnHover' => [
                'FriendlyName' => 'Link Underline on Hover',
                'Type' => 'yesno',
                'Description' => 'Enable to show an underline on the banner link when hovered over.',
                'Default' => 'yes',
            ],
            'textColor' => [
                'FriendlyName' => 'Text Color',
                'Type' => 'text',
                'Size' => '7',
                'Default' => '#FFFFFF',
                'Description' => 'Enter the HEX color code for the banner text.',
            ],
            'hoverColor' => [
                'FriendlyName' => 'Hover Color',
                'Type' => 'text',
                'Size' => '7',
                'Default' => '#0056b3', // A darker shade of blue as an example
                'Description' => 'Enter the HEX color code for the banner hover background.',
            ],
            'bannerColor' => [
                'FriendlyName' => 'Banner Background Color',
                'Type' => 'text',
                'Size' => '7',
                'Default' => '#007bff',
                'Description' => 'Enter the HEX color code for the banner background.',
            ],
        ],
    ];
}
