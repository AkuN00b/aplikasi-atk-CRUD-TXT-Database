<?php
  $idatk = PHP_EOL . $_POST['idatk'];
  $nama = $_POST['nama'];
  $jenis = $_POST['jenis'];
  $vendor = $_POST['vendor'];
  $stok = $_POST['stok'];
  $file = fopen("../assets/atk.txt", "a");

  fwrite($file, $idatk . "|" . $nama . "|" . $jenis . "|" . $vendor . "|" . $stok);
  fclose($file);

  header("Location: atk.php");
?>