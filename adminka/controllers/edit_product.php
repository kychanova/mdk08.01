<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
include "../../controllers/connect.php";

if (isset($_POST['product_id'])){

    if (isset($_FILES['image'])){
        
    }

    $query = "UPDATE products SET product_name='$_POST[name_prod]',
                                  amount = '$_POST[qty]',
                                  category_id = '$_POST[category]',
                                  unit_id = '$_POST[unit]',
                                  `description` = '$_POST[description]' WHERE product_id=$_POST[product_id]";
    $res = mysqli_query($conn, $query);
    if ($res) echo "Запрос выполнен";


}

header("Location: ../products.php");