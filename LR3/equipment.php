<?php 
    session_start();
    if (empty($_SESSION['user'])) header("Location: auth.php");
    require_once "php_code/logic.php" 
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
    <script src="js/bootstrap.bundle.min.js" defer></script>
    <script src="js/script.js" defer></script>
</head>
<body>
    <?php require_once "header.php"; ?>
    <div class="container">
        <form action="" id="form" method="GET" class="mt-5 mb-5">
            <div class="container w-100">
                <div class="d-flex justify-content-center w-100 mb-4">Фильтрация результата поиска</div>
                <div class="d-flex justify-content-center w-100">По цене:</div>
                <input type="text" name="cost_min" placeholder="Цена от" class="w-100 form-control mb-1" value="<?php save_val("cost_min"); ?>">
                <input type="text" name="cost_max" placeholder="Цена до" class="w-100 form-control mb-3" value="<?php save_val("cost_max"); ?>">
                <div class="d-flex justify-content-center w-100 mb-1">Фильтрация по бренду:</div>
                <select type="text" name="type" class="w-100 form-select mb-3">
                    <option value="">Любой</option>
                    <?php 
                        foreach($types as $type) {
                            ?>
                                <option value="<?php echo $type['id']; ?>" <?php save_sel($type['id']) ?>><?php echo $type['type_name']; ?></option>
                            <?php
                        }
                    ?>
                </select>
                <div class="d-flex justify-content-center w-100 mb-1">Фильтрация по описанию</div>
                <input type="text" name="description" placeholder="Введите описание товара" class="w-100 form-control mb-3" value="<?php save_val("description"); ?>">
                <div class="d-flex justify-content-center w-100 mb-1">Фильтрация по наименованию</div>
                <input type="text" name="name" placeholder="Введите наименование товара" class="w-100 form-control mb-3" value="<?php save_val("name"); ?>">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary rounded-0 me-2">Применить фильтр</button>
                    <button type="submit" class="btn btn-danger rounded-0" name="clear" value="1">Очистить фильтр</button>
                </div>
                <div></div>
            </div>
        </form>
    </div>
    <table class="table table-bordered container">
        <thead>
            <tr>
                <th>Изображение</th>
                <th>Название</th>
                <th>Тип</th>
                <th>Описание</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($data as $items) {
                    ?>
                    <tr>
                        <td><img src="img/<?php echo $items['img_path']; ?>" class="w-100"></td>
                        <td><?php echo $items['name']; ?></td>
                        <td><?php echo $items['type_name']; ?></td>
                        <td><?php echo $items['description']; ?></td>
                        <td><?php echo $items['cost']; ?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <?php require_once "footer.php"; ?>
</body>
</html>