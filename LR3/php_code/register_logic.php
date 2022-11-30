<?php
    require_once 'connect.php';

    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
    $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : "";
    $address = isset($_POST["address"]) ? $_POST["address"] : "";
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $hobby = isset($_POST["hobby"]) ? $_POST["hobby"] : "";
    $vk = isset($_POST["vk"]) ? $_POST["vk"] : "";
    $blood = isset($_POST["blood"]) ? $_POST["blood"] : "";
    $rf = isset($_POST["rf"]) ? $_POST["rf"] : "";
    $password_confirm = isset($_POST['password_confirm']) ? $_POST["password_confirm"] : "";

    $errors = array();

    if (!preg_match("/(?=.*[0-9])(?=.*[!@#$%^&])(?=.*[a-z])(?=.*[A-Z])(?=.*[\s])(?=.*[_])(?=.*[-])[0-9a-zA-Z!@#$%^&*\s_-]{6,}$/U", $password)) {
        $errors['password'] = "Требования к паролю: длиннее 6 символов, обязательно содержит большие латинские буквы, маленькие латинские буквы, спецсимволы (знаки препинания, арифметические действия и тп), пробел, дефис, подчеркивание и цифры.";
    } 

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Неправильная форма почты";
    } 

    if ($password === $password_confirm) {
        $password = md5($password);
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindValue('email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $check_user = $stmt -> fetchAll();
        if (!empty($check_user)) {
            $errors['email'] = "Такой пользователь уже существует";
        } 
        if (empty($errors)) {
            $stmt = $pdo->prepare("INSERT INTO users (email, password, fullname, birthday, address, gender, hobby, vk, blood, rf) VALUES (:email, :password, :fullname, :birthday, :address, :gender, :hobby, :vk, :blood, :rf)");
            $stmt->bindValue('email', $email, PDO::PARAM_STR);
            $stmt->bindValue('password', $password, PDO::PARAM_STR);
            $stmt->bindValue('fullname', $fullname, PDO::PARAM_STR);
            $stmt->bindValue('birthday', $birthday, PDO::PARAM_STR);
            $stmt->bindValue('address', $address, PDO::PARAM_STR);
            $stmt->bindValue('gender', $gender, PDO::PARAM_STR);
            $stmt->bindValue('hobby', $hobby, PDO::PARAM_STR);
            $stmt->bindValue('vk', $vk, PDO::PARAM_STR);
            $stmt->bindValue('blood', $blood, PDO::PARAM_STR);
            $stmt->bindValue('rf', $rf, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: auth.php");
        }
    } else {
        $errors['confirm'] = "Пароли не совпадают";
    }
?>