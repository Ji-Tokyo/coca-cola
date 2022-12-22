<?php

require($_SERVER['DOCUMENT_ROOT'] . '/.core/index.php');
ObjectActions::CreateObj();
ObjectActions::EditObj();
ObjectActions::DelObj();
header('Location: ../equipment.php');

