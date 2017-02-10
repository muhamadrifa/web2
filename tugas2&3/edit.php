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
			$nim = $_GET['nim'];
			$sql = mysqli_query($conn, "SELECT * FROM biodata WHERE nim='$nim'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$nim		     = $_POST['nim'];
				$nama		     = $_POST['nama'];
				$alamat		     = $_POST['alamat'];
				
				$update = mysqli_query($conn, "UPDATE biodata SET nama='$nama', alamat='$alamat'  WHERE nim='$nim'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?nim=".$nim."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
			}
			?>
	<form class="form-horizontal" name="input" method="POST" action="">
		<div class="form-group">
			<label class="col-sm-3 control-label">NIM :</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="nim" value="<?php echo $row ['nim']; ?>" maxlenght="10" placeholder="NIM" required>
				</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Nama :</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="nama" value="<?php echo $row ['nama']; ?>" maxlenght="50" placeholder="Nama" required>
				</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Alamat :</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="alamat" value="<?php echo $row ['alamat']; ?>" maxlenght="50" placeholder="Alamat" required>
				</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">&nbsp;</label>
			<div class="col-sm-6">
				<button type="submit" name="save" class="btn btn-sm btn-info">Update <span class="glyphicon glyphicon-saved"></span></button>
				<a href="index.php" class="btn btn-sm btn-danger">Batal <span class="glyphicon glyphicon-remove"></span></a>
			</div>
		</div>
	</form>
	</article>
	<footer>Muhamad Rifa - 14.111.147</footer>
</div>
</body>
</html>