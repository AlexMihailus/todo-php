<?php

class QueryBuilder
{
    public function getAllTasks()
    {
        $pdo = new PDO("mysql:host=localhost; dbname=demo", "root", "");
        $sql = "SELECT * FROM tasks";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;
    }

    public function addTask($data)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=demo", "root", "");
        $sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
        $statement = $pdo->prepare($sql);
        $statement->execute($data);
    }

    public function getTask($id)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=demo", "root", "");
        $statement = $pdo->prepare("SELECT * FROM tasks WHERE id=:id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $task = $statement->fetch(PDO::FETCH_ASSOC);

        return $task;
    }

    public function updateTask($data)
    {
        $pdo = new PDO("mysql:host=localhost;dbname=demo", "root", "");
        $sql = 'UPDATE tasks SET title=:title, content=:content WHERE id=:id';
        $statement = $pdo->prepare($sql);
        $statement->execute($data);
    }

    public function deleteTask($id)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=demo", "root", "");
        $sql = 'DELETE FROM tasks WHERE id=:id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}
