<?php 

include '../../config.php';

session_start();

if (isset($_POST['submit'])) {
	$ice = $_POST['ice'];
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $nom_f = $_POST['nom_f'];
	$tel = $_POST['tel'];


	
    $sql = "INSERT INTO client ( ice, email, ville, nom_f,tel)
			VALUES (  '$ice', '$email', '$ville','$nom_f','$tel')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Client Ajoutee Avec Succes.')</script>";
             } else {
                echo "Erreur: " . $sql . ":-" . mysqli_error($conn);

                mysqli_close($conn);
             }             
            
            

if (!isset($_SESSION['nom_complet'])) {
    header("Location: ../authentification.php");
}
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
                <h5 class="text-center mb-4">Ajouter Un Nouveau Client</h5>
                <form class="form-card"  method="POST">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Client<span class="text-danger"> *</span></label> <input type="text"  name="nom_f" placeholder="" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"> Ville<span class="text-danger"> *</span></label> <input type="text" name="ville" placeholder="" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label> <input type="text" name="email" placeholder="" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Telephone<span class="text-danger"> *</span></label> <input type="text" name="tel" placeholder="" > </div>
                    </div>
					<div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3"> ICE<span class="text-danger"> *</span></label> <input type="text" name="ice" placeholder="" > </div>
                    </div>
                   
                   
                    <div class="row justify-content-end">

                        <div class="form-group col-sm-3"> <button name="submit"	 class="btn-block btn-primary">AJOUTER</button> </div><br>

                    </div>
					<a class="fa fa-angle-double-left justify-content-end" href="client.php"> Retourner</a></p>

                </form>
            </div>
        </div>
    </div>
</div>




</body>
</html>