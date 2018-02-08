<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Data Controller


//session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/library/connections.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/tools-model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/data-model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/strategy-model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/settings-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'main';
    }
}

switch ($action) {
    case 'main':
        include 'main.php';
        break;
//    Accounting
    case 'accounting':
        include 'accounting/main.php';
        break;
    // -- Amazon --
    case 'eft':
        $eftDataTable = "";
        $amazonEftData = amazonEftData();
        if (count($amazonEftData) > 0) {
            $eftDataTable .= "
        <div class='table'>
            <table>
                    <div class='row header green'>
                        <div class='cellHeader'>Date/Time</div>
                        <div class='cellHeader'>Type</div>
                        <div class='cellHeader'>Order ID</div>
                        <div class='cellHeader'>Amazon SKU</div>
                        <div class='cellHeader'>QTY</div>
                        <div class='cellHeader'>Total</div>
                        <div class='cellHeader'>SKU</div>
                    </div>";
            foreach ($amazonEftData as $row) {
                $eftDataTable .= "
                    <div class='row'>
                        <div class='cell'>{$row['date_time']}</div>
                        <div class='cell'>{$row['trans_type']}</div>
                        <div class='cell'>{$row['order_id']}</div>
                        <div class='cell'>{$row['amazon_sku']}</div>
                        <div class='cell'>{$row['quantity']}</div>
                        <div class='cell'>{$row['total']}</div>
                        <div class='cell'>{$row['skuConversion']}</div>
                    </div>";
            };
            $eftDataTable .= "</table></div>";
        } else {
            $amazonEftData = "<h1>No Data Found</h1>";
        }
        include 'accounting/amazon/eftAutomation.php';
        break;

//    Operations
    case 'operations':
        include 'operations/main.php';
        break;
//    Sales
    case 'sales':
        include 'sales/main.php';
        break;
//    Marketing
    case 'marketing':
        include 'marketing/main.php';
        break;
//    Productivity
    case 'productivity':
        include 'productivity/main.php';
        break;
//    Customer Service
    case 'cs':
        include 'cs/main.php';
        break;
//    Misc
    case 'misc':
        include 'misc/main.php';
        break;
    // -- LOG FILING --
    case 'displayLogData': // Read
        $logDataTable = "";
        $logData = displayLogData();
        if (count($logData) > 0) {
            $logDataTable .= "
        <div class='table'>
            <table>
                    <div class='row header green'>
                        <div class='cellHeader'>Created Date</div>
                        <div class='cellHeader'>Title</div>
                        <div class='cellHeader'>Category</div>
                        <div class='cellHeader'>Subcategory</div>
                        <div class='cellHeader'>Description</div>
                        <div class='cellHeader'>Priority Level</div>
                        <div class='cellHeader'>Due Date</div>
                        <div class='cellHeader'>Responsible</div>
                        <div class='cellHeader'>Status</div>
                    </div>";
            foreach ($logData as $row) {
                $createdDate = date("F d, Y", strtotime($row['createdDate']));
                $dueDateFormat = strtotime($row['dueDate']);
                if ($dueDateFormat < 0 || $dueDateFormat == NULL) {
                    $dueDate = "";
                }
                else {
                    $dueDate = date("F d, Y", strtotime($row['dueDate']));
                }
                $logDataTable .= "
                    <div class='row'>
                        <div class='cell'>{$createdDate}</div>
                        <div class='cell'>{$row['title']}</div>
                        <div class='cell'>{$row['category']}</div>
                        <div class='cell'>{$row['subcategory']}</div>
                        <div class='cell'>{$row['description']}</div>
                        <div class='cell'>{$row['priorityLevel']}</div>
                        <div class='cell'>{$dueDate}</div>
                        <div class='cell'>{$row['responsible']}</div>
                        <div class='cell'>{$row['status']}</div>
                    </div>";
            };
            $logDataTable .= "</table></div>";
        } else {
            $logDataTable .= "
            <div class='table'>
                <table>
                        <div class='row header green'>
                            <div class='cellHeader'>Created Date</div>
                            <div class='cellHeader'>Title</div>
                            <div class='cellHeader'>Category</div>
                            <div class='cellHeader'>Subcategory</div>
                            <div class='cellHeader'>Description</div>
                            <div class='cellHeader'>Priority Level</div>
                            <div class='cellHeader'>Due Date</div>
                            <div class='cellHeader'>Responsible</div>
                            <div class='cellHeader'>Status</div>
                        </div>
                        <div class='row'>
                            <div class='cell'>No Data Found</div>
                        </div>
                </table>
            </div>";
        }
        include 'misc/logEntries.php';
        break;
    case 'updateLogEntry': // Update
        updateLogEntry();
        break;
    case 'deleteLogData': // Delete
        deleteLogEntry();
        break;
}