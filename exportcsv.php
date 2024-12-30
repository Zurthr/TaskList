<?php

if(isset($_POST["export"]))
{
    $connect = mysqli_connect("localhost", "root", "", "crud");
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=TaskData.csv');
    $output = fopen("php://output", "w");

    fputcsv($output, array('taskID', 'task', 'deadline', 'status', 'description'));
    $query= "SELECT * FROM tugas ORDER BY taskID ASC";
    $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}
?>