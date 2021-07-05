<?php 
    include_once '../function.php';
    
	session_start();

		# cek apakah yang mengakses halaman ini sudah login sebagai pegawai
	if(!isset($_SESSION['pegawai'])){
		header("location:../index.php?pesan=level");
    }
    
    if (isset( $_POST['tambah-palawija'])) {

        if (tambah_palawija($_POST)>0) {
            echo"
            <script>
                alert('data berhasil ditambahkan');
            </script>";
        }else {
            echo "
            <script >
                alert('data gagal ditambahkan');
            </script>";
    }
    }

    $kecamatan = "";
            $bulan = "";
            $tahun = "";
    if (isset($_POST['tampil'])) {
            $kecamatan = $_POST['kecamatan'];
            $bulan = $_POST ['bulan'];
            $tahun = $_POST['tahun'];
    }

include '../user/nav_pegawai.php'; 
    include 'popup_tambah_palawija.php';?>

    <!-- awal main menu -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <h2>Kelola Data Palawija</b></h2><br>

        </div><br>

        <!-- tombol select -->
        
        <form action="" method="post">
        <div class="form-row align-items-center">
        
        <div class="form-grup col-md-3">
                    
                    <select name="kecamatan" id="kecamatan" class="form-control">
                        <option selected> Pilih Kecamatan </option>
                        <option value="Denpasar Barat" <?php if ($kecamatan=="Denpasar Barat"){ echo "selected"; } ?>>Denpasar Barat</option>
                        <option value="Denpasar Utara" <?php if ($kecamatan=="Denpasar Utara"){ echo "selected"; } ?>>Denpasar Utara</option>
                        <option value="Denpasar Timur" <?php if ($kecamatan=="Denpasar Timur"){ echo "selected"; } ?>>Denpasar Timur</option>
                        <option value="Denpasar Selatan" <?php if ($kecamatan=="Denpasar Selatan"){ echo "selected"; } ?>>Denpasar Selatan</option>
                        
                    </select>
                </div>

                <div class="form-grup col-md-3">
                    <select name="bulan" id="bulan" class="form-control">
                        <option selected> Pilih Bulan </option>
                        <option value="Januari"  <?php if ($bulan=="Januari" ){ echo "selected"; } ?>>Januari</option>
                        <option value="Februari" <?php if ($bulan=="Februari" ){ echo "selected"; } ?>>Februari</option>
                        <option value="Maret"    <?php if ($bulan=="Maret" ){ echo "selected"; } ?>>Maret</option>
                        <option value="April"    <?php if ($bulan=="April" ){ echo "selected"; } ?>>April</option>
                        <option value="Mei"      <?php if ($bulan=="Mei" ){ echo "selected"; } ?>>Mei</option>
                        <option value="Juni"     <?php if ($bulan=="Juni" ){ echo "selected"; } ?>>Juni</option>
                        <option value="Juli"     <?php if ($bulan=="Juli" ){ echo "selected"; } ?>>Juli</option>
                        <option value="Agustus"  <?php if ($bulan=="Agustus" ){ echo "selected"; } ?>>Agustus</option>
                        <option value="September"<?php if ($bulan=="September" ){ echo "selected"; } ?>>September</option>
                        <option value="Oktober"  <?php if ($bulan=="Oktober" ){ echo "selected"; } ?>>Oktober</option>
                        <option value="November" <?php if ($bulan=="November" ){ echo "selected"; } ?>>November</option>
                        <option value="Desember" <?php if ($bulan=="Desember" ){ echo "selected"; } ?>>Desember</option>

                    </select>
                </div>

                <div class="form-grup col-md-3">
                    <select name="tahun" id="tahun" class="form-control">
                        <option value="">Pilih Tahun</option>
                        <?php for($i=2019;$i<=date("Y");$i++){ ?>
                            <option <?php if ($tahun== $i ){ echo "selected"; } ?>><?=$i?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-grup col-md-3">
                    <button type="submit" class="btn btn-primary" name="tampil">Tampil</button>
                </div>

                </div><br>
            </form>
        <!-- akhir tombol select -->

        <!-- tombol kelola -->
        <div class="text-center">
            <a href=""></a>
            <button type="button" class="btn btn-primary rounded-pill shadow" data-toggle="modal"
                data-target="#modal-add" data-role="add_palawija">Tambah Data palawija
                <i class="fa fa-plus"></i>
            </button>
        </div> <br>
        <!-- /tombol kelola -->

        <!--Table-->
        <table id="tablePreview" class="table table-hover table-sm table-bordered text-center" onclick="tabeltxt()">

            <!--Table head-->
            
            <thead>
                <tr>
                    <th class="align-middle" rowspan="3">No</th>
                    <th class="align-middle" rowspan="3" style="width: 280px;">Uraian</th>
                    <th colspan="5">Lahan Sawah (Hektar)</th>
                    <th colspan="5">Lahan Non Sawah (Hektar)</th>
                    <th scope="col" rowspan="3" class="align-middle" style="width:60px;">Aksi</th>
                </tr>
                <tr>

                    <th class="align-middle" rowspan="2">Tanaman Akhir <br> Bulan Yang Lalu</th>
                    <th class="align-middle" rowspan="2">Panen</th>
                    <th class="align-middle" rowspan="2">Tanam</th>
                    <th class="align-middle" rowspan="2">Puso</th>
                    <th class="align-middle">Tanaman <br> Akhir Bulan</th>
                    <th class="align-middle" rowspan="2">Tanaman Akhir <br> Bulan Yang Lalu</th>
                    <th class="align-middle" rowspan="2">Panen</th>
                    <th class="align-middle" rowspan="2">Tanam</th>
                    <th class="align-middle" rowspan="2">Puso</th>
                    <th>Tanaman <br> Akhir Bulan</th>
                </tr>
                <tr>

                    <th class="align-middle">((3)-(4)+(5)-(6))</th>
                    <th class="align-middle"> ((8)-(9)+(10)-(11))</th>

                </tr>
                <tr>
                    <th class="align-middle">(1)</th>
                    <th class="align-middle">(2)</th>
                    <th class="align-middle">(3)</th>
                    <th class="align-middle">(4)</th>
                    <th class="align-middle">(5)</th>
                    <th class="align-middle">(6)</th>
                    <th class="align-middle">(7)</th>
                    <th class="align-middle">(8)</th>
                    <th class="align-middle">(9)</th>
                    <th class="align-middle">(10)</th>
                    <th class="align-middle">(11)</th>
                    <th class="align-middle">(12)</th>
                    <th class="align-middle">(13)</th>
                </tr>
            </thead>

            <!--/Table head-->

            <!-- Table body-->
            <?php 
            $s_kecamatan = '%' . $kecamatan . '%';
            $s_bulan = '%' . $bulan . '%';
            $s_tahun = '%' . $tahun . '%';
            
            $query = "SELECT * FROM tb_palawija WHERE  kecamatan LIKE ? AND bulan LIKE ? AND tahun LIKE ? ";
            $data = $con->prepare($query);
            $data->bind_param('sss',$s_kecamatan, $s_bulan, $s_tahun);
            $data->execute();
            $palawija = $data->get_result();

            if($palawija->num_rows>0){
            $akhirbulan = 0;
            $bsakhirbulan = 0;
            $i=1;
            while ($row = $palawija->fetch_assoc()) {
            $akhirbulan = $row['bulanlalu'] - $row['panen'] + $row['tanam'] - $row['puso'];
            $bsakhirbulan = $row['bsbulanlalu'] - $row['bspanen'] + $row['bstanam'] - $row['bspuso'];

            ?>
            <tr>
                <td class="align-middle"><?= $i++ ?></td>
                <?php 
                $sql = mysqli_query($con,"SELECT * FROM tb_nm_palawija");
                while ($data = mysqli_fetch_assoc($sql)) {
                    if ($row['id_nm_palawija']== $data['id_nm_palawija']) {
                        $nama = $data['nama'];
                        echo"<td>$nama</td>";
                    }
                }
                ?>
                <td class=""><?= $row['bulanlalu'] ?></td>
                <td class="align-middle"><?= $row['panen'] ?></td>
                <td class="align-middle"><?= $row['tanam'] ?></td>
                <td class="align-middle"><?= $row['puso'] ?></td>
                <td class="align-middle"><?= $akhirbulan ?></td>
                <td class="align-middle"><?= $row['bsbulanlalu'] ?></td>
                <td class="align-middle"><?= $row['bspanen'] ?></td>
                <td class="align-middle"><?= $row['bstanam'] ?></td>
                <td class="align-middle"><?= $row['bspuso'] ?></td>
                <td class="align-middle"><?= $bsakhirbulan ?></td>

                <td class="text-center">
                    <a href="update_palawija.php?id_palawija=<?= $row["id_palawija"] ?>"">
                <span class=" fa fa-pencil-square-o"></span>
                    </a>
                    <a href="delete_palawija.php?id_palawija=<?= $row["id_palawija"] ?>"
                        onclick="return confirm('Apakah anda yakin ingin menghapus data user?')">
                        <span class="fas fa-trash-alt"></span>
                    </a>
                </td>
            </tr>

            <?php }} else {?>
            <tr>
            <td colspan='13'><b>Data tidak ditemukan</b> </td>
            </tr>
            <?php } ?>
            <!-- /Tabel body -->
        </table>
        <!--Table-->
        
    </main>
    <!-- akhir main -->
    <!-- js -->

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>




    <!-- /js -->
    </body>

</html>