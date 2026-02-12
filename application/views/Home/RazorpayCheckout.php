<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay with Razorpay</title>
</head>

<body>
    <button id="rzp-button1" style="display:none;">Pay</button>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "<?= $_GET['key_id'] ?>", // Enter the Key ID generated from the Dashboard
            "amount": "<?= $_GET['amount'] ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "DigiCoders Technologies",
            "description": "<?= $_GET['description'] ?>",
            "image": "https://thedigicoders.com/assets/images/logo.png",
            "order_id": "<?= $_GET['order_id'] ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function (response) {
                // alert(response.razorpay_payment_id);
                // alert(response.razorpay_order_id);
                // alert(response.razorpay_signature)

                // Redirect to callback URL with parameters
                var callbackUrl = "<?= $_GET['callback_url'] ?>";
                // Replace placeholders if any (though we used simple GET params in library)
                // But here we need to append the response details

                // Check if callback already has query params
                var separator = callbackUrl.indexOf('?') !== -1 ? '&' : '?';

                window.location.href = callbackUrl + separator +
                    "razorpay_payment_id=" + response.razorpay_payment_id +
                    "&razorpay_order_id=" + response.razorpay_order_id +
                    "&razorpay_signature=" + response.razorpay_signature;
            },
            "prefill": {
                "name": "<?= $_GET['name'] ?>",
                "email": "<?= $_GET['email'] ?>",
                "contact": "<?= $_GET['contact'] ?>"
            },
            "notes": {
                "address": "DigiCoders Official"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function (response) {
            alert("Payment Failed: " + response.error.description);
        });

        // Automatically click the button to open checkout
        window.onload = function () {
            rzp1.open();
        };
    </script>
</body>

</html>