<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>PT. OSIDIA</title>
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css" crossorigin="anonymous">

	
	<style>
	.center {
	  margin: auto;
	  margin-top:100px;
	  width: 60%;
	  padding: 10px;
	  font-size: 18px;
	}
	td{
	  padding: 2px 2px;
	}
	.nunito{
	  font-family: 'Nunito', sans-serif;
	}
	
	body {
	  background-color: #163a76;
	  font-family: 'Open Sans', sans-serif;
	  
	   background: rgb(22,58,118);
		background: linear-gradient(#ebf1ff, #ffffff);
		/* Fallback for older browsers */
		background: -webkit-linear-gradient(#ebf1ff, #ffffff);
		background: -moz-linear-gradient(#ebf1ff, #ffffff);
		background: -o-linear-gradient(#ebf1ff, #ffffff);	
	}
	
	h4{
	  font-size: 24px;
	}
	button{
	  padding: 3px 12px 3px 12px;
	}
	
	#myBtn {
	  display: none; /* Hidden by default */
	  position: fixed; /* Fixed/sticky position */
	  bottom: 20px; /* Place the button at the bottom of the page */
	  right: 30px; /* Place the button 30px from the right */
	  z-index: 99; /* Make sure it does not overlap */
	  border: none; /* Remove borders */
	  outline: none; /* Remove outline */
	  background-color: white; /* Set a background color */
	  color: #163a76; /* Text color */
	  cursor: pointer; /* Add a mouse pointer on hover */
	  padding: 8px; /* Some padding */
	  border-radius: 10px; /* Rounded corners */
	  font-size: 18px; /* Increase font size */
	}

	#myBtn:hover {
	  background-color: #555; /* Add a dark-grey background on hover */
	}

	.btn-oranye-cerah {
      background-color: #FFA500;
      border-color: #FFA500;
      color: #fff;
    }
    .btn-oranye-cerah:hover {
      background-color: #FF8C00;
      border-color: #FF8C00;
      color: #fff;
    }
	</style>

  </head>
  <body>


<nav class="navbar navbar-expand-lg navbar-light bg-light px-2">
  <div class="container-fluid">
    <a class="navbar-brand " href="<?=site_url()?>">OSIDIA TBK</a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarText"
      aria-controls="navbarText"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item d-none">
          <a class="nav-link active" aria-current="page" href="<?=site_url()?>">Beranda</a>
        </li>
      </ul>
      <span class="navbar-text me-2">
        <a href="<?=site_url('login')?>">Admin</a>
      </span>
      <span class="navbar-text">
        <a href="<?=site_url('user')?>">Karyawan</a>
      </span>
    </div>
  </div>
</nav>


	<div class="container row px-5">
		<div class="col-7 mb-3 px-5 align-self-center">
		  	<div class="container mt-5">
				<h1 class="mb-3 fw-bold">Terdepan dalam Industri!</h1>

				<p>PT Osidia adalah pemimpin dalam inovasi manufaktur yang menawarkan solusi industri berkualitas tinggi untuk memenuhi kebutuhan pasar global. Dengan teknologi canggih dan tenaga kerja yang terampil, kami berkomitmen untuk memberikan produk terbaik yang mendukung pertumbuhan dan efisiensi sektor industri. Melalui investasi berkelanjutan dalam penelitian dan pengembangan, PT Osidia memastikan keberlanjutan dan daya saing produk. Kami bangga menjadi mitra terpercaya bagi perusahaan di berbagai sektor, dari otomotif hingga elektronik. Pilih PT Osidia untuk keunggulan dan kemajuan bersama.</p>

				<p>Bersama kita bangun masa depan industri yang lebih baik! 🚀</p>

				<a href="<?=site_url().'/welcome/homepage_daftar'?>"><button type="button" class="btn fw-bold btn-success">Hubungi Kami</button></a>
			</div>
		</div>
		<div class="col-5">
		  <img class="mt-5" width="500px" src="<?=base_url()?>img/main.png"/>
		</div>
	</div>
	

<!-- Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	
  </body>
</html>