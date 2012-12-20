<?php 
    include_once 'databaseConnecter.php';
    
    if( isset($_POST['submitButton']) && (empty($_POST['to_do'])) ) {
        echo "Please enter information<br/> Please <a href=\"index.php\">
                click here to try again</a>.</p>";
    }
    else {
?>

<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
        <body>
            <h1> Add new To-Do </h1>
            <form action="index.php" name="loginForm" method="post">
                <p> To-Do: <input type="text" name="to_do" size="80" maxlength="80"/></p>
                <p> <input name="submitButton" type="submit" value="Add" /></p>
             </form>

        </body>
</html>
        
<?php
    

    //Get from mysql database
    $query = "SELECT * FROM items_list";
    $result = mysql_query($query) or die(mysql_error());

    while($row = mysql_fetch_array($result)) {
        $id = $row['item_id'];
        $info = $row['item_info'];
                
        echo "$info<br>";
        echo "<TABLE BORDER='0'>          
                <TR>
                    <TD>
                        <a href='edit.php?id=$id'>Edit</a><br /><br />
                    </TD>

                    <TD>
                        <a href='delete.php?id=$id'>Remove</a><br /><br />
                    </TD>

                </TR>
                </TABLE>";
                
    }

    //Checks if submit button was pressed with information in the form and add to the list
    if( isset($_POST['submitButton']) && (!empty($_POST['to_do'])) ) {
        $to_do = $_POST['to_do'];
        $query = "INSERT INTO items_list (item_info) VALUES('$to_do')";
        mysql_query($query) or die(mysql_error());
        
        //refresh page after adding to database
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';  

    }
    
    }

    

?>

