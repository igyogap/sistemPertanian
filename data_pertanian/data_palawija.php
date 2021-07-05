<?php 
    include_once '../function.php';
    
	session_start();

		# cek apakah yang mengakses halaman ini sudah login sebagai pegawai
	if(!isset($_SESSION['pegawai'])){
		header("location:../index.php?pesan=level");
    }

            $kecamatan = "";
            $bulan = "";
            $tahun = "";
    if (isset($_GET['filter'])) {
            $kecamatan = $_GET['kecamatan'];
            $bulan = $_GET ['bulan'];
            $tahun = $_GET['tahun'];
    }

 include '../user/nav_pegawai.php'; ?>

    <!-- awal main menu -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <h2>Data Bulanan Palawija</b></h2><br>

        </div><br>

        <!-- tombol select -->

        <form action="" method="GET">
            <div class="form-row align-items-center">

                <div class="form-grup col-md-3">

                    <select name="kecamatan" id="kecamatan" class="form-control">
                        <option selected> Pilih Kecamatan </option>
                        <option value="Denpasar Barat" <?php if ($kecamatan=="Denpasar Barat"){ echo "selected"; } ?>>
                            Denpasar Barat</option>
                        <option value="Denpasar Utara" <?php if ($kecamatan=="Denpasar Utara"){ echo "selected"; } ?>>
                            Denpasar Utara</option>
                        <option value="Denpasar Timur" <?php if ($kecamatan=="Denpasar Timur"){ echo "selected"; } ?>>
                            Denpasar Timur</option>
                        <option value="Denpasar Selatan"
                            <?php if ($kecamatan=="Denpasar Selatan"){ echo "selected"; } ?>>Denpasar Selatan</option>

                    </select>
                </div>

                <div class="form-grup col-md-3">
                    <select name="bulan" id="bulan" class="form-control">
                        <option selected> Pilih Bulan </option>
                        <option value="Januari" <?php if ($bulan=="Januari" ){ echo "selected"; } ?>>Januari</option>
                        <option value="Februari" <?php if ($bulan=="Februari" ){ echo "selected"; } ?>>Februari</option>
                        <option value="Maret" <?php if ($bulan=="Maret" ){ echo "selected"; } ?>>Maret</option>
                        <option value="April" <?php if ($bulan=="April" ){ echo "selected"; } ?>>April</option>
                        <option value="Mei" <?php if ($bulan=="Mei" ){ echo "selected"; } ?>>Mei</option>
                        <option value="Juni" <?php if ($bulan=="Juni" ){ echo "selected"; } ?>>Juni</option>
                        <option value="Juli" <?php if ($bulan=="Juli" ){ echo "selected"; } ?>>Juli</option>
                        <option value="Agustus" <?php if ($bulan=="Agustus" ){ echo "selected"; } ?>>Agustus</option>
                        <option value="September" <?php if ($bulan=="September" ){ echo "selected"; } ?>>September
                        </option>
                        <option value="Oktober" <?php if ($bulan=="Oktober" ){ echo "selected"; } ?>>Oktober</option>
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
                    <button type="submit" class="btn btn-primary" name="filter">Tampil</button>
                    <?php for($i=0; $i >= 1; $i++){ ?>
                    <input type="hidden" name="total" value=" <?= $i ?> ">
                    <?php }; ?>
                </div>

            </div><br>
        </form><hr><br>
        <!-- akhir tombol select -->
            <?php 
            if (isset($_GET['filter'])) {
                $kecamatan = $_GET['kecamatan'];
            $bulan = $_GET ['bulan'];
            $tahun = $_GET['tahun'];
            echo '<a href="../laporan/cetak_bulanan_palawija.php?filter=&kecamatan='.$kecamatan.'&bulan='.$bulan.'&tahun='.$tahun.'">Cetak PDF <span class="fa fa-file-pdf-o"></a><br /><br />';

            
            // $s_kecamatan = '%' . $kecamatan . '%';
            // $s_bulan = '%' . $bulan . '%';
            // $s_tahun = '%' . $tahun . '%';
            
            // $query = "SELECT * FROM tb_palawija WHERE  kecamatan LIKE ? AND bulan LIKE ? AND tahun LIKE ?";
            $query = "SELECT * FROM tb_palawija WHERE  kecamatan='$kecamatan' AND bulan='$bulan' AND tahun='$tahun' ORDER BY id_nm_palawija ASC";
            
            
            
            ?>
            
            
        <!--Table-->
        <table id="tablePreview" class="table table-hover table-sm table-bordered text-center" >

            <!--Table head-->

            <thead>
                <tr>
                    <th class="align-middle" rowspan="3">No</th>
                    <th class="align-middle" rowspan="3" style="width: 280px;">Uraian</th>
                    <th colspan="5">Lahan Sawah (Hektar)</th>
                    <th colspan="5">Lahan Non Sawah (Hektar)</th>
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
                </tr>
            </thead>

            <!--/Table head-->
            <?php
            // $data = $con->prepare($query);
            // $data->bind_param('sss',$s_kecamatan, $s_bulan, $s_tahun);
            // $data->execute();
            // $palawija = $data->get_result();

            $palawija= mysqli_query($con, $query);


            if($palawija->num_rows>0){
            $akhirbulan = 0;
            $bsakhirbulan = 0;
            $jumlah_bulanlalu = 0;
            $jumlah_panen = 0;
            $jumlah_tanam = 0;
            $jumlah_puso = 0;
            $jumlah_akhirbulan = 0;
            $jumlah_bsbulanlalu = 0;
            $jumlah_bspanen = 0;
            $jumlah_bstanam = 0;
            $jumlah_bspuso = 0;
            $jumlah_bsakhirbulan = 0;
            $i=1;
            while ($row = $palawija->fetch_assoc()) {
            
            $akhirbulan = $row['bulanlalu'] - $row['panen'] + $row['tanam'] - $row['puso'];
            $bsakhirbulan = $row['bsbulanlalu'] - $row['bspanen'] + $row['bstanam'] - $row['bspuso'];
            $jumlah_bulanlalu += $row['bulanlalu'] ;
            $jumlah_panen += $row['panen'] ;
            $jumlah_tanam += $row['tanam'] ;
            $jumlah_puso += $row['puso'] ;
            $jumlah_akhirbulan += $akhirbulan ;
            $jumlah_bsbulanlalu += $row['bsbulanlalu'] ;
            $jumlah_bspanen += $row['bspanen'] ;
            $jumlah_bstanam += $row['bstanam'] ;
            $jumlah_bspuso += $row['bspuso'] ;
            $jumlah_bsakhirbulan += $bsakhirbulan ;
            ?>
            <!-- Table body-->
            
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
            </tr>

            <?php }?>

            <tr>
                <td class="align-middle" colspan="2"><b>Total</b></td>
                <td class="align-middle"><b><?= $jumlah_bulanlalu?></b></td>
                <td class="align-middle"><b><?= $jumlah_panen?></b></td>
                <td class="align-middle"><b><?= $jumlah_tanam?></b></td>
                <td class="align-middle"><b><?= $jumlah_puso?></b></td>
                <td class="align-middle"><b><?= $jumlah_akhirbulan?></b></td>
                <td class="align-middle"><b><?= $jumlah_bsbulanlalu?></b></td>
                <td class="align-middle"><b><?= $jumlah_bspanen?></b></td>
                <td class="align-middle"><b><?= $jumlah_bstanam?></b></td>
                <td class="align-middle"><b><?= $jumlah_bspuso?></b></td>
                <td class="align-middle"><b><?= $jumlah_bsakhirbulan?></b></td>
            </tr>

            <?php } else {?>
            <tr>
                <td colspan='13'><b>Data tidak ditemukan</b> </td>
            </tr>
            <?php }} ?>
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