<?php
include '../../db/config.php';
$id = $_GET['id'];
mysqli_query($db, "DELETE FROM tb_agenda WHERE id=$id");
header("Location: agenda.php");
