<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/2785c12272.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<title>Zul's Task List - ズールの任務</title>
<body style="bgcolor:#c4a389">
<div class="container">
    <nav class='navbar navbar-light' style="background-color: #e3f2fd;">
        <span class="navbar-brand mb-0 h1" style="display: flex; margin-left:10px">Zul's Task List - ズールの任務</span>
        <div>
            <ul class="navbar-nav mr-auto" style="flex-direction: row; display: flex;">
                <li class='nav-item xls'><form method="post" action="export.php" style="display: flex; margin-right:8px;">
                    <input class="btn btn-primary" type="submit" name="export" value="XLS Export" style="background-color:#b7c9a1;border-color:#b7c9a1;">
                </form></li>
                <li class='nav-item csv'><form method="post" action="exportcsv.php" style="display: flex; margin-right:10px; ">
                    <input class="btn btn-primary" type="submit" name="export" value="CSV Export" style="background-color:#95c45e;border-color:#95c45e">
                </form></li>
            </ul>   
        </div>
    </nav>
    <br>
    <h2><img src="theus.png" width="110" height="110" style="float:left;margin-right:15px;border-radius:10%;">Zul's Ongoing Task List!</h2>
    <h5>Yuk, selesaiin, ズールさん!</h5>
    <p>Popular ٩(ˊᗜˋ*)و ♡</p><audio autoplay controls src="Popular.mp3"></audio>

<?php

    include "php.php";
    if (isset($_GET['taskID'])) {
        $taskID=htmlspecialchars($_GET["taskID"]);

        $sql="delete from tugas where taskID='$taskID' ";
        $hasil=mysqli_query($kon,$sql);
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data deletion failed</div>";

            }
        }
    if (isset($_GET['description'])) {
        $description=htmlspecialchars($_GET["description"]);

        $sql="update tugas set status='finished' where description='$description'";
        $hasil=mysqli_query($kon,$sql);
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data alteration failed</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Task</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Description</th>
            <th colspan='2'>Action</th>

        </tr>
        </thead>

        <?php
        include "php.php";
        $sql= "SELECT * FROM tugas ORDER BY taskID ASC";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["task"]; ?></td>
                <td><?php echo $data["deadline"];   ?></td>
                <td><?php echo $data["status"];   ?></td>
                <td><?php echo $data["description"];   ?></td>
                <td>
                <a href="update.php?taskID=<?php echo htmlspecialchars($data['taskID']); ?>" class="btn btn-warning" role="button"><i class="fa-solid fa-pen"></i></a>
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?description=<?php echo $data['description']; ?>" class="btn" style="background-color:#94e0a5;border-color:#94e0a5;" role="button"><i class="fa-solid fa-check-to-slot"></i></a>
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?taskID=<?php echo $data['taskID']; ?>" class="btn btn-danger" role="button"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">New Task</a>
</div>
</body>
</html>

































</html>