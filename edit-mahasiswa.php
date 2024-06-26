<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Mahasiswa</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            // Include koneksi
                            include('dbconnect.php');
                            
                            // Ambil ID mahasiswa dari query string
                            $id = $_GET['id'];
                            
                            // Query untuk mengambil data mahasiswa berdasarkan ID
                            $sql = "SELECT * FROM mahasiswa WHERE id = ?";
                            $stmt = $k->prepare($sql);
                            $stmt->bind_param("i", $id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            // Tampilkan form edit
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                ?>
                                <form action="proses-edit-mahasiswa.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group">
                                        <label for="nama">Nama:</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nim">NIM:</label>
                                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $row['nim']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jurusan">Jurusan:</label>
                                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $row['jurusan']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun_masuk">Tahun Masuk:</label>
                                        <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" value="<?php echo $row['tahun_masuk']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="L" <?php echo ($row['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                                            <option value="P" <?php echo ($row['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="data-mahasiswa.php" class="btn btn-default">Batal</a>
                                </form>
                                <?php
                            } else {
                                echo "Data mahasiswa tidak ditemukan.";
                            }
                            
                            // Tutup koneksi
                            $stmt->close();
                            $k->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->