<?php

include("../../config.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM commande WHERE id = '$id'";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: commande.php');
}
if (!isset($_SESSION['nom_complet'])) {
    header("Location: commande.php");
}
?>