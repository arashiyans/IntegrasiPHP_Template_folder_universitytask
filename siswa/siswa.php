<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatablesSimple').DataTable({
                "pagingType": "full_numbers", // Menampilkan halaman, next, previous, first, last
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], // Menambahkan dropdown untuk memilih jumlah entries per page
                "order": [[0, 'asc']] // Urutkan berdasarkan kolom pertama (kolom "No")
            });
        });
    </script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.php">Aplikasi Data Siswa</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Profile</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu Utama</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="siswa.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-paste"></i></div>
                            Data Siswa
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
<?php
include "koneksi.php";
if (!isset($_GET['aksi'])) {
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Siswa</h1> 
    <div class="card mb-4">
        <div class="card-header">
            <a type="button" class="btn btn-primary" href="index.php?page=siswa&aksi=tambah">Tambah Siswa</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
                    $no = 1;
                    while ($data = mysqli_fetch_array($siswa)) {
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nis']; ?></td>
                        <td><?php echo $data['nama_siswa']; ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td>
                            <a href="index.php?page=siswa&aksi=edit&id=<?php echo $data['id_siswa'] ?>">Edit</a> | 
                            <a href="index.php?page=siswa&aksi=hapus&id=<?php echo $data['id_siswa'] ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        $no++;
                    }
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
} elseif ($_GET['aksi'] == 'tambah') {
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Siswa</h1>
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            <h5>Tambah Siswa</h5>
        </div>
        <div class="card-body">
            <form action='' method="POST" enctype='multipart/form-data'>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="a">
                    <label>NIS</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="b">
                    <label>Nama Siswa</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="c">
                    <label>Jenis Kelamin</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="d">
                    <label>Alamat</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="file" name="e">
                    <label>Foto Siswa</label>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-block" type="submit" name="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['simpan'])) {
        $dir_foto = 'foto/';
        $filename = basename($_FILES['e']['name']);
        $uploadfile = $dir_foto . $filename;
        if ($filename != '') {
            if (move_uploaded_file($_FILES['e']['tmp_name'], $uploadfile)) {
                mysqli_query($koneksi, "INSERT INTO siswa (nis, nama_siswa, jenis_kelamin, alamat, foto_siswa) 
                VALUES('$_POST[a]', '$_POST[b]', '$_POST[c]', '$_POST[d]', '$filename')");
                echo "<script>window.alert('Sukses Menambahkan Data Siswa.');
                window.location='siswa'</script>";
            } else {
                echo "<script>window.alert('Gagal Menambahkan Data Siswa.');
                window.location='index.php?page=siswa&aksi=tambah'</script>";
            }
        } else {
            mysqli_query($koneksi, "INSERT INTO siswa (nis, nama_siswa, jenis_kelamin, alamat) 
            VALUES('$_POST[a]', '$_POST[b]', '$_POST[c]', '$_POST[d]')");
            echo "<script>window.alert('Sukses Menambahkan Data Siswa.');
            window.location='siswa'</script>";
        }
    }
} elseif ($_GET['aksi'] == 'edit') {
    $siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$_GET[id]'");
    $data = mysqli_fetch_array($siswa);
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Siswa</h1>
    <div class="card mb-4 col-md-8">
        <div class="card-header">
            <h5>Update Siswa</h5>
        </div>
        <div class="card-body">
            <form action='' method="POST" enctype='multipart/form-data'>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="a" value="<?php echo $data['nis']; ?>">
                    <label>NIS</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="b" value="<?php echo $data['nama_siswa']; ?>">
                    <label>Nama Siswa</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="c" value="<?php echo $data['jenis_kelamin']; ?>">
                    <label>Jenis Kelamin</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" name="d" value="<?php echo $data['alamat']; ?>">
                    <label>Alamat</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" type="file" name="e">
                    <label>Foto Siswa</label>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-block" type="submit" name="update">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['update'])) {
        $dir_foto = 'foto/';
        $filename = basename($_FILES['e']['name']);
        $uploadfile = $dir_foto . $filename;
        if ($filename != '') {
            if (move_uploaded_file($_FILES['e']['tmp_name'], $uploadfile)) { 
                mysqli_query($koneksi, "UPDATE siswa SET nis = '$_POST[a]',
                                                         nama_siswa = '$_POST[b]',
                                                         jenis_kelamin = '$_POST[c]',
                                                         alamat = '$_POST[d]',
                                                         foto_siswa = '$filename' WHERE id_siswa = '$_GET[id]'");
                echo "<script>window.alert('Sukses Update Data Siswa.');
                window.location='siswa'</script>";
            } else {
                echo "<script>window.alert('Gagal Update Data Siswa.');
                window.location='index.php?page=siswa&aksi=tambah'</script>";
            }
        } else {
            mysqli_query($koneksi, "UPDATE siswa SET nis = '$_POST[a]',
                                                     nama_siswa = '$_POST[b]',
                                                     jenis_kelamin = '$_POST[c]',
                                                     alamat = '$_POST[d]',
                                                     foto_siswa = '$filename' WHERE id_siswa = '$_GET[id]'");
            echo "<script>window.alert('Sukses Update Data Siswa.');
            window.location='siswa'</script>";
        }
    }
} elseif ($_GET['aksi'] == 'hapus') { 
    mysqli_query($koneksi, "DELETE FROM siswa where id_siswa='$_GET[id]'");
    echo "<script>window.alert('Data Siswa Berhasil Di Hapus.');
    window.location='siswa'</script>"; 
}
?>
<?php
include "koneksi.php"; 
?>