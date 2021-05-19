<?php

include '../functions.php';

$database_connection = new_database_connection();
$database_table = 'zapitest';

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (!empty($_GET['id']))
    {
        $query = $database_connection->prepare('SELECT * FROM ' . $database_table . ' where id=:id');
        $query->bindValue(':id', $_GET['id']);
        $query->execute();

        header('HTTP/1.1 200 OK');

        echo json_encode($query->fetch(PDO::FETCH_ASSOC));

        exit();
    }
    else
    {
        $query = $database_connection->prepare('SELECT * FROM ' . $database_table);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);

        header('HTTP/1.1 200 OK');

        echo json_encode($query->fetchAll());

        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $query = $database_connection->prepare('INSERT INTO ' . $database_table . ' (name) VALUES (:name)');

    bind_all_values($_POST, $query);

    $query->execute();

    header('HTTP/1.1 200 OK');

    $_POST['id'] = $database_connection->lastInsertId();

    echo json_encode($_POST);

    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $query = $database_connection->prepare('UPDATE ' . $database_table . ' SET ' . bind_all_fields($_GET) . ' WHERE id=' . $_GET['id']);

    bind_all_values($_GET, $query);

    $query->execute();

    header('HTTP/1.1 200 OK');

    echo json_encode($_GET);

    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    $query = $database_connection->prepare('DELETE FROM ' . $database_table . ' where id=:id');
    $query->bindValue(':id', $_GET['id']);
    $query->execute();

    header('HTTP/1.1 200 OK');

    echo $_GET['id'];

    exit();
}

// header('HTTP/1.1 400 Bad Request');
