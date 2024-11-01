<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['nom_complet'])) {
    header("Location: pages/panel.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$mdp = $_POST['mdp'];

	$sql = "SELECT * FROM admin WHERE email='$email' AND mdp='$mdp'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['nom_complet'] = $row['nom_complet'];
		header("Location: pages/panel.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
   Authentification
  </title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('assets/img/bg.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">S'identifier </h4>
                  

                </div>
              </div>
              <div class="card-body">
                <form role="form" method="POST" class="text-start">
                  <div class="input-group input-group-outline my-3">
                  
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <input type="password" placeholder="Mot De Passe" name="mdp"  value="<?php $_POST['mdp']; ?>" class="form-control">
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Se Souvenir de moi</label>
                  </div>
                  <div class="text-center">
                    <button name="submit"   class="btn bg-gradient-info w-100 my-4 mb-2">Se Connecter</button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>
  
  
</body>

</html>