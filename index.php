<?php
$errors="";
$db = mysqli_connect('localhost', 'root', '', 'todos');
if(isset($_POST['submit'])){
    $task=$_POST['task'];
    if(empty($task)){
        $errors = "you must fill in the task";
    }else {
        mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
        header('location: index.php');
    }
}
if(isset($_GET['del_task'])){
    $id=$_GET['del_task'];
    mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
    header('location: index.php');
}
    $tasks = mysqli_query($db, "SELECT * FROM tasks");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Todo The List</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
    <div>
        <h1 class="heading">Todo The List Application</h1>
    </div>
    <form method="POST" action="index.php">
        <?php if(isset($errors)){ ?>
         <P><?Php echo $errors; ?></P>
        <?php }?>
    <input type="text" name="task"   class="task_input">
    <button type="submit" class="Add_btn" name="submit"> Add task </button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Number</th>
                <th>Task</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; while ($row = mysqli_fetch_array($tasks)){ ?>
                <tr>
                <td> <?php echo $i; ?></td>
                <td class="task"><?php echo $row['task']; ?></td>
                <td class="delete">
                    <a href="index.php?del_task=<?php echo $row['id']; ?>">x</a>
                </td>
            </tr>
           <?php $i++;} ?>
        </tbody>
    </table>
</body>
</html>