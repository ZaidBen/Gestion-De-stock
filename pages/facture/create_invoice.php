<?php 
session_start();
include('inc/header.php');
include 'Invoice.php';
$invoice = new Invoice();
if(!empty($_POST['companyName']) && $_POST['companyName']) {	
	$invoice->saveInvoice($_POST);
	header("Location:invoice_list.php");	
}
?>
<title>Facture</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('inc/container.php');?>
<div class="container content-invoice">
	<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
		<div class="load-animate animated fadeInUp">
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h2 class="title">Ajouter Une Nouvelle Facture</h2>
					<?php include('menu.php');?>	
				</div>		    		
			</div>
			<input id="currency" type="hidden" value="$">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3>De,</h3>
				 	
				</div>      		
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
					<h3>A,</h3>
					<div class="form-group">
						<input type="text" class="form-control" name="companyName" id="companyName" placeholder="Client" autocomplete="off">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="3" name="address" id="address" placeholder=" Addresse"></textarea>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr>
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							<th width="15%">Numéro d'article</th>
							<th width="38%">Nom d'article</th>
							<th width="15%">Quantité</th>
							<th width="15%">Prix</th>								
							<th width="15%">Total</th>
						</tr>							
						<tr>
							<td><input class="itemRow" type="checkbox"></td>
							<td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
							<td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>			
							<td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
							<td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
							<td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
						</tr>						
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<button class="btn btn-danger delete" id="removeRows" type="button">- Supprimer</button>
					<button class="btn btn-success" id="addRows" type="button">+ Ajouter Plus </button>
				</div>
			</div>
			<div class="row">	
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<h3>Remarques: </h3>
					<div class="form-group">
						<textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Vos Remarques"></textarea>
					</div>
					<br>
					<div class="form-group">
						<input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Enregister" class="btn btn-success submit_btn invoice-save-btm">						
					</div>
					
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<span class="form-inline">
						<div class="form-group">
							<label>Sous-Total: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">DH</div>
								<input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Sous-Total">
							</div>
						</div>
						<div class="form-group">
							<label>Taux De Tax: &nbsp;</label>
							<div class="input-group">
								<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Taux De Tax">
								<div class="input-group-addon">%</div>
							</div>
						</div>
						<div class="form-group">
							<label>Montant de Taxe: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">DH</div>
								<input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Montant de Taxe">
							</div>
						</div>							
						<div class="form-group">
							<label>Total: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">DH</div>
								<input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
							</div>
						</div>
						<div class="form-group">
							<label>Montant Payé: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">DH</div>
								<input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Montant Payé">
							</div>
						</div>
						<div class="form-group">
							<label>Montant Dû: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">DH</div>
								<input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Montant Dû">
							</div>
						</div>
					</span>
				</div>
			</div>
			<div class="clearfix"></div>		      	
		</div>
	</form>			
</div>
</div>	
<?php include('inc/footer.php');?>