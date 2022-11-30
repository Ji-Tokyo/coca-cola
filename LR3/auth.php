<?php
    session_start(); 
    if (isset($_POST['auth'])) require_once "php_code/auth_logic.php"; 
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
                            <div class="w-50 gap10down">
                                <br>
                                <div>Почта</div>
                                <div class="d-flex justify-content-center mb-1 mt-1">
                                    <input type="text" class="w-100 form-control" name="em"
                                    value="<?php if (isset($_POST['em'])) echo htmlspecialchars($_POST['em']); ?>">
                                </div>
                                <div class="mb-4 text-danger"><?php if (isset($errors['email'])) echo $errors['email']; ?></div>
                                <div>Пароль</div>
                                <div class="d-flex justify-content-center mb-1 mt-1">
                                    <input type="password" class="w-100 form-control" name="pass">
                                </div>
                                <div class="mb-4 text-danger"><?php if (isset($errors['password'])) echo $errors['password']; ?></div>
                                <div class="w-100 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary w-50" name="auth" value="1">Войти</button>
                                </div>
                                <div class="w-100 d-flex justify-content-center">Ещё нет аккаунта?&ensp;<a href="register.php">Зарегистрируйтесь</a></div>
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