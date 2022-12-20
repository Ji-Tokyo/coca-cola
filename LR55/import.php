<?php
include('.core/importer.php');
include("templates/hearder.html");
?>
<div class='container'>
    <div class='row p-5'>
        <div class='col-3'></div>
        <div class='col-6'>

        <?php 
            if(isset($_POST['path_to_file']))
            {
                try
                {
                    $productImporter = new Importer();
                    $importResult = $productImporter->importFromFile($_POST['path_to_file']);
                    echo ("<h4>Файл с данными получен и обработан. Создана таблица products_imported</h4>
                    <a class='btn btn-success' href='index.php'>Назад</a>");
                }
                catch (Exception $e)
                {
                    $msg = $e->getMessage();
                    echo ("<h4>Ошибка при импорте:</h4><p>$msg</p>
                            <a class='btn btn-primary' href='/LR55/import.php'>Назад</a>");
                }
            }
            else 
            {
                echo ("<form method='post'>
                            <div class='form-group'>
                                <label for='path_to_file'>Путь к JSON относительно корня сайта</label>
                                <input type='text' class='form-control' name='path_to_file' required>
                            </div>
                            <button type='submit' class='btn btn-primary'>Сохранить</button>
                            <a class='btn btn-success' href='index.php'>Назад</a>
                        </form>");
            }
        ?>
    </div>
</div>
</div>

<?php include("templates/footer.html");?>