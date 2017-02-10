<?php
include("conn.php");
?>
<!DOCTYPE HTML>
<html>
<head><title>CRUD</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device=width, initial-scale=1">
<link href="css/style.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<header>
		<h3>CRUD Operation</h3>
	</header>
	<nav>
		<ul>
			<li><b>MENU</b></li>
			<li><a href="#">Menu 1</a></li>
			<li><a href="#">Menu 2</a></li>
			<li><a href="#">Menu 3</a></li>
		</ul>
	</nav>
	<article>
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$nim = $_GET['nim'];
				$cek = mysqli_query($conn, "SELECT * FROM biodata WHERE nim='$nim'");
				if(mysqli_num_rows($cek) == 0){
					echo 'Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($conn, "DELETE FROM biodata WHERE nim='$nim'");
					if($delete){
						echo 'Data berhasil dihapus.';
					}else{
						echo 'Data gagal dihapus.';
					}
				}
			}
			?>

<table class="table table-striped table-hover">
			<a href="add.php" class="btn btn-link btn-sm"> Insert</a>
			<tr>
				<td><b>No</b></td>
				<td><b>Nim</b></td>
				<td><b>Nama</b></td>
				<td><b>Alamat</b></td>
				<td><b>Aksi</b></td>
			</tr>
	<?php
	$sql = mysqli_query($conn, "SELECT * FROM biodata WHERE nim ");
	if(mysqli_num_rows($sql) == 0){
		echo '<tr><td colspan="5">Data Tidak Ada.</td></tr>';
	}else{
		$no = 1;
		while($row = mysqli_fetch_assoc($sql)){
	echo '<tr>
			<td>'.$no.'</td>
			<td>'.$row['nim'].'</td>
			<td>'.$row['nama'].'</td>
			<td>'.$row['alamat'].'</td>';

	echo  '<td>
			<a href="edit.php?nim='.$row['nim'].'" title="Edit Data" class="btn btn-primary btn-sm">Edit</a>
			<a href="index.php?aksi=delete&nim='.$row['nim'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-danger btn-sm">Delete</a></td>
		</tr>';
		$no++;
		}
	}

?>                 
		</table>
	</article>
	<footer>Muhamad Rifa - 14.111.147</footer>
</body>
</html>';
