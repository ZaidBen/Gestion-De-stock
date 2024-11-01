<?php 

include '../../config.php';

session_start();

if (isset($_POST['submit'])) {
	$des_pdt = $_POST['des_pdt'];
	$ref = $_POST['ref'];
	$qte = $_POST['qte'];
    $prix_uni = $_POST['prix_uni'];
    $date_imp = $_POST['date_imp'];
    $date_exp = $_POST['date_exp'];

	
    $sql = "INSERT INTO stock (des_pdt, ref, qte, prix_uni, date_imp, date_exp)
			VALUES ('$des_pdt', '$ref', '$qte', '$prix_uni', '$date_imp','$date_exp')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Produit Ajoutee Avec Succes.')</script>";
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

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style1.css">

	<title>Produit</title>
</head>
<body>
	<div class="container">
		<form  method="POST" class="login-email">
            <p class="login-text" style="font-size: 1.5rem; font-weight: 400;">Ajouter Un nouveau Produit</p>

			<div class="input-group">
				<input   placeholder="DÉSIGNATION DE PRODUIT	" name="des_pdt"  required>
			</div>
			<div class="input-group">
				<input type="number" placeholder="QUANTITÉ" name="qte"  required>
			</div>
            <div class="input-group">
				<input  placeholder="RÉFÉRENCE" name="ref"  required>
			</div>
			<div class="input-group">
				<input  placeholder="PRIX UNITAIRE" name="prix_uni"  required>
			</div>
            <div class="input-group">
				<input  placeholder="DATE D'IMPOPORTAION" name="date_imp" type="date" id="current_date"  required>
			</div>
            <div class="input-group">
				<input  placeholder="DATE D'EXPORTATION	" name="date_exp" type="date" id="current_date"  required>
			</div>
			
			<div class="input-group">
				<button name="submit"  class="btn" >Ajouter</button>
			</div>
		<br><a class="fa fa-angle-double-left" href="stock.php"> Retourner</a></p>
		</form>
	</div>
</body>
<script>
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("current_date").value.innerHTML = year + "/" + month + "/" + day;
</script>
</html>