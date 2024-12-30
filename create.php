<!DOCTYPE html>
<html>
<head>
    <title>Create New Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    include "php.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $task=input($_POST["task"]);
        $deadline=input($_POST["deadline"]);
        $status=input($_POST["status"]);
        $description=input($_POST["description"]);

        $sql="insert into tugas (task,deadline,status,description) values
		('$task','$deadline','$status','$description')";

        $hasil=mysqli_query($kon,$sql);

        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'>Data failed to be stored</div>";

        }

    }
    ?>
    <nav class='navbar navbar-light' style="background-color: #72e076;">
        <span class="navbar-brand mb-0 h1" style="color:white;">Zul's Task List - ズールの任務 | Add New Task</span>
    </nav>
    <h2 style="margin-top:20px">Input New Task Data!</h2>
    <p style="margin-top:5px">Jangan lupa add desc buat details if needed</p>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-group">
            <label>Task<span style="color:tomato;">*</span>:</label>
            <input type="text" name="task" class="form-control" placeholder="Task Name" required />

        </div>
        <div class="form-group">
            <label>Deadline<span style="color:tomato;">*</span>:</label>
            <input type="text" name="deadline" class="form-control" placeholder="Task Deadline [DD/MM/YY]" required/>
        </div>
       <div class="form-group">
            <label>Status<span style="color:tomato;">*</span>:</label>
            <input type="text" name="status" class="form-control" placeholder="Task Status [Finished/In Progress/Not Done]" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Description:</label>
            <input type="text" name="description" class="form-control" placeholder="Task Description"/>
        </div>

        <a class="btn btn-danger" href="index.php" role="button">Back</a>
        <button type="reset" name="reset" class="btn btn-warning" color="yellow">Reset</button>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
</body>
</html>