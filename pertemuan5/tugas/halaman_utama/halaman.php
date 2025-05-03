<?php
require_once '../dbkoneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pink Puskesmas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #fff0f5;
        }

        .navbar {
            background-color: #e83e8c;
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .hero {
            padding: 3rem 1rem;
            background: linear-gradient(135deg, #ff69b4, #ffb6c1);
            color: white;
            border-radius: .5rem;
        }

        .stat-card {
            transition: transform 0.2s ease-in-out;
            background-color: #ffe4e1;
            border-left: 5px solid #e83e8c;
        }

        .stat-card:hover {
            transform: scale(1.03);
            box-shadow: 0 0 15px rgba(232, 62, 140, 0.2);
        }

        .stat-card h3 {
            color: #e83e8c;
        }

        .btn-outline-pink {
            border-color: #e83e8c;
            color: #e83e8c;
        }

        .btn-outline-pink:hover {
            background-color: #e83e8c;
            color: white;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            padding: 20px;
            color: #b03a6f;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">💖 Puskesmas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="../pasien/list_pasien.php">Pasien</a></li>
                <li class="nav-item"><a class="nav-link" href="../paramedik/list_paramedik.php">Paramedik</a></li>
                <li class="nav-item"><a class="nav-link" href="../periksa/list_periksa.php">Periksa</a></li>
                <li class="nav-item"><a class="nav-link" href="../unit_kerja/list_unit.php">Unit</a></li>
                <li class="nav-item"><a class="nav-link" href="../kelurahann/list_klurahan.php">Kelurahan</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<div class="container hero mb-4">
    <h1 class="display-5">Dashboard Puskesmas Pink</h1>
    <p class="lead">Sistem informasi layanan kesehatan yang cantik dan efektif 💗</p>
</div>

<!-- Stat Cards -->
<div class="container mb-5">
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card stat-card text-center p-3">
                <i class="fas fa-user-injured fa-2x mb-2 text-danger"></i>
                <h5 class="mb-1">Pasien</h5>
                <h3>150</h3>
                <a href="../pasien/list_pasien.php" class="btn btn-sm btn-outline-pink mt-2">Lihat</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card text-center p-3">
                <i class="fas fa-user-nurse fa-2x mb-2 text-success"></i>
                <h5 class="mb-1">Paramedik</h5>
                <h3>35</h3>
                <a href="../paramedik/list_paramedik.php" class="btn btn-sm btn-outline-pink mt-2">Lihat</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card text-center p-3">
                <i class="fas fa-notes-medical fa-2x mb-2 text-warning"></i>
                <h5 class="mb-1">Periksa</h5>
                <h3>72</h3>
                <a href="../periksa/list_periksa.php" class="btn btn-sm btn-outline-pink mt-2">Lihat</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card text-center p-3">
                <i class="fas fa-map-marker-alt fa-2x mb-2 text-primary"></i>
                <h5 class="mb-1">Kelurahan</h5>
                <h3>12</h3>
                <a href="../kelurahann/list_klurahan.php" class="btn btn-sm btn-outline-pink mt-2">Lihat</a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    &copy; 2025 💕 Puskesmas Pink. Semua hak dilindungi.
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
