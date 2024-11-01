<?php 

include '../../config.php';

session_start();
if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM stock WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $id = $row['id'];
      $des_pdt = $row['des_pdt'];
      $qte = $row['qte'];
      $ref = $row['ref'];
      $prix_uni = $row['prix_uni'];
      $date_imp = $row['date_imp'];
      $date_exp = $row['date_exp'];
    }
  }
  
 
          
            
            

if (!isset($_SESSION['nom_complet'])) {
    header("Location: ../stock.php");
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
		<form  method="POST"  class="login-email">
            <?php
             if (isset($_POST['edit'])) {
                $id = $_GET['id'];
                $des_pdt = $_POST['des_pdt'];
                $qte = $_POST['qte'];
                $ref = $_POST['ref'];
                $prix_uni = $_POST['prix_uni'];
                $date_imp = $_POST['date_imp'];
                $date_exp = $_POST['date_exp'];
              
                $query = "UPDATE stock set id = '$id', des_pdt = '$des_pdt', ref = '$ref', qte = '$qte', prix_uni = '$prix_uni', date_imp = '$date_imp', date_exp = '$date_exp' WHERE id='$id'";
                mysqli_query($conn, $query);
                
                header('Location: stock.php');
              }
              ?>
            <p class="login-text" style="font-size: 1.5rem; font-weight: 400;">Modifier Le Produit</p>

			<div class="input-group">
				<input   name="des_pdt" value="<?php echo $des_pdt; ?>"  required>
			</div>
			<div class="input-group">
				<input  name="qte" value="<?php echo $qte; ?>" required>
			</div>
            <div class="input-group">
				<input   name="ref" value="<?php echo $ref; ?>" required>
			</div>
			<div class="input-group">
				<input name="prix_uni" value="<?php echo $prix_uni; ?>" required>
			</div>
            <div class="input-group">
				<input type="date" id="current_date"   name="date_imp" value="<?php echo $date_imp; ?>" required>
			</div>
            <div class="input-group">
				<input type="date" id="current_date"  name="date_exp" value="<?php echo $date_exp; ?>" required>
			</div>
			
			<div class="input-group">
				<button name="edit"  class="btn" >Modifier</button>
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
document.getElementById("current_date").value.innerHTML = year + "-" + month + "-" + day;
</script>
</html>