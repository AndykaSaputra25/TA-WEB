<?php
session_start(); // mengaktifkan session
if(empty($_SESSION)){ //pengecekan bila session kosong
echo "<script>alert('Anda Harus Login Terlebih Dahulu');
document.location='login.php';
</script>";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>project dpw</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/styledbkam.css">
	</head>
	<body>
		<header>
			<nav>
				<h1>HOTEL TRUNOJOYO</h1>
				<ul>
					<li><a href="logout.php">Log out</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<div class="sidebar">
				<ul>
					<h1></h1>
					<li><a href="kategori.php">Data Kategori</a></li>
				</ul>
				<ul>
					<h1></h1>
					<li><a href="kamar.php">Data Kamar</a></li>
				</ul>
				<ul class="color_sidebar">
					<h1></h1>
					<li><a href="booking.php">Booking</a></li>
				</ul>
			</div>
			<div class="content">
				<ul>
					<li><a href="form-booking.php">Tambah</a></li>
				</ul>
				<table border="1" width="95%">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>No Telp</th>
						<th>No kamar</th>
						<th>Cek in</th>
						<th>Cek out</th>
						<th>Total bayar</th>
						<th>Status</th>
					</tr>
					<tr>
						<?php
						//load file koneksi
						include 'koneksi.php';
						$query = "SELECT * FROM booking bk JOIN kamar km ON bk.id_kamar = km.id_kamar"; //query untuk menampilkan data
						$sql = mysqli_query($connect, $query); //Eksekusi query dari var $query
						$no = 1;
						while ($data = mysqli_fetch_array($sql)) {//ambil semua data dari hasil eksekusi sql
						echo "<tr>";
							echo "<td>".$no++."</td>";
							echo "<td>".$data['nama_pemesan']."</td>";
							echo "<td>".$data['alamat']."</td>";
							echo "<td>".$data['no_hp']."</td>";
							echo "<td>".$data['no_kamar']."</td>";
							echo "<td>".$data['cekin']."</td>";
							echo "<td>".$data['cekout']."</td>";
							echo "<td>".$data['total_bayar']."</td>";
							echo "<td><button class=btn-edit onclick='upStatus()'>".$data['status_booking']."</button></td>";
						echo "</tr>";
						}
						?>
					</tr>
				</table>
			</div>
		</main>
		<!-- belum -->
		<script type="text/javascript">
			function upStatus() { //membuat fungsi upStatus, mendapat dari onclick='upStatus()
				var status; // membuat variabel status
				var pesan = confirm("Apakah Anda Yakin Merubah Status Ini?"); // membuat variabel pesan dengan alert konfirmasi
				if (pesan == true) { // pengecekan ketika isi pesan = true
					status = "Anda Merubah Status!"; // maka status Berubah
				} else { // Selain Itu
					status = "Perintah Dibatalkan!"; // status Berubah
				}
				alert(status); // menampilkan alert status
			}
		</script>
	</body>
</html>