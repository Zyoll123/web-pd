<?php
session_start();
include '../aksi/koneksi.php';

if (!isset($_SESSION['id'])) {
    header("Location: ../login/login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="container">
        <nav class="navigation">
            <a href="#">SISWA</a>
            <a href="tabeluser.php">USER</a>
        </nav>
        <h2>CRUD DATA SISWA</h2>
        <p>Selamat datang,
            <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Tamu'; ?>!
        </p>

        <!-- Tabel data siswa -->
        <table border="1">
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            // Query untuk mengambil data siswa
            $result = $conn->query("SELECT * FROM siswa");

            // Menampilkan data dari query
            while ($d = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nisn']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td>
                        <!-- Tautan untuk edit dan hapus, menggunakan ID sebagai parameter -->
                        <a href='edit.php?nisn=<?php echo $d['nisn']; ?>'>Edit</a>
                        <a href='../aksi/hapus.php?nisn=<?php echo $d['nisn']; ?>'>Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <br>
        <a href="tambah.html">tambah Siswa</a>
        <br>
        <a href="../login/login.html">Log Out</a>
    </div>
</body>

</html>