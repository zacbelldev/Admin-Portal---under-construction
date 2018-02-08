<?php
//Main Controller

//get or create the session
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/library/connections.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/widgets/log.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/tools-model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/data-model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/strategy-model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/settings-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

switch ($action) {
//    ------ DASHBOARD -------------
    case 'home':
        $getPendingCount = getPendingCount();
        $getCompletedCount = getCompletedCount();
        $getCount = getCount();
        $logWidget = "";
        $getRecentEntries = getRecentEntries();
        $test = "TESTESTESTESTEST";
        if (count($getRecentEntries) > 0) {
            $logWidget .= "
            <h4>Pending: $getPendingCount</h4>
            <h4>Completed: $getCompletedCount</h4>
            <h4>Total: $getCompletedCount</h4>
            <div class='table'>
                <table>
                        <div class='row header green'>
                            <div class='cellHeader'>Created Date</div>
                            <div class='cellHeader'>Category</div>
                            <div class='cellHeader'>Title</div>
                            <div class='cellHeader'>Due Date</div>
                        </div>";
            foreach ($getRecentEntries as $row) {
                $createdDate = date("F d, Y", strtotime($row['createdDate']));
                $dueDateFormat = strtotime($row['dueDate']);
                if ($dueDateFormat < 0) {
                    $dueDate = "";
                } else {
                    $dueDate = date("F d, Y", strtotime($row['dueDate']));
                }
                $logWidget .= "
                    <div class='row'>
                        <div class='cell'>{$createdDate}</div>
                        <div class='cell'>{$row['category']}</div>
                        <div class='cell'>{$row['title']}</div>
                        <div class='cell'>{$dueDate}</div>
                    </div>";
            };
            $logWidget .= "</table></div>";
        } else {
            $logWidget .= "
            <div class='table'>
                <table>
                        <div class='row header green'>
                            <div class='cellHeader'>Created Date</div>
                            <div class='cellHeader'>Category</div>
                            <div class='cellHeader'>Title</div>
                            <div class='cellHeader'>Due Date</div>
                        </div>
                        <div class='row'>
                            <div class='cell'>No Data Found</div>
                        </div>
                </table>
            </div>";
        }
        include 'view/dash/home.php';
        break;














//    ------ TOOLS -------------
    case 'tools':
        include 'view/tools/main.php';
        break;

//    ------ Data -------------
    case 'data':
        include 'view/data/main.php';
        break;

//    ------ STRATEGY -------------
    case 'strategy':
        include 'view/strategy/main.php';
        break;

//    ------ SETTINGS -------------
    case 'settings':
        include 'view/settings/main.php';
        break;
    case 'error':
        include 'view/settings/error.php';
        break;
}