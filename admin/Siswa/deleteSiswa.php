<?php
include "../../db/config.php";

$id = $_GET['id'];
mysqli_query($db, "DELETE FROM tb_siswa WHERE id=$id");
header("Location: siswa.php");
?>
