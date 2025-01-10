<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,700&family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
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
	  color: white;
	  font-family: 'Open Sans', sans-serif;
      background: linear-gradient(to right, #008080, #20b2aa);
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

    /* Style border pada elemen input */
    .custom-input-border {
      border: 2px solid #007bff; /* Ganti warna sesuai keinginan */
      border-radius: 5px;        /* Sesuaikan radius sesuai keinginan */
      padding: 0.375rem 0.75rem;
    }
    .custom-input-border:focus {
      border-color: #0056b3;    /* Warna border saat fokus */
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
	</style>

  </head>
  <body>

<section class="vh-100 gradient-custom">
  <div class="container pt-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light text-dark" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mt-md-4 pb-4">

              <h2 class="fw-bolder mb-2 text-uppercase">Login Karyawan</h2>
              <!--p class="text-muted fw-light mb-2">Masukan ID dan Password.</p-->
			  
			  <hr class="pb-2"/>
			  
			  <form method="post" action="<?=site_url('login/login_go')?>">
				  <div class="form-outline form-white mb-2">
					<input type="text" name="username" id="typeEmailX" class="form-control mb-1 custom-input-border form-control-lg" />
					<label class="form-label" for="typeEmailX">Username</label>
				  </div>

				  <div class="form-outline form-white mb-4">
					<input type="password" name="password" id="typePasswordX" class="form-control mb-1 custom-input-border form-control-lg" />
					<label class="form-label" for="typePasswordX">Password</label>
				  </div>

				  <button class="btn btn-success btn-lg px-5" type="submit">Login</button>
			  </form>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

	
  </body>
</html>