<?php 

include '../../config.php';

session_start();
if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM client WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $id = $row['id'];
      $nom_f = $row['nom_f'];
      $email = $row['email'];
      $ice = $row['ice'];
      $ville = $row['ville'];
      $tel = $row['tel'];

    }
  }
  
if (!isset($_SESSION['nom_complet'])) {
    header("Location: ../client.php");
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

	<title>Client</title>
</head>
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
            <p class="login-text" style="font-size: 1.5rem; font-weight: 400;">Modifier Le Client</p>

		<form  method="POST"  class="form-card">
            <?php
             if (isset($_POST['edit'])) {
                $id = $_GET['id'];
                $nom_f = $_POST['nom_f'];
                $email = $_POST['email'];
                $ice = $_POST['ice'];
                $ville = $_POST['ville'];
                $tel = $_POST['tel'];
              
                $query = "UPDATE client set id = '$id', nom_f = '$nom_f', email = '$email', ice = '$ice', ville = '$ville', tel = '$tel' WHERE id='$id'";
                mysqli_query($conn, $query);
                
                header('Location: client.php');
              }
              ?>

            <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Client<span class="text-danger"> *</span></label> <input type="text" value="<?php echo $nom_f; ?>"  name="nom_f" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"> Ville<span class="text-danger"> *</span></label> <input type="text"  value="<?php echo $ville; ?>" name="ville"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label> <input type="text"  value="<?php echo $email; ?>" name="email"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Telephone<span class="text-danger"> *</span></label> <input type="text"  value="<?php echo $tel; ?>" name="tel"> </div>
                    </div>
					<div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3"> ICE<span class="text-danger"> *</span></label> <input type="text"  value="<?php echo $ice; ?>" name="ice"> </div>
                    </div>
                   
                   
                    <div class="row justify-content-end">

                        <div class="form-group col-sm-3"> <button name="edit"	 class="btn-block btn-primary">Modifer</button> </div><br>

                    </div>
					<a class="fa fa-angle-double-left justify-content-end" href="client.php"> Retourner</a></p>

		</form>
    </div>
        </div>
    </div>

	</div>
</body>
</html>