<?php
require '../../koneksi/koneksi.php';

$id_booking = $_GET['id_booking'];
$hasil = $koneksi->query("SELECT * FROM booking WHERE id_booking = '$id_booking'")->fetch();

if (!$hasil) {
    die("Data booking tidak ditemukan");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Booking</title>
    <link rel="stylesheet" href="path/to/your/css/style.css"> <!-- Sesuaikan dengan path file CSS Anda -->
    <style>
        /* Tambahkan CSS tambahan jika diperlukan */
        .print-button {
            display: none;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <h2>Detail Booking</h2>
        <table class="table">
            <tr>
                <td>Kode Booking</td>
                <td>:</td>
                <td><?php echo $hasil['kode_booking']; ?></td>
            </tr>
            <tr>
                <td>KTP</td>
                <td>:</td>
                <td><?php echo $hasil['ktp']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $hasil['nama']; ?></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><?php echo $hasil['no_tlp']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Sewa</td>
                <td>:</td>
                <td><?php echo $hasil['tanggal']; ?></td>
            </tr>
            <tr>
                <td>Lama Sewa</td>
                <td>:</td>
                <td><?php echo $hasil['lama_sewa']; ?> hari</td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td>:</td>
                <td>Rp. <?php echo number_format($hasil['total_harga']); ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?php echo $hasil['konfirmasi_pembayaran']; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
