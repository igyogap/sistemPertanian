<?php 
    require_once __DIR__ . '/vendor/autoload.php';
    include_once '../function.php';
    
	session_start();

	# cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../index.php?pesan=gagal");
    }

            $kecamatan = "";
            $tahun = "";
    if (isset($_GET['filter'])) {
            $kecamatan = $_GET['kecamatan'];
            $tahun = $_GET['tahun'];
    }


$html ='
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/cetak.css">

    <!-- awal main menu -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="kop">
            <div class="judul">
                <div class="judul1">
                    <h5>BADAN PUSAT STATISTIK <BR><br>DAN <BR><br> DEPARTEMEN PERTANIAN</h5>
                    <br><br>
                </div>

                <div class="judul2">
                    <br><br>
                    <div class="j1">LAPORAN PANEN TANAMAN palawija</div>
                    <div class="j2">(Isian dalam bilangan bulat)</div>
                    <div class="j3"><b>DATA LAPANGAN</b></div>
                </div>

                <div class="judul3">
                    <h2 class="sp">RKSP-palawija</h2>
                    <br><br><br><br><br>
                </div>
                <div class="keterangan1">
                    <table>
                        <tr>
                            <td class="ket1">PROPINSI</td>
                            <td class="titik_dua">:</td>
                            <td class="ket2">BALI</td>
                        </tr>
                        <tr>
                            <td class="ket1">KAB./KOTA</td>
                            <td class="titik_dua">:</td>
                            <td class="ket2">DENPASAR</td>
                        </tr>

                    </table>
                </div>
                <div class="keterangan2">
                    <table>
                        <tr>
                            <td class="ket1r">KECAMATAN</td>
                            <td class="titik_dua">:</td>
                            <td class="ket2r">'.$kecamatan.'</td>
                        </tr>
                        <tr>
                            <td class="ket1r">TAHUN</td>
                            <td class="titik_dua">:</td>
                            <td class="ket2r">'.$tahun.'</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>';

        $html.='
        <!--Table-->    
        <table id="tablePreview" class="table table-sm table-bordered text-center">

            <!--Table head-->

            <thead>
                <tr>
                    <th class="" rowspan="3">No</th>
                    <th class="" rowspan="3" style="width: 280px;">Uraian</th>
                    <th colspan="5">Lahan Sawah (Hektar)</th>
                    <th colspan="5">Lahan Non Sawah (Hektar)</th>
                </tr>
                <tr>

                    <th class="" rowspan="2">Tanaman Akhir <br> Bulan Yang Lalu</th>
                    <th class="" rowspan="2">Panen</th>
                    <th class="" rowspan="2">Tanam</th>
                    <th class="" rowspan="2">Puso</th>
                    <th class="">Tanaman <br> Akhir Bulan</th>
                    <th class="" rowspan="2">Tanaman Akhir <br> Bulan Yang Lalu</th>
                    <th class="" rowspan="2">Panen</th>
                    <th class="" rowspan="2">Tanam</th>
                    <th class="" rowspan="2">Puso</th>
                    <th>Tanaman <br> Akhir Bulan</th>
                </tr>
                <tr>

                    <th class="">((3)-(4)+(5)-(6))</th>
                    <th class=""> ((8)-(9)+(10)-(11))</th>

                </tr>
                <tr>
                    <th class="">(1)</th>
                    <th class="">(2)</th>
                    <th class="">(3)</th>
                    <th class="">(4)</th>
                    <th class="">(5)</th>
                    <th class="">(6)</th>
                    <th class="">(7)</th>
                    <th class="">(8)</th>
                    <th class="">(9)</th>
                    <th class="">(10)</th>
                    <th class="">(11)</th>
                    <th class="">(12)</th>
                </tr>
            </thead>

            <!--/Table head-->
            
            <!-- Table body-->';
            
            $s_kecamatan = '%' . $kecamatan . '%';
            $s_tahun = '%' . $tahun . '%';
            
            $query = "SELECT id_nm_palawija, SUM(bulanlalu) AS bulanlalu,
                                                SUM(panen) AS panen,
                                                SUM(tanam) AS tanam,
                                                SUM(puso) AS puso,
                                                SUM(bsbulanlalu) AS bsbulanlalu,
                                                SUM(bspanen) AS bspanen,
                                                SUM(bstanam) AS bstanam,
                                                SUM(bspuso) AS bspuso 
                        FROM tb_palawija 
                        WHERE   kecamatan LIKE ?  AND tahun LIKE ?  
                        GROUP BY id_nm_palawija
                        ORDER BY id_nm_palawija ASC";
            $data = $con->prepare($query);
            $data->bind_param('ss',$s_kecamatan, $s_tahun);
            $data->execute();
            $palawija = $data->get_result();

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
            $uraian = $row['uraian'];
            $bulanlalu = $row['bulanlalu'] ;
            $panen = $row['panen'] ;
            $tanam = $row['tanam'] ;
            $puso = $row['puso'] ;
            $akhirbulan = $akhirbulan ;
            $bsbulanlalu = $row['bsbulanlalu'] ;
            $bspanen = $row['bspanen'] ;
            $bstanam = $row['bstanam'] ;
            $bspuso = $row['bspuso'] ;
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
            
            $html.='
            <tr>

                <td class="align-middle">'.$i++.'</td>';
                
                $sql = mysqli_query($con,"SELECT * FROM tb_nm_palawija");
                while ($data = mysqli_fetch_assoc($sql)) {
                    if ($row['id_nm_palawija']== $data['id_nm_palawija']) {
                        $nama = $data['nama'];
                        $html.='<td> '.$nama.' </td>';
                    }
                }
               $html.=' 
                <td class=""> '.$bulanlalu.' </td>
                <td class="align-middle"> '.$panen.' </td>
                <td class="align-middle"> '.$tanam.' </td>
                <td class="align-middle"> '.$puso.' </td>
                <td class="align-middle"> '.$akhirbulan.' </td>
                <td class="align-middle">'.$bsbulanlalu.'</td>
                <td class="align-middle">'.$bspanen.'</td>
                <td class="align-middle">'.$bstanam.'</td>
                <td class="align-middle">'.$bspuso.'</td>
                <td class="align-middle">'.$bsakhirbulan.'</td>
            </tr> ';

             }
             $html.='
            <tr class="total-row">
                <td class="align-middle " colspan="2"><b>Total</b></td>
                <td class="align-middle "><b> '.$jumlah_bulanlalu.' </b></td>
                <td class="align-middle"><b> '.$jumlah_panen.' </b></td>
                <td class="align-middle"><b> '.$jumlah_tanam.' </b></td>
                <td class="align-middle"><b> '.$jumlah_puso.' </b></td>
                <td class="align-middle"><b> '.$jumlah_akhirbulan.' </b></td>
                <td class="align-middle"><b> '.$jumlah_bsbulanlalu.' </b></td>
                <td class="align-middle"><b> '.$jumlah_bspanen.' </b></td>
                <td class="align-middle"><b> '.$jumlah_bstanam.' </b></td>
                <td class="align-middle"><b> '.$jumlah_bspuso.' </b></td>
                <td class="align-middle"><b> '.$jumlah_bsakhirbulan.' </b></td>
            </tr>
             ';
            } else {
            $html.='
            <tr>
                <td colspan="13"><b>Data tidak ditemukan</b> </td>
            </tr>
            ';
            }
            $html.=' 
            <!-- /Tabel body -->
        </table>
        <div class="ttd">
            <br><br><br><br>
                <p>Denpasar,..........................</p>
                <p>Kepala Dinas Pertanian</p>
                <p>Kota Denpasar</p><br><br><br><br><br><br><br><br><br>
                <p>(.................................................)</p>
            

        </div>
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

</html>';

$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);

$mpdf->AddPage('L'); // Adds a new page in Landscape orientation
$mpdf->WriteHTML($html);

$mpdf->Output('laporan-palawija.pdf',\Mpdf\Output\Destination::INLINE);