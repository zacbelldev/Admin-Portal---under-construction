<?php
/**
 * Created by PhpStorm.
 * User: Zac
 * Date: 6/17/17
 * Time: 2:19 PM
 */

// --------  Accounting   --------------------------------

// AMAZON QUERIES

function importEftData() {
    $db = onlineSalesConnect();

    $orderInsert = $db->prepare("INSERT INTO amazonSales (date_time, settlement_id, trans_type, order_id, amazon_sku, description, quantity, marketplace, fulfilled_by, order_city, order_state, order_postal, product_sales, shipping_credits, gift_wrap_credits, promo_rebates, sales_tax_collected, selling_fees, fba_fees, other_trans_fees, other, total, skuConversion) SELECT :date_time, :settlement_id, :trans_type, :order_id, :amazon_sku , :description, :quantity, :marketplace, :fulfilled_by, :order_city, :order_state, :order_postal, :product_sales, :shipping_credits, :gift_wrap_credits, :promo_rebates, :sales_tax_collected, :selling_fees, :fba_fees, :other_trans_fees, :other, :total, `sku` FROM amazonListings WHERE `amazonSku` = :amazon_sku");

    $feesInsert = $db->prepare("INSERT INTO amazonSales (date_time, settlement_id, trans_type, order_id, amazon_sku, description, quantity, marketplace, fulfilled_by, order_city, order_state, order_postal, product_sales, shipping_credits, gift_wrap_credits, promo_rebates, sales_tax_collected, selling_fees, fba_fees, other_trans_fees, other, total, skuConversion) SELECT :date_time, :settlement_id, :trans_type, :order_id, :amazon_sku , :description, :quantity, :marketplace, :fulfilled_by, :order_city, :order_state, :order_postal, :product_sales, :shipping_credits, :gift_wrap_credits, :promo_rebates, :sales_tax_collected, :selling_fees, :fba_fees, :other_trans_fees, :other, :total, `sku` FROM amazonListings WHERE `amazonSku` = :trans_type");

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


//                THE LINE BELOW IS CAUSING THE ISSUE OF not ADDING CERTAIN ROWS

                //tomorrow try if (count($data) == 12){}

                if (isset($data[0]) && isset($data[1]) && isset($data[2]) && isset($data[3]) && isset($data[4]) && isset($data[5]) && isset($data[6])) {


                    if ($row <= 1) {
                        $row++;
                        continue;
                    }
                    // get the values from the csv
                    $csv[$row]['date_time'] = $data[0];
                    $csv[$row]['settlement_id'] = $data[1];
                    if ($data[2] == "Transfer") {
                        $data[8] = "Seller";
                    }
                    $csv[$row]['trans_type'] = $data[2];
                    $csv[$row]['order_id'] = $data[3];
                    $csv[$row]['amazon_sku'] = $data[4];
                    $csv[$row]['description'] = $data[5];
//                    if (empty($data[6])) {
                    $data[6] = "1";
//                    }
                    $csv[$row]['quantity'] = $data[6];
                    $csv[$row]['marketplace'] = $data[7];
                    if (empty($data[8])) {
                        $data[8] = "Amazon";
                    }
                    $csv[$row]['fulfilled_by'] = $data[8];
                    $csv[$row]['order_city'] = $data[9];
                    $csv[$row]['order_state'] = $data[10];
                    $csv[$row]['order_postal'] = $data[11];
                    $csv[$row]['product_sales'] = $data[12];
                    $csv[$row]['shipping_credits'] = $data[13];
                    $csv[$row]['gift_wrap_credits'] = $data[14];
                    $csv[$row]['promo_rebates'] = $data[15];
                    $csv[$row]['sales_tax_collected'] = $data[16];
                    $csv[$row]['selling_fees'] = $data[17];
                    $csv[$row]['fba_fees'] = $data[18];
                    $csv[$row]['other_trans_fees'] = $data[19];
                    $csv[$row]['other'] = $data[20];
                    $csv[$row]['total'] = $data[21];

//                    echo "<pre>";
//                    var_dump($data);
//                    echo "</pre>";
//                    echo "<br><br>";

                    if ($csv[$row]['trans_type'] == "Order") {
                        if (!$orderInsert->execute(array(
                            ':date_time' => "{$csv[$row]['date_time']}",
                            ':settlement_id' => "{$csv[$row]['settlement_id']}",
                            ':trans_type' => "{$csv[$row]['trans_type']}",
                            ':order_id' => "{$csv[$row]['order_id']}",
                            ':amazon_sku' => "{$csv[$row]['amazon_sku']}",
                            ':description' => "{$csv[$row]['description']}",
                            ':quantity' => "{$csv[$row]['quantity']}",
                            ':marketplace' => "{$csv[$row]['marketplace']}",
                            ':fulfilled_by' => "{$csv[$row]['fulfilled_by']}",
                            ':order_city' => "{$csv[$row]['order_city']}",
                            ':order_state' => "{$csv[$row]['order_state']}",
                            ':order_postal' => "{$csv[$row]['order_postal']}",
                            ':product_sales' => "{$csv[$row]['product_sales']}",
                            ':shipping_credits' => "{$csv[$row]['shipping_credits']}",
                            ':gift_wrap_credits' => "{$csv[$row]['gift_wrap_credits']}",
                            ':promo_rebates' => "{$csv[$row]['promo_rebates']}",
                            ':sales_tax_collected' => "{$csv[$row]['sales_tax_collected']}",
                            ':selling_fees' => "{$csv[$row]['selling_fees']}",
                            ':fba_fees' => "{$csv[$row]['fba_fees']}",
                            ':other_trans_fees' => "{$csv[$row]['other_trans_fees']}",
                            ':other' => "{$csv[$row]['other']}",
                            ':total' => "{$csv[$row]['total']}"
                        ))
                        ) {
                            print_r($orderInsert->errorInfo());
                        }

                    } else {
                        if (!$feesInsert->execute(array(
                            ':date_time' => "{$csv[$row]['date_time']}",
                            ':settlement_id' => "{$csv[$row]['settlement_id']}",
                            ':trans_type' => "{$csv[$row]['trans_type']}",
                            ':order_id' => "{$csv[$row]['order_id']}",
                            ':amazon_sku' => "{$csv[$row]['amazon_sku']}",
                            ':description' => "{$csv[$row]['description']}",
                            ':quantity' => "{$csv[$row]['quantity']}",
                            ':marketplace' => "{$csv[$row]['marketplace']}",
                            ':fulfilled_by' => "{$csv[$row]['fulfilled_by']}",
                            ':order_city' => "{$csv[$row]['order_city']}",
                            ':order_state' => "{$csv[$row]['order_state']}",
                            ':order_postal' => "{$csv[$row]['order_postal']}",
                            ':product_sales' => "{$csv[$row]['product_sales']}",
                            ':shipping_credits' => "{$csv[$row]['shipping_credits']}",
                            ':gift_wrap_credits' => "{$csv[$row]['gift_wrap_credits']}",
                            ':promo_rebates' => "{$csv[$row]['promo_rebates']}",
                            ':sales_tax_collected' => "{$csv[$row]['sales_tax_collected']}",
                            ':selling_fees' => "{$csv[$row]['selling_fees']}",
                            ':fba_fees' => "{$csv[$row]['fba_fees']}",
                            ':other_trans_fees' => "{$csv[$row]['other_trans_fees']}",
                            ':other' => "{$csv[$row]['other']}",
                            ':total' => "{$csv[$row]['total']}"
                        ))
                        ) {
                            print_r($feesInsert->errorInfo());
                        }
                    }
                }

                // inc the row
                $row++;
            }

            fclose($handle);
        }

    }
    header('location: /view/tools/index.php?action=eft');

}

function amazonEftData() {
    $db = onlineSalesConnect();
    $sql = 'SELECT * FROM amazonSales ORDER BY trans_type';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}

function exportEftData() {
    $db = onlineSalesConnect();

    // set headers to force download on csv format
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=Amazon To QuickBooks.csv');

    // we initialize the output with the headers
    $output = "bill_name,ship_name,ship_addr1,ship_addr2,ship_city,ship_state,ship_zip,ship_country,cust_po,item_num,quantity,unit_price\n";

    // select all members
    $sql = 'SELECT a.fulfilled_by, a.skuConversion, sum(a.quantity) as quantity, a.total FROM amazonSales a where a.fulfilled_by = "Amazon" group by a.skuConversion, a.total order BY quantity DESC';
    $query = $db->prepare($sql);
    $query->execute();
    $list = $query->fetchAll();
    foreach ($list as $rs) {
        // add new row
        $output .=
            $rs['fulfilled_by'] . "," .
            " " . "," .
            " " . "," .
            " " . "," .
            " " . "," .
            " " . "," .
            " " . "," .
            " " . "," .
            $rs['fulfilled_by'] . "," .
            $rs['skuConversion'] . "," .
            $rs['quantity'] . "," .
            $rs['total'] . "," . "\n";
    }
    // export the output
    if (isset($output[1][0])) {
        echo $output;
    } else {
        echo "<h5>No data to export.</h5>";
    }
}

function deleteEftData() {
    $db = onlineSalesConnect();
    $sql = 'Truncate amazonSales';
    $query = $db->prepare($sql);
    $query->execute();
    header('location: /view/tools/index.php?action=eft');
    exit;
}

// --------  Marketing   --------------------------------


// --------  Operations   --------------------------------


// --------  Misc   --------------------------------

// LOG FILES
function createLogEntry($category, $subcategory, $title, $description, $priorityLevel, $dueDate, $responsible) {
    $db = onlineSalesConnect();
    $sql = 'INSERT INTO log (category,subcategory, title, description, priorityLevel, dueDate, responsible) VALUES (:category,:subcategory,:title,:description,:priorityLevel,:dueDate,:responsible)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->bindValue(':subcategory', $subcategory, PDO::PARAM_STR);
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':priorityLevel', $priorityLevel, PDO::PARAM_STR);
    $stmt->bindValue(':dueDate', $dueDate, PDO::PARAM_STR);
    $stmt->bindValue(':responsible', $responsible, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}