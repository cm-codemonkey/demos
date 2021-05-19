<?php

function new_database_connection()
{
    try {

        $connection = new PDO('mysql:host=guestvox.com;dbname=guestvox_development;charset=utf8', 'guestvox', 'Jsw90w&6');
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;

    } catch (PDOException $e) {

        exit($e->getMessage());

    }
}

function bind_all_values($data, $query)
{
    foreach($data as $key => $value)
        $query->bindValue(':' . $key, $value);

    return $query;
}

function bind_all_fields($data)
{
    $fields = [];

    foreach($data as $key => $value)
        $fields[] = $key . '=:' . $key;

    return implode(', ', $fields);
}
