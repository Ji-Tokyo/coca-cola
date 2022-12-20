<?php 
if(isset($_POST['save']))
{
    include(".core/exporter.php");
    $productExporter = new Exporter();
    $productExporter->exportToFile();
}
else
{
    include("templates/hearder.html");
    echo ("<div class='container pt-5 pb-5 text-center'>
                <form method='post'>
                    <input type='submit' name='save' value='Сохранить файл формата JSON' class='btn btn-primary'>
                    <a class='btn btn-success' href='index.php'>Назад</a>
                </form>
            </div>"
        );
    include("templates/footer.html");
}
?>
