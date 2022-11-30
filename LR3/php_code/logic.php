<?php
    require_once "connect.php";

    $query_condition = array();
    if (isset($_GET['clear'])) unset($_GET);
    if (isset($_GET['cost_min']) && $_GET['cost_min'] != "") array_push($query_condition, "cost >= :cost_min");
    if (isset($_GET['cost_max']) && $_GET['cost_max'] != "") array_push($query_condition, "cost <= :cost_max");
    if (isset($_GET['type']) && $_GET['type'] != "") array_push($query_condition, "type LIKE :type");
    if (isset($_GET['description']) && $_GET['description'] != "") array_push($query_condition, "description LIKE :description");
    if (isset($_GET['name']) && $_GET['name'] != "") array_push($query_condition, "name LIKE :name");

    $query = "SELECT img_path, name, type_name, description, cost FROM products INNER JOIN types on type = types.id";
    if (!empty($query_condition)) $query = $query . " WHERE  " . implode(" AND ", $query_condition);

    $stmt = $pdo->prepare($query);
    if (isset($_GET['cost_min']) && $_GET['cost_min'] != "") $stmt->bindValue('cost_min', $_GET['cost_min'], PDO::PARAM_INT);
    if (isset($_GET['cost_max']) && $_GET['cost_max'] != "") $stmt->bindValue('cost_max', $_GET['cost_max'], PDO::PARAM_INT);
    if (isset($_GET['type']) && $_GET['type'] != "") $stmt->bindValue('type', $_GET['type'], PDO::PARAM_INT);
    if (isset($_GET['description']) && $_GET['description'] != "") $stmt->bindValue('description', '%' . $_GET['description'] . '%', PDO::PARAM_STR);
    if (isset($_GET['name']) && $_GET['name'] != "") $stmt->bindValue('name', '%' . $_GET['name'] . '%', PDO::PARAM_STR);
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
        if (isset($_GET[$key]) && !isset($_GET['clear'])) echo $_GET[$key];
    }

    function save_sel($id) {
        if (!isset($_GET['clear']) && isset($_GET["type"]))
            if ($id == $_GET['type']) echo "selected"; 
    }
?>