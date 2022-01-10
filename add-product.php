<?php

require "Product.php";
require "Handler.php";


if (isset($_POST["addBtn"])) {
    $product;
    $handler = new Handler();
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $size;
    switch ($_POST["productType"]) {
        case "DVD":
            $size = $_POST["size"];
            $product = new DVD($sku, $name, $price, $size);
            break;
        case "Book":
            $size = $_POST["weight"];
            $product = new Book($sku, $name, $price, $size);
            break;
        case "Furniture":
            $size = $_POST["height"] . "x" . $_POST["width"] . "x" . $_POST["length"];
            $product = new Furniture($sku, $name, $price, $size);
            break;
        default:
            break;
    }
    $product->dimension($product->size);

    $handler->insertItem($product);
    header("Location: index.php");
}

function alert($message)
{
    echo "<script>alert('$message');</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Product List</title>
</head>

<body style="margin: 10px;">
<form action="" method="post" id="product_form">
        <div class="container">
            <h1 style="float: left;">Product Add</h1>
            <div style="float: right;">

                <button type="submit" class="btn btn-success" name="addBtn" onclick="location.href='add-product.php'">Save</button>
                <button type="button" class="btn btn-danger" id="delete-product-btn" onclick="location.href='index.php'">Cancel</button>
            </div>
            <br>
            <br>
            <div style="border: 1px solid black;">
            </div>
    
    <br>
    
        <div style="float: left;width: 100px;">
            <label for="sku">SKU:</label> <br><br>
            <label for="name">Name: </label><br><br>
            <label for="price">Price ($): </label><br><br>
        </div>
        <div>
            <input type="text" id="sku" name="sku" /><br><br>
            <input type="text" id="name" name="name" /><br><br>
            <input type="text" id="price" name="price" /><br><br>
        </div>
        <br>
        <label for="productType">Type Switcher: </label> <select id="productType" class="ml-5" name="productType">
            <option value="" disabled selected>Type Switcher</option>
            <option value="DVD">DVD-disc</option>
            <option value="Book">Book</option>
            <option value="Furniture">Furniture</option>
        </select><br><br>
        <div id="dvdContainer" style="display: none;">
            Size (MB) <input type="text" id="size" class="ml-4" name="size"><br>

            <strong>*Please provide size in MB</strong>
        </div>
        <div id="bookContainer" style="display: none;">
            Weight (KG) <input type="text" id="weight" class="ml-4"><br>

            <strong>*Please provide size in KG</strong>
        </div>
        <div id="furnitureContainer" style="display: none;">
            <div style="float: left;width: 100px;">
                <label for="height">Height (CM)</label> <br><br>
                <label for="width">Width (CM)</label><br><br>
                <label for="length">Length (CM) </label><br><br>
            </div>
            <div>
                <input type="text" id="height" name="height" /><br><br>
                <input type="text" id="width" name="width" /><br><br>
                <input type="text" id="length" name="length" /><br><br>
            </div><br>
            <strong>*Please provide size in HxWxL</strong>
        </div>
        </div>
    </form>
</body>

<script>
    $(document).ready(function() {
        $("#productType").on('change', function() {
            switch (this.value) {
                case "DVD":
                    $('#dvdContainer').show();
                    $('#bookContainer').hide();
                    $('#furnitureContainer').hide();
                    break;
                case "Book":
                    $('#dvdContainer').hide();
                    $('#bookContainer').show();
                    $('#furnitureContainer').hide();
                    break;
                case "Furniture":
                    $('#dvdContainer').hide();
                    $('#bookContainer').hide();
                    $('#furnitureContainer').show();
                    break;
                default:

            }
        })
    })
</script>

</html>