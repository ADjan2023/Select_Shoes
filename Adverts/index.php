<!doctype html>
	<html lang="en">
	<head>
		<title>Post Advert</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body class="img js-fullheight" style="background-color: black;">
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">

				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
							<h3 class="mb-4 text-center">Add Advert</h3>

							</div>
							<form action="../actions/addadvert.php" id="advertpost" class="signin-form" method="POST"  enctype="multipart/form-data">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Company Name" name="cname" required>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Company Email" name="cemail" id="cemail" onkeyup="myFunction()" required>
								</div>
								<div class="form-group">
									<input type="file" class="form-control" placeholder="Company Logo" name="image[]" required accept="image/*">
								</div>
								<div class="form-group">
									
									<textarea  class="form-control" placeholder="Company Description" name="desc" required></textarea>
								</div>
								

							</form>
							<form id="paymentForm">
                <div class="field padding-bottom--24">
                   <input type="hidden" id="email" required />
                    <input type="hidden" id="amount" value="0.5" required />
                  
                  <div class="form-group">
									<button type="submit" name="add" class="form-control btn btn-primary submit px-3" onclick="payWithPaystack()">Pay GHS 100 To Submit Advert</button>
								</div>
                </div>
              </form>
						
							<p class="w-100 text-center">Go back to <a href="../index.php">Home</a> </p>
						</div>
					</div>
				</div>
			</section>

			<script src="../js/jquery.min.js"></script>
			<script src="../js/popper.js"></script>
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/main.js"></script>
			<script>
      
    // Here the value is stored in new variable x 
    function myFunction() {
        var x = document.getElementById("cemail").value;
        document.getElementById("email").value = x;
    };
    const paymentForm = document.getElementById('paymentForm');
  paymentForm.addEventListener("submit", payWithPaystack, false);

  // PAYMENT FUNCTION
  function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd', // Replace with your public key
    email: document.getElementById("email").value,
    amount: document.getElementById("amount").value * 100,
    currency:'GHS',
     ref: ''+Math.floor((Math.random() * 1000000000) + 1),
    onClose: function(){
    alert('Window closed.');
    },
    callback: function(response){
          
            $.ajax({
              url:"../actions/process.php?reference="+ response.reference,
              method:'GET',
              success: function (response){
                document.getElementById("advertpost").submit();
              }

            });
    }
  });
  handler.openIframe();
}
    </script>
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		</body>
		</html>

