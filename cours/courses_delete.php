<?php
include "../infrastructure/config.php";

if(isset($_GET["id"]))
{
    $id = $_GET['id'];

    $query = "DELETE FROM  courses WHERE id=$id";

    mysqli_query($connection,$query);

    header("Location: /courseflow/cours/courses_list.php");

};