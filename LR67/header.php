<div class="container mt-3 d-flex mb-3">
    <a href="" class="text-decoration-none d-flex">
        <img src="img/logo-short.svg">
        <div class="fw-bold fs-1 text-dark ms-2">Спорт Марафон</div>
    </a>
    <div class="ms-auto">
        <ul class="row nav fs-10px">
            <li class="col"><a href="" class="text-decoration-none text-muted hover-dark ws-nw">Доставка и оплата</a></li>
            <li class="col"><a href="" class="text-decoration-none text-muted hover-dark">Контакты</a></li>
            <li class="col"><a href="" class="text-decoration-none text-muted hover-dark">Сервис</a></li>
            <li class="col"><a href="" class="text-decoration-none text-muted hover-dark">Блог</a></li>
            <li class="col"><a href="" class="text-decoration-none text-muted hover-dark">Клуб</a></li>
            <li class="col"><a href="" class="text-decoration-none text-muted hover-dark">YouTube</a></li>
            <li class="col"><a href="" class="text-decoration-none text-muted hover-dark">Fest</a></li>
            <li class="col"><a href="" class="text-decoration-none text-muted hover-dark">Подкасты</a></li>
            <li class="col"><a href="" class="text-decoration-none text-muted hover-dark">Парк</a></li>
            <li class="col"><a href="" class="text-decoration-none text-muted hover-dark ws-nw">О магазине</a></li>
            <li class="col"><a href="equipment.php" class="text-decoration-none text-muted hover-dark ws-nw">Секретная страница</a></li>
        </ul>
    </div>
</div>
<div class="container d-flex">
    <ul class="row fw-bold nav fs-11px">
        <li class="col"><a href="" class="text-decoration-none text-danger hover-blue">SALE</a></li>
        <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">НОВИНКИ</a></li>
        <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">КАТАЛОГ</a></li>
        <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">ОДЕЖДА</a></li>
        <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">ОБУВЬ</a></li>
        <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">ТУРИЗМ</a></li>
        <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">БЕГ</a></li>
        <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">АЛЬПИНИЗМ</a></li>
        <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">ПУТЕШЕСТВИЯ</a></li>
        <li class="col"><a href="" class="text-decoration-none text-dark hover-blue ws-nw">ГОРНЫЕ ЛЫЖИ</a></li>
        <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">СНОУБОРД</a></li>
    </ul>
    <div class="ms-auto fs-11px">
        <?php
            if (empty($_SESSION['user'])) {
                ?>
                    <div>Вы не авторизированы.</div>
                    <nobr><a href="auth.php">Ввести логин и пароль</a> или <a href="register.php">зарегистрироваться</a></nobr>
                <?php
            } else {
                ?>
                    <div>Вы вошли как <?php echo $_SESSION['user']; ?>. <a href="logout.php">Выйти</a></div>
                <?php
            }
            ?>
    </div>
</div>