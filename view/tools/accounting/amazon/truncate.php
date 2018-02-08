<?php
// including the config file
include($_SERVER['DOCUMENT_ROOT'] . '/view/tools/accounting/amazon/config.php');
$pdo = connect();
$sql = 'Truncate amazonSales';
$query = $pdo->prepare($sql);
$query->execute();

// redirect to the index page
header('location: index.php');

exit;