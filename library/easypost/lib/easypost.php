<?php

// Require this file if you're not using composer's vendor/autoload

// Required PHP extensions
if (!function_exists('curl_init')) {
  throw new Exception('EasyPost needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('EasyPost needs the JSON PHP extension.');
}

// Config and Utilities
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/EasyPost.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Util.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Error.php');

// Guts
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Object.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/EasypostResource.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Requestor.php');

// API Resources
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Address.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Batch.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/CarrierAccount.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Container.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/CustomsInfo.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/CustomsItem.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Event.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Fee.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Item.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Order.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Parcel.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Pickup.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/PostageLabel.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Rate.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Refund.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/ScanForm.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Shipment.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Tracker.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/User.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Insurance.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Report.php');
require($_SERVER['DOCUMENT_ROOT'] . '/library/easypost/lib/EasyPost/Webhook.php');


















//
//require(dirname(__FILE__) . '/EasyPost/EasyPost.php');
//require(dirname(__FILE__) . '/EasyPost/Util.php');
//require(dirname(__FILE__) . '/EasyPost/Error.php');
//
//// Guts
//require(dirname(__FILE__) . '/EasyPost/Object.php');
//require(dirname(__FILE__) . '/EasyPost/EasypostResource.php');
//require(dirname(__FILE__) . '/EasyPost/Requestor.php');
//
//// API Resources
//require(dirname(__FILE__) . '/EasyPost/Address.php');
//require(dirname(__FILE__) . '/EasyPost/Batch.php');
//require(dirname(__FILE__) . '/EasyPost/CarrierAccount.php');
//require(dirname(__FILE__) . '/EasyPost/Container.php');
//require(dirname(__FILE__) . '/EasyPost/CustomsInfo.php');
//require(dirname(__FILE__) . '/EasyPost/CustomsItem.php');
//require(dirname(__FILE__) . '/EasyPost/Event.php');
//require(dirname(__FILE__) . '/EasyPost/Fee.php');
//require(dirname(__FILE__) . '/EasyPost/Item.php');
//require(dirname(__FILE__) . '/EasyPost/Order.php');
//require(dirname(__FILE__) . '/EasyPost/Parcel.php');
//require(dirname(__FILE__) . '/EasyPost/Pickup.php');
//require(dirname(__FILE__) . '/EasyPost/PostageLabel.php');
//require(dirname(__FILE__) . '/EasyPost/Rate.php');
//require(dirname(__FILE__) . '/EasyPost/Refund.php');
//require(dirname(__FILE__) . '/EasyPost/ScanForm.php');
//require(dirname(__FILE__) . '/EasyPost/Shipment.php');
//require(dirname(__FILE__) . '/EasyPost/Tracker.php');
//require(dirname(__FILE__) . '/EasyPost/User.php');
//require(dirname(__FILE__) . '/EasyPost/Insurance.php');
//require(dirname(__FILE__) . '/EasyPost/Report.php');
//require(dirname(__FILE__) . '/EasyPost/Webhook.php');

