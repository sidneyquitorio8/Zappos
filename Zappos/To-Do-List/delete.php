<?php
include_once 'databaseConnecter.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    $id = $_GET['id'];
    $selectQuery = "SELECT item_info FROM items_list where item_id = $id";
    $result = mysql_query($selectQuery) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $info = $row['item_info'];
    $query = "DELETE FROM items_list
        WHERE item_id = $id";
    mysql_query($query) or die(mysql_error());
    echo "Deleted $info";
    echo "<br/> Go <a href=\"index.php\">
                Back</a>.</p>";
?>
