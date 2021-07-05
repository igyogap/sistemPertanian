<?php 
    include_once '../function.php';
    session_start();
    	# cek apakah yang mengakses halaman ini sudah login sebagai pegawai
	if(!isset($_SESSION['pegawai'])){
		header("location:../index.php?pesan=level");
    }

    $id = $_GET["id_padi"];

    $padi = query("SELECT * FROM tb_padi WHERE id_padi = $id")[0];
    

    //apakah tombol update sudah ditekan apa belum
if (isset($_POST["update"])) {
    
    //cek keberhasilan ubah
    if (update_padi($_POST)>0) {
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'input_padi.php';
        </script>";
    }else {
        echo "
        <script >
            alert('data gagal diubah');
            document.location.href = 'input_padi.php';
        </script>";
    }
}
if (isset($_POST["cancel"])) {
    
    echo"
    <script>
        document.location.href = 'input_padi.php';
    </script>
    ";
}

 include '../user/nav_pegawai.php'; ?>

    <!-- awal main -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <h2>Ubah Data Padi</b></h2><br>

        </div><br>

        <form action="" method="POST">
            <input type="hidden" name="id_padi" value="<?= $padi["id_padi"];?>">
            <div class="form-group row">

                <div class="col-2">
                    <?php $result = mysqli_query($con, "SELECT * FROM tb_padi WHERE id_padi='$id'");
                if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                $kecamatan = $row['kecamatan'];
                
                }
                ?>
                    <select name="kecamatan" id="kecamatan" class="form-control">
                        <option <?php if($kecamatan=="Denpasar Barat" ) echo "selected" ;?>>Denpasar Barat</option>
                        <option <?php if($kecamatan=="Denpasar Utara" ) echo "selected" ;?>>Denpasar Utara</option>
                        <option <?php if($kecamatan=="Denpasar Timur" ) echo "selected" ;?>>Denpasar Timur</option>
                        <option <?php if($kecamatan=="Denpasar Selatan" ) echo "selected" ;?>>Denpasar Selatan</option>
                    </select>
                </div>

                <div class="col-2">
                    <?php 
                $bulan = $row['bulan'];

                ?>
                    <select name="bulan" id="bulan" class="form-control">
                        <option <?php if($bulan=="Januari" ) echo "selected" ;?>>Januari</option>
                        <option <?php if($bulan=="Februari" ) echo "selected" ;?>>Februari</option>
                        <option <?php if($bulan=="Maret" ) echo "selected" ;?>>Maret</option>
                        <option <?php if($bulan=="April" ) echo "selected" ;?>>April</option>
                        <option <?php if($bulan=="Mei" ) echo "selected" ;?>>Mei</option>
                        <option <?php if($bulan=="Juni" ) echo "selected" ;?>>Juni</option>
                        <option <?php if($bulan=="Juli" ) echo "selected" ;?>>Juli</option>
                        <option <?php if($bulan=="Agustus" ) echo "selected" ;?>>Agustus</option>
                        <option <?php if($bulan=="September" ) echo "selected" ;?>>September</option>
                        <option <?php if($bulan=="Oktober" ) echo "selected" ;?>>Oktober</option>
                        <option <?php if($bulan=="November" ) echo "selected" ;?>>November</option>
                        <option <?php if($bulan=="Desember" ) echo "selected" ;?>>Desember</option>

                    </select>
                </div>

                <div class="col-2">
                    <?php $tahun = $row['tahun'] ?>
                    <select name="tahun" id="tahun" class="form-control">
                        <?php for($i=2019;$i<=date("Y");$i++){ ?>
                        <option <?php if($tahun==$i) echo "selected" ;?>>
                            <?=$i?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div><br>

            <div class="form-group row">
                <div class="col-1"><label for="id_nm_padi">Uraian</label></div>
                <div class="form-grup col-5">

                    <select name="id_nm_padi" id="id_nm_padi" class="form-control">
                        <?php $sql = mysqli_query($con, "SELECT * FROM tb_nm_padi");
                            while ($data = mysqli_fetch_assoc($sql)) {
                                if ($padi['id_nm_padi']==$data['id_nm_padi']) {
                                $select="selected";
                                }else{
                                $select="";
                                }
                                $id = $data['id_nm_padi'];
                                $nama = $data['nama'];
                                echo "<option value='$id' $select >$nama 
                            
                            </option>";
                         } ?>
                    </select>
                </div>
            </div><br>
            <div class="col-6 text-center">
                <h5>Lahan Sawah</h5>
            </div><br>
            <div class="form-group row">
                <label for="bulanlalu" class="col-sm-1 col-form-label">Bulan Lalu</label>
                <div class="col-5">
                    <input type="number" class="form-control" name="bulanlalu" id="bulanlalu"
                        value="<?= $padi['bulanlalu']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="panen" class="col-sm-1 col-form-label">Panen</label>
                <div class="col-5">
                    <input type="number" class="form-control" name="panen" id="panen" value="<?= $padi['panen']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanam" class="col-sm-1 col-form-label">Tanam</label>
                <div class="col-5">
                    <input type="number" class="form-control" name="tanam" id="tanam" value="<?= $padi['tanam']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="puso" class="col-sm-1 col-form-label">Puso</label>
                <div class="col-5">
                    <input type="number" class="form-control" name="puso" id="puso" value="<?= $padi['puso']; ?>">
                </div>
            </div><br>
            <div class="col-6 text-center">
                <h5>Lahan Bukan Sawah</h5>
            </div><br>
            <div class="form-group row">
                <label for="bsbulanlalu" class="col-sm-1 col-form-label">Bulan Lalu</label>
                <div class="col-5">
                    <input type="number" class="form-control" name="bsbulanlalu" id="bsbulanlalu"
                        value="<?= $padi['bsbulanlalu']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="bspanen" class="col-sm-1 col-form-label">Panen</label>
                <div class="col-5">
                    <input type="number" class="form-control" name="bspanen" id="bspanen"
                        value="<?= $padi['bspanen']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="bstanam" class="col-sm-1 col-form-label">Tanam</label>
                <div class="col-5">
                    <input type="number" class="form-control" name="bstanam" id="bstanam"
                        value="<?= $padi['bstanam']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="bspuso" class="col-sm-1 col-form-label">Puso</label>
                <div class="col-5">
                    <input type="number" class="form-control" name="bspuso" id="bspuso" value="<?= $padi['bspuso']; ?>">
                </div>
            </div><br>

            <div class="form-group ">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
            </div>

        </form>

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