<?php
/**
 * Created by PhpStorm.
 * User: Zac
 * Date: 6/17/17
 * Time: 2:19 PM
 */

// --------  Accounting   --------------------------------

// AMAZON QUERIES

function dougData() {
    $db = onlineSalesConnect();
    $sql = 'SELECT * FROM dougProject ORDER BY percent_change DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}

function importDougData() {
    $db = onlineSalesConnect();
    $sql = $db->prepare('INSERT INTO dougProject (dealer,email,qtr_sales_last_year,qtr_sales_this_year,growth,percent_change) VALUES (:dealer, :email,:qtr_sales_last_year, :qtr_sales_this_year, :growth, :percent_change)');

    $csv = array();

    // check there are no errors
    if ($_FILES['csv']['error'] == 0) {
        $name = $_FILES['csv']['name'];
        //    $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
        $ext = 'csv';
        $type = $_FILES['csv']['type'];
        $tmpName = $_FILES['csv']['tmp_name'];
        ini_set('auto_detect_line_endings', true);

        // check the file is a csv
        //    if ($ext === 'csv') {
        if (($handle = fopen($tmpName, 'r')) !== FALSE) {
            // necessary if a large csv file
            set_time_limit(0);
            $row = 0;
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if (isset($data[0])) {

                    if ($row <= 1) {
                        $row++;
                        continue;
                    }

                    // get the values from the csv
                    $csv[$row]['dealer'] = $data[0];
                    $csv[$row]['email'] = $data[1];
                    $csv[$row]['qtr_sales_last_year'] = $data[2];
                    $lastYear = $csv[$row]['qtr_sales_last_year'];
                    $csv[$row]['qtr_sales_this_year'] = $data[3];
                    $thisYear = $csv[$row]['qtr_sales_this_year'];
                    $growth = ($thisYear - $lastYear);
                    $percentChange = ($growth / $lastYear) * 100;

                    if (!$sql->execute(array(
                        ':dealer' => "{$csv[$row]['dealer']}",
                        ':email' => "{$csv[$row]['email']}",
                        ':qtr_sales_last_year' => "{$csv[$row]['qtr_sales_last_year']}",
                        ':qtr_sales_this_year' => "{$csv[$row]['qtr_sales_this_year']}",
                        ':growth' => "{$growth}",
                        ':percent_change' => "{$percentChange}"
                    ))
                    ) {
                        print_r($sql->errorInfo());
                    }
                }
                // inc the row
                $row++;
            }
            fclose($handle);
        }
    }
    header('location: /view/tools/index.php?action=doug');
}

function exportDougTemplate() {
    // set headers to force download on csv format
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=template.csv');
    $output = "dealer,email,qtr_sales_last_year,qtr_sales_this_year";
    // export the output
    echo $output;
}

function deleteDougData() {
    $db = onlineSalesConnect();
    $sql = 'Truncate dougProject';
    $query = $db->prepare($sql);
    $query->execute();
    header('location: /view/tools/index.php?action=doug');
    exit;
}