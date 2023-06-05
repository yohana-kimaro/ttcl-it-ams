<?php 
require_once('../class/StaffDetails.php');
require_once('../class/Toner.php');
date_default_timezone_set("Africa/Dar_es_salaam");

$staff_det = $staff_details->all_staff_details();
$toner_models = $toner->all_toner_models();
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tonerCModel').on('change',function(){
			var tonerModelID = $(this).val();
			if(tonerModelID){
				$.ajax({
					type:'POST',
					url:'tonerCartidgeAjax.php',
					data:'tonermodel_id='+tonerModelID,
					success:function(html){
						$('#tonerQuantity').html(html);
					}
				}); 
			}else{
				$('#tonerQuantity').html('<option value="">Select toner model first</option>');
			}
		});
	});
</script>


<div>
	<form method="post" id="tonnerRequestForm">
		<h6 class="form-group">1. Applicant Details</h6>
		<?php foreach($staff_det as $t11): ?>
			<div class="row">
				<div class="col-md-4 form-group">
					<label for="firstName">First name</label>
					<input class="form-control" id="tonerFirstName" name="tonerFirstName" type="text" value="<?= $t11['firstName']; ?>" readonly>
				</div>
				<div class="col-md-4 form-group">
					<label for="middleName">Middle name</label>
					<input class="form-control" id="tonerMiddleName" name="tonerMiddleName" type="text" value="<?= $t11['middleName']; ?>" readonly>
				</div>			
				<div class="col-md-4 form-group">
					<label for="lastName">Last name</label>
					<input class="form-control" id="tonerLastName" name="tonerLastName" type="text" value="<?= $t11['lastName']; ?>" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 form-group">
					<label for="firstName">Staff PF Number</label>
					<input class="form-control" id="tonerStaffPFNo" name="tonerStaffPFNo" type="text" value="<?= $t11['pfNumber']; ?>" readonly>
				</div>
				<div class="col-md-4 form-group">
					<label for="middleName">Designation</label>
					<input class="form-control" id="tonerStaffDesignation" name="tonerStaffDesignation" type="text" value="<?= $t11['Designation']; ?>" readonly>
				</div>			
				<div class="col-md-4 form-group">
					<label for="lastName">Department</label>
					<input class="form-control" id="tonerStaffDepartment" name="tonerStaffDepartment" type="text" value="<?= $t11['Department']; ?>" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 form-group">
					<label for="firstName">Office Location</label>
					<input class="form-control" id="tonerStaffOfficeBuilding" name="tonerStaffOfficeBuilding" type="text" value="<?= $t11['Location']; ?>" readonly>
				</div>
				<div class="col-md-4 form-group">
					<label for="middleName">Region</label>
					<input class="form-control" id="tonerStaffRegion" name="tonerStaffRegion" type="text" value="<?= $t11['Region']; ?>" readonly>
				</div>			
				<div class="col-md-4 form-group">
					<label for="lastName">Direct Manager</label>
					<input class="form-control" id="tonerStaffDirectManager" name="tonerStaffDirectManager" type="text" value="<?= $t11['directManager']; ?>" readonly>
				</div>
			</div>
		<?php endforeach; ?>

		<h6 class="form-group mt-4">2. Toner Cartridge Details</h6>
		<div class="row">
			<div class="form-group col-md-5 mb-10">
				<label for="country">Toner Model</label>
				<select class="form-control custom-select d-block w-100" name="tonerCModel" id="tonerCModel" required>
					<option value="">Choose...</option>
					<?php foreach($toner_models as $t1): ?>
						<option value="<?= $t1['tonerModel']; ?>"><?= $t1['tonerModel']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-4 mb-10">
				<label for="state">Quantity</label>
				<select class="form-control custom-select d-block w-100" id="tonerQuantity" name="tonerQuantity" required>
					<option value="">Choose toner model first</option>
				</select>
			</div>
		</div>
		<input type="hidden" class="form-control" id="tonerAppliedOn" name="tonerAppliedOn" value="<?= date('d-m-Y H:i:s');?>" readonly>
		<hr>
		<div class="text-right">
			<button class="btn btn-dark" type="submit" name="tonerSubmitRequest" id="tonerSubmitRequest" value="addtonerreq">Submit</button>
		</div>
	</form>
</div>

<script src="dist/js/jquery.validate.min.js"></script>
<script src="dist/js/toner-requests.js"></script>