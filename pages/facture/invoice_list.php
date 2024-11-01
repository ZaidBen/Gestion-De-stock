<?php 
session_start();
include('inc/header.php');
include 'Invoice.php';
$invoice = new Invoice();

?>
<title>Factures</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('inc/container.php');?>
<ul class="nav navbar-nav">

	</ul>

	

</ul>
<br /><br /><br /><br />
	<div class="container">		
  <nav class="" >
     
     <div style="width: 500px; margin-left:-1%" >
       <div class="">
         <label class="form-label">Rechercher Ici</label>
         <input type="text" id="myInput" class="form-control">
       </div>
      
   </div>
 </div>

</nav>  
	  <h2 class="title">Gestion Des Factures</h2>&nbsp;&nbsp;
    <button class="btn btn-warning dropdown-toggle" type="button" ><a href="../panel.php">Retourner</a></button>&nbsp;&nbsp;&nbsp;&nbsp;
    



	  <?php include('menu.php');?>			  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>Num De Facture</th>
            <th>Date De Creation</th>
            <th> Nom De Client</th>
            <th>Totale De Facture</th>
            <th>Imprimer</th>
            <th>Modifier</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php		
		$invoiceList = $invoice->getInvoiceList();
        foreach($invoiceList as $invoiceDetails){
			$invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
            echo '
              <tr >
                <td>'.$invoiceDetails["order_id"].'</td>
                <td>'.$invoiceDate.'</td>
                <td>'.$invoiceDetails["order_receiver_name"].'</td>
                <td>'.$invoiceDetails["order_total_after_tax"].'</td>
                <td><a href="print_invoice.php?invoice_id='.$invoiceDetails["order_id"].'" title="Print Invoice"><span class="glyphicon glyphicon-print"></span></a></td>
                <td><a href="edit_invoice.php?update_id='.$invoiceDetails["order_id"].'"  title="Edit Invoice"><span class="glyphicon glyphicon-edit"></span></a></td>
                <td><a href="#" id="'.$invoiceDetails["order_id"].'" class="deleteInvoice"  title="Delete Invoice"><span class="glyphicon glyphicon-remove"></span></a></td>
              </tr>
            ';
        }       
        ?>
                </tbody>

      </table>	
</div>	
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php include('inc/footer.php');?>