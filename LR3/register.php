<?php
    session_start();
    if (isset($_POST['register'])) require_once "php_code/register_logic.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php 
        require_once "header.php"; 
        if (isset($_SESSION['user'])) {
            ?> 
                <div class="w-100 text-center mt-5 mb-5">Вы вошли как <?php echo $_SESSION['user']; ?>. <a href='logout.php'>Выйти</a></div>
            <?php
        } else {
            ?>
                <div class="container">
                    <form method="POST">
                        <div class="d-flex justify-content-center w-100">
                            <div class="w-50">
                                <br>
                                <div>Почта</div>
                                <div class="d-flex justify-content-center mt-1 mb-1">
                                    <input type="text" class="w-100 form-control" name="email" 
                                        value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST["email"]); ?>">
                                </div>
                                <div class="mb-4 text-danger"><?php if (isset($errors['email'])) echo $errors['email']; ?></div>
                                <div>Пароль</div>
                                <div class="d-flex justify-content-center mt-1 mb-1">
                                    <input type="password" class="w-100 form-control" name="password">
                                </div>
                                <div class="mb-4 text-danger"><?php if (isset($errors['password'])) echo $errors['password']; ?></div>
                                <div>Подтвердить пароль</div>
                                <div class="d-flex justify-content-center mt-1 mb-1">
                                    <input type="password" class="w-100 form-control" name="password_confirm">
                                </div>
                                <div class="mb-4 text-danger"><?php if (isset($errors['confirm'])) echo $errors['confirm']; ?></div>
                                <div>ФИО</div>
                                <div class="d-flex justify-content-center mt-1 mb-4">
                                    <input type="text" class="w-100 form-control" name="fullname" 
                                        value="<?php if (isset($_POST['fullname'])) echo htmlspecialchars($_POST["fullname"]); ?>">
                                </div>
                                <div>Дата рождения</div>
                                <div class="d-flex justify-content-center mt-1 mb-4">
                                    <input type="date" name="birthday" class="form-control" 
                                        value="<?php if (isset($_POST['birthday'])) echo htmlspecialchars($_POST["birthday"]); ?>">
                                </div>
                                <div>Адрес</div>
                                <div class="d-flex justify-content-center mt-1 mb-4">
                                    <input type="text" class="w-100 form-control" name="address"
                                        value="<?php if (isset($_POST['address'])) echo htmlspecialchars($_POST["address"]); ?>">
                                </div>
                                <div>Пол</div>
                                <select name="gender" class="form-select mt-1 mb-4">
                                        <option value="Мужской" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Мужчина") echo 'selected'; ?>>Мужской</option>
                                        <option value="Женский" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Женский") echo 'selected'; ?>>Женский</option>
                                </select>
                                <div>Интересы</div>
                                <div class="d-flex justify-content-center mt-1 mb-4">
                                    <input class="w-100 form-control" name="hobby" 
                                        value="<?php if (isset($_POST['hobby'])) echo htmlspecialchars($_POST['hobby']); ?>">
                                </div>
                                <div>Ссылка на профиль ВК</div>
                                <div class="d-flex justify-content-center mt-1 mb-4">
                                    <input class="w-100 form-control" name="vk" 
                                        value="<?php if (isset($_POST['vk'])) echo htmlspecialchars($_POST['vk']); ?>">
                                </div>
                                <div>Группа крови</div>
                                <select name="blood" class="form-select mt-1 mb-4">
                                    <option value="I" <?php if (isset($_POST['blood']) && $_POST['blood'] == "I") echo 'selected'; ?>>I (0)</option>
                                    <option value="II" <?php if (isset($_POST['blood']) && $_POST['blood'] == "II") echo 'selected'; ?>>II (А)</option>
                                    <option value="III" <?php if (isset($_POST['blood']) && $_POST['blood'] == "III") echo 'selected'; ?>>III (В)</option>
                                    <option value="IV" <?php if (isset($_POST['blood']) && $_POST['blood'] == "IV") echo 'selected'; ?>>IV (АВ)</option>
                                </select>
                                <div>Резус-фактор</div>
                                <select name="rf" class="form-select mt-1 mb-4">
                                    <option value="+" <?php if (isset($_POST['rf']) && $_POST['rf'] == "+") echo 'selected'; ?>>+</option>
                                    <option value="-" <?php if (isset($_POST['rf']) && $_POST['rf'] == "-") echo 'selected'; ?>>-</option>
                                </select>
                                <div class="w-100 d-flex justify-content-center mt-1">
                                    <button type="submit" class="btn btn-primary w-50" name="register" value="1">Зарегистрироваться</button>
                                </div>
                                <div class="w-100 d-flex justify-content-center">Уже есть аккаунт?&ensp;<a href="auth.php">Авторизируйтесь</a></div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php
        }
        require_once "footer.php"; 
    ?>
</body>
</html>