<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Tools Controller


//session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/library/connections.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/tools-model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/data-model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/strategy-model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/settings-model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dougProject/model.php';

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
                        </div>
                        <div class='row'>
                            <div class='cell'>No Data Found</div>
                        </div>
                </table>
            </div>";
        }
        include 'accounting/amazon/eftAutomation.php';
        break;
    case 'importEftData':
        importEftData();
        break;
    case 'exportEftData':
        exportEftData();
        break;
    case 'deleteEftData':
        deleteEftData();
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
    case 'displayLogForm': // Form
        include 'misc/logForm.php';
        break;
    case 'createLogEntry': // Create
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $subcategory = filter_input(INPUT_POST, 'subcategory', FILTER_SANITIZE_STRING);
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $priorityLevel = filter_input(INPUT_POST, 'priorityLevel', FILTER_SANITIZE_STRING);
        $dueDate = filter_input(INPUT_POST, 'dueDate', FILTER_SANITIZE_STRING);
        $responsible = filter_input(INPUT_POST, 'responsible', FILTER_SANITIZE_STRING);
        if (empty($category) || empty($subcategory) ||
            empty($title) || empty($description)) {
            $message = 'Please provide information for all empty form fields.';
            include 'misc/logForm.php';
        } else {
            $outcome = createLogEntry($category, $subcategory, $title, $description, $priorityLevel, $dueDate, $responsible);
            if ($outcome === 1) {
                $message = "<p>Congratulations, your log entry was successfully added.</p>";
                include 'misc/logForm.php';
            } else {
                $message = "<p>Sorry your entry was not added. Please try again.</p>";
                include 'misc/logForm.php';
            }
        }
        break;
    case 'displayLogData': // Read
        displayLogData();
        break;
    case 'updateLogEntry': // Update
        updateLogEntry();
        break;
    case 'deleteLogData': // Delete
        deleteLogEntry();
        break;









    case 'doug':
        $dougDataTable = "";
        $dougData = dougData();
        if (count($dougData) > 0) {
            $dougDataTable .= "
        <div class='table'>
            <table>
                    <div class='row header green'>
                        <div class='cellHeader'>Dealer</div>
                            <div class='cellHeader'>Email</div>
                            <div class='cellHeader'>QTR Sales Last Year</div>
                            <div class='cellHeader'>QTR Sales This Year</div>
                            <div class='cellHeader'>Growth/Loss</div>
                            <div class='cellHeader'>Percent Change</div>
                    </div>";
            foreach ($dougData as $row) {
                $dougDataTable .= "
                    <div class='row'>
                        <div class='cell'>{$row['dealer']}</div>
                        <div class='cell'>{$row['email']}</div>
                        <div class='cell'>&#36;{$row['qtr_sales_last_year']}</div>
                        <div class='cell'>&#36;{$row['qtr_sales_this_year']}</div>
                        <div class='cell'>&#36;{$row['growth']}</div>
                        <div class='cell'>{$row['percent_change']}&#37;</div>
                    </div>";
            };
            $dougDataTable .= "</table></div>";
        } else {
            $dougDataTable .= "
            <div class='table'>
                <table>
                        <div class='row header green'>
                            <div class='cellHeader'>Dealer</div>
                            <div class='cellHeader'>Email</div>
                            <div class='cellHeader'>QTR Sales Last Year</div>
                            <div class='cellHeader'>QTR Sales This Year</div>
                            <div class='cellHeader'>Growth/Loss</div>
                            <div class='cellHeader'>Percent Change</div>
                        </div>
                        <div class='row'>
                            <div class='cell'>No Data Found</div>
                        </div>
                </table>
            </div>";
        }
        include '../../dougProject/view.php';
        break;
    case 'importDougData':
        importDougData();
        break;
    case 'exportDougTemplate':
        exportDougTemplate();
        break;
    case 'deleteDougData':
        deleteDougData();
        break;
    







    case 'emailDougData':
        $dougDataTable = "";
        $dougData = dougData();
        if (count($dougData) > 0) {
            $dougDataTable .= "
        <div class='table'>
            <table>
                    <div class='row header green'>
                        <div class='cellHeader'>Dealer</div>
                            <div class='cellHeader'>Email</div>
                            <div class='cellHeader'>QTR Sales Last Year</div>
                            <div class='cellHeader'>QTR Sales This Year</div>
                            <div class='cellHeader'>Growth/Loss</div>
                            <div class='cellHeader'>Percent Change</div>
                    </div>";
            foreach ($dougData as $row) {
                $dougDataTable .= "
                    <div class='row'>
                        <div class='cell'>{$row['dealer']}</div>
                        <div class='cell'>{$row['email']}</div>
                        <div class='cell'>&#36;{$row['qtr_sales_last_year']}</div>
                        <div class='cell'>&#36;{$row['qtr_sales_this_year']}</div>
                        <div class='cell'>&#36;{$row['growth']}</div>
                        <div class='cell'>{$row['percent_change']}&#37;</div>
                    </div>";
            };
            $dougDataTable .= "</table></div>";
        } else {
            $dougDataTable .= "
            <div class='table'>
                <table>
                        <div class='row header green'>
                            <div class='cellHeader'>Dealer</div>
                            <div class='cellHeader'>Email</div>
                            <div class='cellHeader'>QTR Sales Last Year</div>
                            <div class='cellHeader'>QTR Sales This Year</div>
                            <div class='cellHeader'>Growth/Loss</div>
                            <div class='cellHeader'>Percent Change</div>
                        </div>
                        <div class='row'>
                            <div class='cell'>No Data Found</div>
                        </div>
                </table>
            </div>";
        }
        include '../../dougProject/view.php';
        break;






}