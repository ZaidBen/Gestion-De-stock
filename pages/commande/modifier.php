<?php 

include '../../config.php';

session_start();
if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM commande WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $id = $row['id'];
      $ref_cmd = $row['ref_cmd'];
      $des_pdt = $row['des_pdt'];
      $prix_uni = $row['prix_uni'];
      $client = $row['client'];
      $date_c = $row['date_c'];
      $prix_t = $row['prix_t'];
      $qte = $row['qte'];

    }
  }
  
if (!isset($_SESSION['nom_complet'])) {
    header("Location: ../commande.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="	https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="	https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">


	

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Commande</title>
</head>
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
            <p class="login-text" style="font-size: 1.5rem; font-weight: 400;">Modifier La Commande</p>

		<form  method="POST"  class="form-card">
        <?php
             if (isset($_POST['edit'])) {
                $id = $_GET['id'];
                $ref_cmd = $_POST['ref_cmd'];
                $des_pdt = $_POST['des_pdt'];
                $prix_uni = $_POST['prix_uni'];
                $client = $_POST['client'];
                $date_c = $_POST['date_c'];
                $qte = $_POST['qte'];

              
                $query = "UPDATE commande set id = '$id', ref_cmd = '$ref_cmd', des_pdt = '$des_pdt', prix_uni = '$prix_uni', client = '$client', date_c = '$date_c', qte = '$qte' WHERE id='$id'";
                mysqli_query($conn, $query);
                
                header('Location: commande.php');
              }
              ?>

            <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Reference<span class="text-danger"> *</span></label> <input type="text" value="<?php echo $ref_cmd; ?>"  name="ref_cmd" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"> Client<span class="text-danger"> *</span></label> <input type="text"  value="<?php echo $client; ?>" name="client"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Article<span class="text-danger"> *</span></label> <input type="text"  value="<?php echo $des_pdt; ?>" name="des_pdt"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Quantite<span class="text-danger"> *</span></label> <input type="text"  value="<?php echo $qte; ?>" name="qte"> </div>
                    </div>
					<div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"> Prix unitaite<span class="text-danger"> *</span></label> <input type="text"  value="<?php echo $prix_uni; ?>" name="prix_uni"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"> Prix ttc<span class="text-danger"> *</span></label> <input type="text"  value="<?php echo $prix_t; ?>" name="$prix_t" readonly> </div>
                    </div>
                   
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Date<span class="text-danger"> *</span></label> <input   value="<?php echo $date_c; ?>" name="date_c" readonly> </div>
                    </div>
                    <div class="row justify-content-end">

                        <div class="form-group col-sm-3"> <button name="edit"  class="btn-block btn-primary">Modifer</button> </div><br>

                    </div>
					<a class="fa fa-angle-double-left justify-content-end" href="commande.php"> Retourner</a></p>

		</form>
    </div>
        </div>
    </div>

	</div>
   
</body>
</html>