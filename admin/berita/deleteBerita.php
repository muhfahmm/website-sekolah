<?php
include "../../db/config.php";

$id = $_GET['id'];
$delete = mysqli_query($db, "DELETE FROM tb_berita WHERE id=$id");

if($delete){
    echo "<script>alert('Berita berhasil dihapus'); window.location='berita.php';</script>";
} else {
    echo "Gagal: " . mysqli_error($db);
}
?>
