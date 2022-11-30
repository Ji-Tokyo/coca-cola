<?php require_once "logic.php" ?>

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
        <ul class="ms-auto row fw-bold nav hover-blue-group fs-11px">
            <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">ВХОД</a></li>
            <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">&#128093;</a></li>
            <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">&#9825;</a></li>
            <li class="col"><a href="" class="text-decoration-none text-dark hover-blue">&#128269;</a></li>
        </ul>
    </div>
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
                        <td><img src="img/<?= $items['img_path']; ?>" class="w-100"></td>
                        <td><?= $items['name']; ?></td>
                        <td><?= $items['type_name']; ?></td>
                        <td><?= $items['description']; ?></td>
                        <td><?= $items['cost']; ?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <br>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a href="" class="w-100 h-25 d-flex align-items-center justify-content-center">
                    <img src="img/personal_consultation.svg">
                </a>
                <div class="fw-bold mt-5 w-100 text-center">ПРОФЕССИОНАЛЬНАЯ КОНСУЛЬТАЦИЯ</div>
                <div class="text-muted mt-3">
                    Вся команда нашего магазина увлекается активными видами спорта: 
                    туризмом, альпинизмом, горными лыжами и другими видами outdoor-активности.
                </div>
            </div>
            <div class="col">
                <a href="" class="w-100 h-25 d-flex align-items-center justify-content-center">
                    <img src="img/dotavka.svg">
                </a>
                <div class="fw-bold mt-5 w-100 text-center">ДОСТАВКА И ОПЛАТА</div>
                <div class="text-muted mt-3">
                    Оплата наличными курьеру или банковской картой без комиссии.
                </div>
            </div>
            <div class="col">
                <a href="" class="w-100 h-25 d-flex flex-column align-items-center justify-content-center">
                    <img src="img/subscription.svg">
                </a>
                <div class="fw-bold mt-5 w-100 text-center">ПОДПИСКА НА НОВОСТИ</div>
                <div class="text-muted mt-3">
                    Коротко о самом важном: новых коллекциях и брендах, о снаряжении и как его выбрать, ближайших акциях и распродажах.
                </div>
                <form method="POST" class="d-flex mt-2">
                    <input class="form-control w-50 img-h50 rounded-0 btn-outline-light text-dark" type="email"
                        placeholder="Ваш email">
                    <button class="btn border-secondary rounded-0" type="submit">Подписаться</button>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="container text-muted mt-5">
        Заметили ошибку? Выделите текст ошибки, нажмите Ctrl+Enter, отправьте форму. Мы постараемся исправить ее.
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col d-flex flex-column">
                <a href="" class="text-dark hover-heart w-ft fw-bold">КАТАЛОГ</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px fs-11px">Акции</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Новинки</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Активности</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Бренды</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Лукбук</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Идеи подарков</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Подарки для ваших сотрудников</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Библиотека Спорт-Марафон</a>
            </div>
            <div class="col d-flex flex-column">
                <a href="" class="text-dark hover-heart w-ft fw-bold">МАГАЗИН</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Контакты</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">О нас</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Команда</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Работа у нас</a>
            </div>
            <div class="col d-flex flex-column">
                <div class="fw-bold">СЕРВИС</div>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Персональная консультация</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Ски-сервис</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Лаборатория бутфитинга</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Мастерская бега</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Дисконтная система</a>
            </div>
            <div class="col d-flex flex-column">
                <div class="fw-bold">СООБЩЕСТВО</div>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Блог</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Клуб</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">YouTube</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Подкасты</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Outdoor Fest в Никола-Ленивце</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Проекты в Красной Поляне</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Парк</a>
            </div>
            <div class="col d-flex flex-column">
                <div class="fw-bold">ИНФОРМАЦИЯ</div>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Доставка и оплата</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Обмен и возврат</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Осторожно, мошенники</a>
                <a href="" class="text-muted hover-heart mt-2 w-ft fs-11px">Оферта</a>
            </div>
            <div class="col d-flex flex-column">
                <a href="" class="text-dark hover-heart w-ft fw-bold">КОНТАКТЫ</a>
                <div class="fs-11px fw-bold mt-2">Москва, ул. Сайкина 4</div>
                <div class="text-muted fs-11px ">ежедневно с 10:00 до 24:00</div>
                <a href="" class="text-dark hover-heart w-ft mt-3">8 (800) 333-14-41</a>
                <div class="text-muted fs-11px">бесплатный звонок по России</div>
                <div class="mt-4 fs-11px fw-bold">Мы в социальных сетях</div>
                <div class="d-flex mt-2">
                    <a href=""><img src="img/vk.svg" class="me-3 img-h22"></a>
                    <a href=""><img src="img/tiktok.svg" class="img-h22"></a>
                </div>
                <div class="mt-4 fs-11px fw-bold">Наши каналы</div>
                <div class="d-flex mt-2">
                    <a href=""><img src="img/youtube.svg" class="me-3 img-h22"></a>
                    <a href=""><img src="img/yandex.svg" class="me-3 img-h22"></a>
                    <a href=""><img src="img/tg.svg" class="me-3 img-h22"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-4 fs-11px fw-bold">Все права защищены. 2012-2022 © Спорт-Марафон</div>
            <div class="col-2">
                <a href="">
                    <img src="img/rating_5_2.png">
                </a>
            </div>
            <div class="col"></div>
            <div class="col-3">
                <div class="d-flex">
                    <a href=""><img src="img/lebedev-logo.svg" class="img-w100 me-2"></a>
                    <div class="fs-11px fw-bold">
                        Задизайнено в 
                        <a href="" class="text-dark hover-heart">Студии Артемия Лебедева</a>
                        <a href="" class="text-dark hover-heart">Информация о сайте</a>
                    </div>
                </div>
                <div class="d-flex mt-2">
                    <a href=""><img src="img/Origix-logo-black.svg" class="img-w100 me-2"></a>
                    <div class="fs-11px fw-bold">
                        Разработано в 
                        <a href="" class="text-dark hover-heart">Origix</a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>