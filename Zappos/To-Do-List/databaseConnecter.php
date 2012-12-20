<?php
    error_reporting(E_ALL^ E_WARNING);  


    // Change these in order for it to work
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "fenoxvc";
    $con = mysql_connect($db_host, $db_username, $db_password);
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }

    //Checks if db exists, if it doesn't then it creates it
    $db_selected = mysql_select_db('sidney_to_do_list', $con);

    if (!$db_selected) {
        // If we couldn't, then it either doesn't exist, or we can't see it.
        $sql = 'CREATE DATABASE sidney_to_do_list';
        if (mysql_query($sql, $con)) {
            echo "Database created successfully\n";
        } else {
            echo 'Error creating database: ' . mysql_error() . "\n";
        }
    }
    
    $db_selected = mysql_select_db('sidney_to_do_list', $con);
    
    $tablequery = "CREATE TABLE IF NOT EXISTS `sidney_to_do_list`.`items_list` (
`item_id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
`item_info` VARCHAR( 85 ) NOT NULL ,
PRIMARY KEY ( `item_id` )
) ENGINE = MYISAM ;";
    
    mysql_query($tablequery)
    
    

?>