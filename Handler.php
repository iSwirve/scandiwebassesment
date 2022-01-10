<?php

class Handler{
    public function insertItem($item)
    {
        require "connection.php";
        $conn->query("INSERT INTO PRODUCT VALUES('$item->sku','$item->name',$item->price, '$item->size')");
    }

    public function loadItem()
    {
        require "connection.php";
        return $conn->query("SELECT * FROM PRODUCT")->fetch_all(MYSQLI_ASSOC);
    }
}
?>
