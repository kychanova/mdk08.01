<?php 
session_start();
include "connect.php";


if ($_POST['btn']){
    $query = "SELECT email FROM credentials WHERE email=?";
    $stmt = mysqli_prepare($conn, $query);
    echo $_POST['email'];
    mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);
    $num_rows = mysqli_stmt_num_rows($stmt);
    echo $num_rows;
    if ($num_rows > 0){
        $_SESSION['errors'] = "ОШИБКА";
        $_SESSION['errors'] = array("email" => "Пользователь с такой почтой уже зарегестрирован.");
        // print_r($_SESSION);
        header("Location:../registr.php");
    }
    else{
        if (strlen($_POST['first-name']) > 255 || strlen($_POST['second-name']) > 255){
            $_SESSION['errors']['first-name'] = "Слишком длинные имя или фамилия";
            header("Location:../registr.php");
        }
        else{
            if ($_POST['pass'] != $_POST['repass']){
                $_SESSION['errors']['pass'] = "Пароли не совпадают";
                print_r($_SESSION);
                header("Location:../registr.php");
            }
            else{
                if (!isset($_POST['agreement'])){
                    $_SESSION['errors']['agreement'] = "Не согласные нас не интересуют";
                    header("Location:../registr.php");
                }
                else{
                    $query = "INSERT INTO clients(first_name, last_name) VALUES (?, ?)";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, "ss", $_POST['first-name'], $_POST['last-name']);
                    if (mysqli_stmt_execute($stmt)){
                        $query = "INSERT INTO credentials(client_id, email, `password`, role_id) VALUES (?,?,?, 2)";
                        $inserted_id = mysqli_stmt_insert_id($stmt);
                        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                        
                        $stmt1 = mysqli_prepare($conn, $query);
                        mysqli_stmt_bind_param($stmt1, "iss", $inserted_id, $_POST['email'], $pass);
                        if (mysqli_stmt_execute($stmt1)){
                            header("Location:../personal.php");
                        }
                    }
                }
            }
            
        }
    }
}