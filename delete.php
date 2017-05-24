<?php
    require 'app'.DIRECTORY_SEPARATOR.'connection.php';
    require 'includes'.DIRECTORY_SEPARATOR.'header.php';

    $id=$_GET['id'];

    $sql=<<<TAG
             DELETE FROM address WHERE id=$id;
TAG;


    if(mysqli_query(dbConnection(),$sql)){
        header("Location:index.php");
    }
    else{
        echo "Something went wrong!!!";
    }
?>

  
<?php

    require 'includes'.DIRECTORY_SEPARATOR."footer.php";
?>