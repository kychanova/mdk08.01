<?php
require_once "../../controllers/connect.php";

echo "<pre>";
print_r($_FILES);
echo "</pre>";

echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST['prod_id'])){
    $prod_id = $_POST['prod_id'];
    $product_name = $_POST['name_prod'];
    $category_id = $_POST['category'];
    $unit_id = $_POST['unit'];
    $amount = $_POST['qty'];
    $description = $_POST['description'];

    


    $query = "UPDATE products SET product_name='$product_name',
                                  category_id = '$category_id',
                                  unit_id = '$unit_id',
                                  amount = '$amount',
                                  `description` = '$description'";

    if ($_FILES['image']['name']){
        $type = $_FILES['image']['type'];
        $size = $_FILES['image']['size'];
        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $new_path = "../../assets/img/products/$image_name";
        if ($type=='image/jpeg') {
			if ($size<5900000) {
                    $query .= ", image_path=$image_name WHERE product_id=$prod_id";
                    $res = mysqli_query($conn, $query);
                    if ($res) move_uploaded_file($tmp_name, $new_path);
			}
			else
				{
					echo "Слишком большой размер файла!";
				}
		}
		else
			{
				echo "Неверный тип файла!";
			}
    }
    else{
        $query .= " WHERE product_id=$prod_id";
        $res = mysqli_query($conn, $query);
        if (!$res) die("error");
    }

    header("Location: ../products.php");

}  
