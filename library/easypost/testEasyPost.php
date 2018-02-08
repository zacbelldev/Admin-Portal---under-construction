<?php
require($_SERVER['DOCUMENT_ROOT'] . '/view/settings/login/index.php');
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Zac Bell">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/css/home.css">
    <link rel="stylesheet" type="text/css" href="/css/packery-grid.css">
    <style>
        /*        Dashboard           */
        /*750 px or more*/
        @media screen and (min-width: 750px) {
            #dashLink {
                border-left: 2px solid #545354;
            }
        }

        #oneIconShort path {
            fill: #00cc7b;
        }

        #oneIconWide path {
            fill: #00cc7b;
        }

        #oneIconWide use {
            fill: #B9B9B9;
        }

        #chart_div {
            width: auto;
            height: auto;
        }

        text {
            fill: #dbdbdb;
        }
    </style>

</head>
<body>
<aside id="sideBar">
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/modules/sideBar.php'); ?>
</aside>
<main id="mainContainer">
            <?php

            require_once("../../library/easypost/lib/easypost.php");

            \EasyPost\EasyPost::setApiKey('fuyU80izGRKBueILZPsOYQ');

            $fromAddress = \EasyPost\Address::create(array(
                'company' => 'Monkey Bar Storage',
                'street1' => '366 Dividend Dr.',
                'city' => 'Rexburg',
                'state' => 'ID',
                'zip' => '83440',
                'phone' => '208-331-9113'
            ));
            $toAddress = \EasyPost\Address::create(array(
                'name' => 'Zac Bell',
                'company' => '',
                'street1' => '429 W. 6th S',
                'street2' => 'apt 3',
                'city' => 'Rexburg',
                'state' => 'ID',
                'zip' => '83440',
                'phone' => '208-331-9113'
            ));
            $parcel = \EasyPost\Parcel::create(array(
                "length" => 51,
                "width" => 4,
                "height" => 3,
                "weight" => 8
            ));
            $shipment = \EasyPost\Shipment::create(array(
                "to_address" => $toAddress,
                "from_address" => $fromAddress,
                "parcel" => $parcel,
                "options" => array('label_format' => 'PNG'),
                "is_return" => true
            ));

//            $shipment->buy($shipment->lowest_rate(array('USPS'), array('First')));
//            $shipment->buy($shipment->lowest_rate(array('UPS','FedEx')));
            $shipment->buy($shipment->lowest_rate(array('UPS')));

            //OR

            //$shipment->buy(array('rate' => array('id' => '{RATE_ID}')));

            echo "Label URL:<br>";
            print_r($shipment->postage_label->label_url);

            echo "<br><br>Tracking:<br>";
            print_r($shipment->tracking_code);


            ?>

</main>
</body>
</html>