<?php include '../layout/header.php';?>

  <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      deletedata($id);
    }

    function deletedata($id)
    {
      $file = fopen("../assets/jenisatk.txt", "r");
      $temp = fopen("../assets/temp.txt", "w");
      while (!feof($file)) {
        $line = fgets($file);
        $data = explode("|", $line);
        if ($data[0] != $id) {
          fwrite($temp, $line);
        }
      }
      fclose($file);
      fclose($temp);
      unlink("../assets/jenisatk.txt");
      rename("../assets/temp.txt", "../assets/jenisatk.txt");

      header("Location: jenisAtk.php");
    }
  ?>

<div class="content-wrapper">
          <div class="row">

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Jenis ATK</h4>

                  <a href="create.php"><button class="btn btn-primary">Tambah</button></a><br><br>
                  
                  <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id Jenis</th>
                    <th>Jenis Atk</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $handle = fopen("../assets/jenisatk.txt", "r");
                  if ($handle) {
                    while (($line = fgets($handle)) !== false) {
                      $data = explode("|", $line);

                      if ((!($data[0] < 2)) || ($data[0] == 1)) {
                        echo '
                          <tr>
                            <td>' . $data[0] . '</td>
                            <td>' . $data[1] . '</td> 
                            <td><a href="edit.php?id=' . $data[0] . '"><button class="btn btn-warning">Edit</button></a>  <a href="?id=' . $data[0] . '"><button class="btn btn-danger">Hapus</button></a></td>
                        </tr>';
                      }
                    }
                    fclose($handle);
                  } else {
                    echo "Error: File not found";
                  }
                  ?>
                </tbody>
              </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?php include '../layout/footer.php';?>