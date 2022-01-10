<?php
session_start();
require "Product.php";
require "Handler.php";

$handler = new Handler();
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
    <form action="" method="post">
        <div class="container">
            <h1 style="float: left;">Product List</h1>
            <div style="float: right;">
                <button type="button" class="btn btn-success" name="addBtn" onclick="location.href='add-product.php'">
                    <div>ADD</div>
                </button>
                <button class="btn btn-danger" name="john" id="delete-product-btn">MASS DELETE</button>
            </div>
            <br>
            <br>
            <div style="border: 1px solid black;">

            </div>
            <br><br>
            <div class="container d-flex flex-wrap align-items-center">


                <?php
                $arr = $handler->loadItem();
                foreach ($arr as $data) {
                ?>
                    <div class="m-2 card" style="width: 23%;">
                        <div class="card">
                            <div class="card-body">
                                <input type="checkbox" class="delete-checkbox">
                                <div style="text-align: center;" class="sku"><?= $data["SKU"] ?></div>
                                <div style="text-align: center;"><?= $data["NAME"] ?></div>
                                <div style="text-align: center;"><?= $data["PRICE"] . "00 $" ?></div>
                                <div style="text-align: center;"><?= $data["TYPE"] ?></div>
                            </div>
                        </div>
                    </div>

                <?php } ?>


            </div>
        </div>
    </form>
</body>

<script>
    $(document).ready(function() {

        var skuList = [];
        $("#delete-product-btn").click(function() {
            var ctr = $(".delete-checkbox");

            $('.delete-checkbox').each(function(i, obj) {
                if ($(obj).is(":checked")) {
                    skuList.push($(this).next(".sku").html());
                }
            });


            $.ajax({
                    url: "controller.php",
                    method: "post",
                    data: {
                        action: "mass-delete",
                        arr: JSON.stringify(skuList)
                    }
                })

                .done((data) => {
                    // alert(data);
                    location.reload();

                })
        })

        // $(".delete-checkbox").change(function() {
        //     if ($(this).is(":checked")) {
        //         skuList.push($(this).next(".sku").html());
        //         console.log(skuList);
        //     } else {
        //         skuList.splice(skuList.indexOf($(this).next(".sku").html()), 1);
        //         console.log(skuList);
        //     }
        // })

    })

    checkboxes = document.getElementsByClassName('delete-checkbox');
    for (i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = true;
    }
</script>

</html>