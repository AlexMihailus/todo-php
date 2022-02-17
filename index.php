<?php

require 'database/QueryBuilder.php';

$db = new QueryBuilder;

$tasks = $db->all("tasks");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Todo PHP</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>All Tasks</h1>
                <a href="create.php" class="btn btn-success">Add Task</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $task) : ?>
                            <tr>
                                <td><?= $task['id']; ?></td>
                                <td><?= $task['title']; ?></td>
                                <td>
                                    <a href="show.php?id=<?= $task['id']; ?>" class="btn btn-info">
                                        Show
                                    </a>
                                    <a href="edit.php?id=<?= $task['id']; ?>" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a href="delete.php?id=<?= $task['id']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
