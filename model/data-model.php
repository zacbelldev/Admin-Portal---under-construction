<?php
/**
 * Created by PhpStorm.
 * User: Zac
 * Date: 6/17/17
 * Time: 2:19 PM
 */

// --------  Accounting   --------------------------------


// --------  Marketing   --------------------------------


// --------  Operations   --------------------------------


// --------  Misc   --------------------------------

// LOG FILES

function displayLogData() {
    $db = onlineSalesConnect();
    $sql = 'SELECT * FROM log ORDER BY createdDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}

function updateLogEntry() {
    $db = onlineSalesConnect();
    $sql = 'INSERT INTO log (categoryName) VALUES (:categoryName)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function deleteLogEntry() {
    $db = onlineSalesConnect();
    $sql = 'INSERT INTO amazonSales (categoryName) VALUES (:categoryName)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}