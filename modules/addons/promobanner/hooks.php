<?php

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('ClientAreaHeadOutput', 1, function($vars) {
    $settings = Capsule::table('tbladdonmodules')
        ->where('module', 'promobanner')
        ->pluck('value', 'setting');

    if (empty($settings['bannerEnabled'])) {
        return '';
    }

    $displayBanner = true; // Default to displaying the banner

    // Attempt to parse the schedule start and end times
    $startTime = !empty($settings['scheduleStart']) ? DateTime::createFromFormat('Y-m-d H:i:s', $settings['scheduleStart']) : false;
    $endTime = !empty($settings['scheduleEnd']) ? DateTime::createFromFormat('Y-m-d H:i:s', $settings['scheduleEnd']) : false;
    $currentTime = new DateTime();

    // If both start and end times are valid, check if the current time is within the range
    if ($startTime && $endTime) {
        if ($currentTime < $startTime || $currentTime > $endTime) {
            $displayBanner = false; // Outside the scheduled time range
        }
    }

    if (!$displayBanner) {
        return ''; // Don't display the banner if it's outside the scheduled time or conditions aren't met
    }

    $bannerText = $settings['bannerText'] ?? "Welcome to our latest promotion!";
    $bannerColor = $settings['bannerColor'] ?? "#007bff";
    $promoCode = $settings['promoCode'] ?? '';
    $textBoldness = $settings['textBoldness'] ?? '400';
    $hoverColor = $settings['hoverColor'] ?? '#0056b3';
    $textColor = $settings['textColor'] ?? '#FFFFFF';
    $linkUnderlineOnHover = $settings['linkUnderlineOnHover'] ?? 'yes';
    $underlineCSS = $linkUnderlineOnHover === 'yes' ? 'text-decoration: underline;' : 'text-decoration: none;';

    

    // Dynamically fetch the system URL
    $systemUrl = \WHMCS\Config\Setting::getValue('SystemURL');

    // Create the link dynamically using the system URL and the promo code
    $link = $systemUrl . '/cart.php?promocode=' . urlencode($promoCode);

    $css = "<style>
                .promo-banner {
                    background-color: {$bannerColor};
                    color: {$textColor};
                    text-align: center;
                    padding: 10px;
                    font-size: 18px;
                    font-weight: {$textBoldness};
                    cursor: pointer;
                    display: block;
                    text-decoration: none;
                    transition: color 0.3s ease;
                }
                .promo-banner:hover {
                    color: {$hoverColor};
                    $underlineCSS
                }
            </style>";

    $html = $css . '<a href="' . $link . '" class="promo-banner">' . htmlspecialchars($bannerText) . '</a>';

    return $html;
});
