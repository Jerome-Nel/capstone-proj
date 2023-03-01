<?php

// connection
require_once "connection.php";

// display user
function selectUser($id)
{
  global $conn;
  // Query
  $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :id");

  // Bind the ID parameter to the query
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);

  // Execute the query
  $stmt->execute();

  // Fetch the results as an associative array
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  return $user;
}

// read data
function read($table)
{
  global $conn;
  // Query
  $stmt = $conn->prepare("SELECT * FROM $table");

  // Execute the statement
  $stmt->execute();

  // Fetch results
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $results;
}

// create data
function create($table, $data)
{
  global $conn;

  $fields = implode(',', array_keys($data));
  $values = ':' . implode(',:', array_keys($data));
  $sql = "INSERT INTO $table ($fields) VALUES ($values)";
  $stmt = $conn->prepare($sql);
  $stmt->execute($data);
}

// delete data
function delete($table, $column, $value)
{
  global $conn;

  $stmt = $conn->prepare("DELETE FROM $table WHERE $column = :value");
  $stmt->bindParam(':value', $value);
  $stmt->execute();
}

// update
function update($table, $idField, $idValue, $fieldsToUpdate)
{
  global $conn;

  // Construct the SET clause of the SQL query
  $setClause = '';
  foreach ($fieldsToUpdate as $fieldName => $fieldValue) {
    $setClause .= "`$fieldName` = :$fieldName, ";
  }
  $setClause = rtrim($setClause, ', ');

  // Construct the SQL query
  $sql = "UPDATE `$table` SET $setClause WHERE `$idField` = :$idField";

  // Prepare the query
  $stmt = $conn->prepare($sql);

  // Bind the parameters
  $stmt->bindParam(":$idField", $idValue, PDO::PARAM_INT);
  foreach ($fieldsToUpdate as $fieldName => $fieldValue) {
    $stmt->bindValue(":$fieldName", $fieldValue);
  }
  // Execute the query
  $stmt->execute();
}
