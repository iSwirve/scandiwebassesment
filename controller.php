<?php

    require_once("connection.php");

    if($_REQUEST["action"] == "mass-delete")
    {
        $data = json_decode($_REQUEST["arr"]);  
        foreach($data as $dat)
        {
            $conn->query("DELETE FROM PRODUCT WHERE SKU='$dat'");
        }
        
    }

?>