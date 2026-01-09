<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Payment Response - TheDigiCoders</title>
		<?php include('include/headerlinks.php') ?>
		<style>
			.btn:hover{
		    background-color: #f7b205; 
			color: #000;
			}
		</style>
	</head>
	
	<body>
		<div>
			<center>
				<div class="card mt-5" style="width: 18rem;">
					<div class="card-body">
						<p class="card-text">Payment Failed. If you want to payment Please Click to Proceed..</p>
						<a href="<?= $payment_url ?>" class="btn btn-primary">Proceed</a>
					</div>
				</div>
			</center>
			
			<!-- @ViewBag.postData -->
		</div>
		<?php include('include/jslinks.php') ?>
	</body>
	
</html>