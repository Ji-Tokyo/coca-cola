<?php    
    $host = 'localhost';
    $db   = 'equipment';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    $query_condition = array();
    if (isset($_POST['clear'])) unset($_POST);
    if (isset($_POST['cost_min']) && $_POST['cost_min'] != "") array_push($query_condition, "cost >= :cost_min");
    if (isset($_POST['cost_max']) && $_POST['cost_max'] != "") array_push($query_condition, "cost <= :cost_max");
    if (isset($_POST['type']) && $_POST['type'] != "") array_push($query_condition, "type LIKE :type");
    if (isset($_POST['description']) && $_POST['description'] != "") array_push($query_condition, "description LIKE :description");
    if (isset($_POST['name']) && $_POST['name'] != "") array_push($query_condition, "name LIKE :name");

    $query = "SELECT img_path, name, type_name, description, cost FROM products INNER JOIN types on type = types.id";
    if (!empty($query_condition)) $query = $query . " WHERE  " . implode(" AND ", $query_condition);

    $stmt = $pdo->prepare($query);
    if (isset($_POST['cost_min']) && $_POST['cost_min'] != "") $stmt->bindValue('cost_min', $_POST['cost_min'], PDO::PARAM_INT);
    if (isset($_POST['cost_max']) && $_POST['cost_max'] != "") $stmt->bindValue('cost_max', $_POST['cost_max'], PDO::PARAM_INT);
    if (isset($_POST['type']) && $_POST['type'] != "") $stmt->bindValue('type', $_POST['type'], PDO::PARAM_INT);
    if (isset($_POST['description']) && $_POST['description'] != "") $stmt->bindValue('description', '%' . $_POST['description'] . '%', PDO::PARAM_STR);
    if (isset($_POST['name']) && $_POST['name'] != "") $stmt->bindValue('name', '%' . $_POST['name'] . '%', PDO::PARAM_STR);
    $stmt->execute();

    $data = array();
    
    while ($row = $stmt->fetch()) {
        array_push($data, $row);
    }

    $types = array();

    $stmt = $pdo->query("SELECT * FROM types");
    while ($row = $stmt->fetch()) {
        array_push($types, $row);
    }

    function save_val($key) {
        if (isset($_POST[$key]) && !isset($_POST['clear'])) echo $_POST[$key];
    }

    function save_sel($id) {
        if (!isset($_POST['clear']) && isset($_POST["type"]))
            if ($id == $_POST['type']) echo "selected"; 
    }
?>