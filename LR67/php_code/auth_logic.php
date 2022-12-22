<?php
    require_once 'connect.php';

    $password = isset($_POST["pass"]) ? md5($_POST["pass"]) : "";
    $email = isset($_POST["em"]) ? $_POST["em"] : "";

    $errors = array();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindValue("email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $users = $stmt->fetchAll();

    if (!empty($users)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE password = :password AND email = :email");
        $stmt->bindValue("password", $password, PDO::PARAM_STR);
        $stmt->bindValue("email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll();

        if (!empty($users)) {
            $_SESSION['user'] = $users[0]['email'];
            header("Location: equipment.php");
        } else {
            $errors['password'] = "Неверный пароль";
        }
    } else {
        $errors['email'] = "Почты нет в системе";
    }
?>