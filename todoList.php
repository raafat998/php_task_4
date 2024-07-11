<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            height: 100vh;

            
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h2 {
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #e9ecef;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        li form {
            margin: 0;
            display: inline;
        }

        button {
            margin-left: 10px;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button.edit {
            background-color: #ffc107;
            color: #ffffff;
        }

        button.edit:hover {
            background-color: #e0a800;
        }

        button.delete {
            background-color: #dc3545;
            color: #ffffff;
        }

        button.delete:hover {
            background-color: #c82333;
        }

        .project-info {
            margin-top: 20px;
            text-align: center;
            color: #6c757d;
        }
        .b-container{
            display: flex;
            flex-direction: column;
            gap :30px;
            width: 100%;
            justify-content: center;
            align-items: center;
            
        }

 

    .counter-box {
    width: 100px;
    background-color: #fff;
    border: 2px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    }

    .counter {
        font-size: 4em;
        font-weight: bold;
        color: #333;
      

    }

    </style>
</head>
<body>


<div class="counter-box">
    <div class="counter">
    <?php
session_start();


if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    $_SESSION['counter'] = 0;
    header('Location: todoList.php');
    exit();
}

if (!isset($_GET['reset'])) {
    $_SESSION['counter']++;
}
echo $_SESSION['counter'];
?>
    </div>
</div>



    <div class="b-container">

    <div class="container">
    <?php

    if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = [];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['add_task']) && !empty($_POST['task'])) {
            $task = $_POST['task'];
            if (isset($_POST['edit_index']) && $_POST['edit_index'] !== '') {
                $_SESSION['tasks'][$_POST['edit_index']] = $task;
            } else {
                array_push($_SESSION['tasks'], $task);
            }
        } elseif (isset($_POST['delete_task'])) {
            array_splice($_SESSION['tasks'], $_POST['delete_task'], 1);
        } elseif (isset($_POST['edit_task'])) {
            $edit_index = $_POST['edit_task'];
            $edit_task = $_SESSION['tasks'][$edit_index];
        }
    }
    ?>
    <form action="todoList.php" method="post">
        <input type="text" name="task" placeholder="Enter a new task" value="<?php echo isset($edit_task) ? $edit_task : ''; ?>"><br>
        <input type="hidden" name="edit_index" value="<?php echo isset($edit_index) ? $edit_index : ''; ?>">
        <input type="hidden" name="add_task" value="1">
        <input type="submit" value="<?php echo isset($edit_task) ? 'Edit Task' : 'Add Task'; ?>">
    </form>

    <h2>To-Do List:</h2>
    <ul>
        <?php
        foreach ($_SESSION['tasks'] as $index => $task) {
            echo "<li>
                    <span>$task</span>
                    <div>
                        <form action='todoList.php' method='post' style='display:inline;'>
                            <input type='hidden' name='delete_task' value='$index'>
                            <button type='submit' class='delete'>Delete</button>
                        </form>
                        <form action='todoList.php' method='post' style='display:inline;'>
                            <input type='hidden' name='edit_task' value='$index'>
                            <button type='submit' class='edit'>Edit</button>
                        </form>
                    </div>
                  </li>";
        }
        ?>
    </ul>
    </div>

    <div class="container">
    <?php
    echo "Project Name: " . basename(__DIR__) . "<br>";
    echo "Script Name: " . basename(__FILE__);
    ?>
    </div>

<div>
    <?php
    echo "Page requested at: " . date("Y-m-d H:i:s");
    ?>
</div>
    

<?php
echo "<br><br>";
$counterFile = 'counter.txt';

if (!file_exists($counterFile)) {
    file_put_contents($counterFile, 0);
}

$counter = file_get_contents($counterFile);
$counter++;
file_put_contents($counterFile, $counter);

echo "Number of visitors: " . $counter;
?>






</div>

</body>
</html>
