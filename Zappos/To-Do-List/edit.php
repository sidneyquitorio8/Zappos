<?php 
    include_once 'databaseConnecter.php';
    
    $id = $_GET['id'];
    $selectQuery = "SELECT item_info FROM items_list where item_id = $id";
    $result = mysql_query($selectQuery) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $info = $row['item_info'];
    
    if( isset($_POST['editButton']) && (empty($_POST['to_do_e'])) ) {
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
            <h4> Edit the entry:  </h4>
            <p><?php echo $info ?></p>
            
            <form action="success.php?id=<?php echo $id ?>" name="loginForm" method="post">
                <p> To-Do: <input type="text" name="to_do_e" size="80" maxlength="80"/></p>
                <p> <input name="editButton" type="submit" value="Edit" /></p>
             </form>

        </body>
</html>

<?php
    }


?>
        


