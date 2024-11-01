<?php 

include '../../config.php';

session_start();

if (isset($_POST['submit'])) {
	$ref_cmd = $_POST['ref_cmd'];
	$des_pdt = $_POST['des_pdt'];
	$qte = $_POST['qte'];
    $prix_uni = $_POST['prix_uni'];
    $client = $_POST['client'];
    $date_c = $_POST['date_c'];
  //  $date_c = $_POST['date_c'];
//	$prix_t = $_POST['prix_t'];

$sql1 = "INSERT INTO graph_pdt (pdt) VALUE ('$des_pdt')";
$result1 = mysqli_query($conn, $sql1);

    $sql = "INSERT INTO commande (ref_cmd, des_pdt, qte, prix_uni, client,date_c )
			VALUES ('$ref_cmd', '$des_pdt', '$qte', '$prix_uni', '$client','$date_c')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Commander Ajoutee Avec Succes.')</script>";
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

<style>
    select{
    padding: 8px 15px;
    border-radius: 5px !important;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 18px !important;
    font-weight: 300
    }
</style>
	

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Commande</title>
</head>
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
                <h5 class="text-center mb-4">Ajouter Une Nouvelle Commande</h5>
                <form class="form-card"  method="POST">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Ref De Commande<span class="text-danger"> *</span></label> <input type="text"  name="ref_cmd" placeholder="" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"> Client<span class="text-danger"> *</span></label> <input type="text" name="client" placeholder="" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Article<span class="text-danger"> *</span></label>  <select name="des_pdt" > 
                
                <option ></option>
                <?php 
                        $query1 ="SELECT des_pdt FROM stock";
                        $result1 = $conn->query($query1);
                        if($result1->num_rows> 0){
                          $options= mysqli_fetch_all($result1, MYSQLI_ASSOC);
                        }
      foreach ($options as $option) {
      ?>
        <option><?php echo $option['des_pdt']; ?> </option>
        <?php 
        }
       ?>
       </select>
                        
                    </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Quantite<span class="text-danger"> *</span></label> <input type="number" name="qte" placeholder="" > </div>
                    </div>
					<div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"> Prix Unitaire<span class="text-danger"> *</span></label> <input type="text" name="prix_uni" placeholder="" > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"> Date<span class="text-danger"> *</span></label> <input type="date" name="date_c" id="current_date" placeholder="" > </div>

                    </div>
                   
                    <script>
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("current_date").value.innerHTML = year + "-" + month + "-" + day;
</script>
                    
                    <div class="row justify-content-end">

                        <div class="form-group col-sm-3"> <button name="submit"	 class="btn-block btn-primary">AJOUTER</button> </div><br>

                    </div>
					<a class="fa fa-angle-double-left justify-content-end" href="commande.php"> Retourner</a></p>

                </form>
            </div>
        </div>
    </div>
</div>




</body>
</html>