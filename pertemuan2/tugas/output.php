<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Nilai Mahasiswa</title>
</head>
<body>
    <div class="container mt-5">

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $matkul = $_POST['matkul'];
            $nilai_uts = $_POST['nilai_uts'];
            $nilai_uas = $_POST['nilai_uas'];
            $nilai_tugas = $_POST['nilai_tugas'];
        
            $nilai_total = ($nilai_uts * 0.3) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);
        
            $status = ($nilai_total > 55) ? "Lulus" : "Tidak Lulus";
        
            if ($nilai_total >= 85 && $nilai_total <= 100) {
                $grade = "A";
            } elseif ($nilai_total >= 70 && $nilai_total < 85) {
                $grade = "B";
            } elseif ($nilai_total >= 56 && $nilai_total < 70) {
                $grade = "C";
            } elseif ($nilai_total >= 36 && $nilai_total < 55) {
                $grade = "D";
            } elseif ($nilai_total >= 0 && $nilai_total < 36) {
                $grade = "E";
            } else {
                $grade = "I";
            }
        
            switch ($grade) {
                case "A": $predikat = "Sangat Memuaskan"; break;
                case "B": $predikat = "Memuaskan"; break;
                case "C": $predikat = "Cukup"; break;
                case "D": $predikat = "Kurang"; break;
                case "E": $predikat = "Sangat Kurang"; break;
                default: $predikat = "Tidak Ada";
            }
            
            echo "<div style='font-family: Arial, sans-serif; padding: 20px;'>";
            echo "<h2>Hasil Nilai Siswa</h2>";
            echo "<p><strong>Nama:</strong> $nama</p>";
            echo "<p><strong>Mata Kuliah:</strong> $matkul</p>";
            echo "<p><strong>Nilai UTS:</strong> $nilai_uts</p>";
            echo "<p><strong>Nilai UAS:</strong> $nilai_uas</p>";
            echo "<p><strong>Nilai Tugas:</strong> $nilai_tugas</p>";
            echo "<p><strong>Total Nilai:</strong> $nilai_total</p>";
            echo "<p><strong>Status:</strong> $status</p>";
            echo "<p><strong>Grade:</strong> $grade</p>";
            echo "<p><strong>Predikat:</strong> $predikat</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>