<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Ilham Setia BHakti">

    <title>Jadwal Otomatis</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Jadwal Otomatis</h1>
          </div>

          <div class="jumbotron">
          <?php 
            $time_start = microtime(true); 
            $this->load->view('fungsi');
            
            $jumlah_individu = 10;
            $laju_mutasi = 0.9;
            $iterasi = 0;

            $chunk_penyewa = array_chunk($penyewa, 5);
            $chunk_waktu = array_chunk($waktu, 5);

            for($k = 0; $k < count($chunk_penyewa); $k++){
              list($jadwal_optimal,$iterasi) = GA($chunk_penyewa[$k],$chunk_waktu[$k],$jumlah_individu, $laju_mutasi, $iterasi);
              #konversi kembali ke string
              for ($x = 0; $x < count($jadwal_optimal['kromosom_penyewa']); $x++) {
                $i = $jadwal_optimal['kromosom_penyewa'][$x];
                $i -= 1; #ratain index
                $nama_penyewa = $chunk_penyewa[$k][$i]->nama_karyawan;
                $waktu_sewa = $chunk_waktu[$k][$i]->hari.", ".$chunk_waktu[$k][$i]->jam;
                $jadwal_optimal_db[] = array("kromosom_penyewa"=> $nama_penyewa
                                            , "kromosom_waktu"=> $waktu_sewa);
              }
            }
            // echo '<pre>';print_r($chunk_penyewa);die();

            // //bentuk jadwal ke db   
            // for ($x = 0; $x < count($jadwal_optimal["kromosom_penyewa"]); $x++) {
            //   $jadwal_optimal_db[] = array("kromosom_penyewa"=> $jadwal_optimal["kromosom_penyewa"][$x] - 1
            //                               , "kromosom_waktu"=> $jadwal_optimal["kromosom_waktu"][$x] - 1);
            // }

            // //bentuk jadwal ke db chunk
            // $tes = range(count($penyewa) / 2,count($penyewa));

            // for ($x = 0; $x < count($chunk_penyewa[1]); $x++) {
            //   $jadwal_optimal_db[] = array("kromosom_penyewa"=> $tes[$x]
            //                               , "kromosom_waktu"=> $tes[$x]);
            // }

            shuffle($jadwal_optimal_db);
            $time_end = microtime(true);
            $execution_time = $time_end - $time_start;
            // echo 'Iterasi = '. $iterasi.'<br/>';
            // echo '<b>Total Execution Time:</b> '.round($execution_time, 2).' Detik'; die();
          ?>
<?php
foreach ($jadwal_optimal_db as $jadwal_optimal_db) {
  $nama_penyewa = $jadwal_optimal_db['kromosom_penyewa'];
  $waktu_sewa = $jadwal_optimal_db['kromosom_waktu'];

  #input data jadwal ke tabel
  $this->m_admin->input_data_jadwal('jadwal', $nama_penyewa, $waktu_sewa);
}

$url = site_url('admin/jadwal');
echo "<script>
alert('Jadwal berhasil dibuat!');
window.location.href='$url';
</script>";

// var_dump($jadwal_optimal_db);
die();
?>
<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Waktu</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($jadwal_optimal_db as $i): ?>
									<tr>
										<td width="150">
											<?php echo $penyewa[$i["kromosom_penyewa"]]->nama ?>
										</td>
										<td width="150">
											<?php echo $waktu[$i["kromosom_waktu"]]->hari . ", " . $waktu[$i["kromosom_waktu"]]->jam ?>
										</td>
                  </tr>
									<?php endforeach; ?>
								</tbody>
							</table>
          </div>
        </main>
      </div>
    </div>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    
	<script>
      feather.replace()
    </script>
  
  </body>
</html>
