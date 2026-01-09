<!DOCTYPE html>
<html lang="en">
<head>
<title>Send Mail - TheDigiCoders</title>
<?php include('include/headerlinks.php') ?>

</head>
<body>
<?php include('include/header.php') ?>


<input type="hidden" id="ErrorMsg" value="@ViewBag.ErrorMsg" />
<div id="ShowErrorMsg"></div>
@if (ViewBag.ErrorMsg != null && !string.IsNullOrEmpty(ViewBag.ErrorMsg))
{@ViewBag.ErrorMsg}

else
{ <h1>Mail Sent Successfully</h1>}


<script>
    $(document).ready(function () {
        var errorMsg = JSON.stringify($('#ErrorMsg').val(), undefined, 2);
        $('#ShowErrorMsg').html(errorMsg);
        //document.getElementById("#ErrorMsg").textContent = JSON.stringify(data, undefined, 2);

    });
</script>




<?php include('include/footer.php') ?>
<?php include('include/jslinks.php') ?>
</body>
</html>