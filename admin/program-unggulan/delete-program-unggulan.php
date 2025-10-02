<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

require "../../db/config.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($db, "DELETE FROM tb_program_unggulan WHERE id = $id");
}

header("Location: program-unggulan.php");
exit;
?>
