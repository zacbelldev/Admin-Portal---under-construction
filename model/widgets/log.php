<?php
/**
 * Created by PhpStorm.
 * User: Zac
 * Date: 6/17/17
 * Time: 2:19 PM
 */

// LOG WIDGET
function getPendingCount() {
    $db = onlineSalesConnect();
    $sql = "SELECT count(`status`) FROM log WHERE status = 'pending'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchColumn();
    $stmt->closeCursor();
    return $data;
}
function getCompletedCount() {
    $db = onlineSalesConnect();
    $sql = "SELECT count(`status`) FROM log WHERE status = 'completed'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchColumn();
    $stmt->closeCursor();
    return $data;
}
function getCount() {
    $db = onlineSalesConnect();
    $sql = "SELECT count(`createdDate`) FROM log WHERE createdDate IS NOT NULL";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchColumn();
    $stmt->closeCursor();
    return $data;
}
function getRecentEntries() {
    $db = onlineSalesConnect();
    $sql = 'SELECT * FROM log WHERE dueDate IS NOT NULL ORDER BY dueDate LIMIT 5';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}