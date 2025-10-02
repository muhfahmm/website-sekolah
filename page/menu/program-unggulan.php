<?php
include "../../db/config.php";

// ambil semua program unggulan
$programsQuery = mysqli_query($db, "SELECT * FROM tb_program_unggulan ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Program Unggulan</title>
<style>
body { font-family: Arial, sans-serif; padding: 20px; background: #f4f6f9; }
.program { background: #fff; border-radius: 10px; padding: 20px; margin-bottom: 30px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);}
.program h2 { color: #2980b9; margin-bottom: 10px; }
.detail { background: #f9fafc; padding: 10px; margin-top: 15px; border-left: 4px solid #2980b9; border-radius: 6px; }
.detail img { max-width: 300px; margin-top: 10px; border-radius: 6px; }
.no-detail { font-style: italic; color: #7f8c8d; }
</style>
</head>
<body>

<h1>Daftar Program Unggulan</h1>

<?php while($prog = mysqli_fetch_assoc($programsQuery)): ?>
    <div class="program">
        <h2><?= htmlspecialchars($prog['nama_program_unggulan']) ?></h2>
        <p><?= nl2br(htmlspecialchars($prog['deskripsi_program_unggulan'])) ?></p>
        <?php if(!empty($prog['image'])): ?>
            <img src="../../admin/uploads/<?= $prog['image'] ?>" alt="<?= htmlspecialchars($prog['nama_program_unggulan']) ?>">
        <?php endif; ?>

        <h3>Detail Program:</h3>
        <?php
        // ambil detail sesuai program_id
        $detailsQuery = mysqli_query($db, "SELECT * FROM tb_detail_program_unggulan WHERE program_id=" . $prog['id'] . " ORDER BY id ASC");
        if(mysqli_num_rows($detailsQuery) > 0):
            while($det = mysqli_fetch_assoc($detailsQuery)):
                $images = !empty($det['image_detail']) ? explode(',', $det['image_detail']) : [];
        ?>
                <div class="detail">
                    <h4><?= htmlspecialchars($det['judul_detail']) ?></h4>
                    <p><?= nl2br(htmlspecialchars($det['deskripsi_detail'])) ?></p>
                    <?php foreach($images as $img): ?>
                        <img src="../../admin/uploads/<?= trim($img) ?>" alt="<?= htmlspecialchars($det['judul_detail']) ?>">
                    <?php endforeach; ?>
                </div>
        <?php
            endwhile;
        else:
        ?>
            <p class="no-detail">Belum ada detail untuk program ini.</p>
        <?php endif; ?>
    </div>
<?php endwhile; ?>

</body>
</html>
