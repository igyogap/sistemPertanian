<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah data palawija</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- isi form -->
            <form action="" method="POST" class="">
                <div class="modal-body">
                    <h5 class="text-center">Masukan Alamat</h5>
                <div class="form-row align-items-center">
                <div class="form-grup col-md-4">
                    
                    <select name="kecamatan" id="kecamatan" class="form-control">
                        <option selected> Pilih Kecamatan </option>
                        <option value="Denpasar Barat">Denpasar Barat</option>
                        <option value="Denpasar Utara">Denpasar Utara</option>
                        <option value="Denpasar Timur">Denpasar Timur</option>
                        <option value="Denpasar Selatan">Denpasar Selatan</option>
                        
                    </select>
                </div>

                <div class="form-grup col-md-4">
                    <select name="bulan" id="bulan" class="form-control">
                        <option selected> Pilih Bulan </option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>

                    </select>
                </div>

                <div class="form-grup col-md-4">
                    
                    <select name="tahun" id="tahun" class="form-control">
                        <option value="">Pilih Tahun</option>
                        <?php for($i=2019;$i<=date("Y");$i++){ ?>
                            <option <?php if ($tahun== $i ){ echo "selected"; } ?>><?=$i?></option>
                        <?php } ?>
                    </select>
                
                </div>
            </div><br>
                    <h5 class="text-center">Masukan Data Palawija</h5>
                    <div class="row">
                    <div class="col-2"><label for="uraian">Uraian</label></div>
                    <div class="form-grup col">
                    
                    <select name="uraian" id="uraian" class="form-control">
                        <option selected> Pilih Uraian </option><br>
                        <?php $sql = mysqli_query($con, "SELECT * FROM tb_nm_palawija");
                                while ($data = mysqli_fetch_array($sql)) {?>
                                
                        <option value="<?= $data['id_nm_palawija'] ?>"><?= $data['nama'] ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    </div>
                    <h6 class="">Lahan Sawah</h6>
                    <div class="form-group">
                        <label>Tanaman Akhir Bulan Lalu</label>
                        <input type="number" min="0" name="bulanlalu" id="bulanlalu" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Panen</label>
                        <input type="number" min="0" name="panen" id="panen" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanam</label>
                        <input type="number" min="0" name="tanam" id="tanam" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Puso</label>
                        <input type="number" min="0" name="puso" id="puso" class="form-control" required>
                    </div>
                    <h6 class="">Lahan Non Sawah</h6>
                    <div class="form-group">
                        <label>Tanaman Akhir Bulan Lalu</label>
                        <input type="number" min="0" name="bsbulanlalu" id="bsbulanlalu" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Panen</label>
                        <input type="number" min="0" name="bspanen" id="bspanen" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanam</label>
                        <input type="number" min="0" name="bstanam" id="bstanam" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Puso</label>
                        <input type="number" min="0" name="bspuso" id="bspuso" class="form-control" required>
                    </div>


                </div>
                <!-- footer form -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="tambah-palawija" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Tambah Data -->