<?php
session_start();
ini_set('display_errors', 0);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Whatsapp Sender</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>


  <div class="container col-lg-6 col-md-8 col-12">
  <div class="card my-5">
  <div class="bg-light py-2 h3 text-center">
  <img src="logo.png" class="img-fluid" width="200px" height="auto" alt="Whatsapp Sender">
  </div>
  <div class="card-body">
   <form method="POST" class="row g-3">

<hr class="mt-2">
  <!-- Name Section -->
  <h5 class="p-2" style="background-color:#f2f2f2;"><b>Whatsapp Sender: </b></h5>
 <!-- Salutation input -->
 <div class="col-md-4">
    <label for="Country Code" class="form-label">Country Code<sub>(Without +)</sub></label>
    <input type="text" class="form-control" placeholder="Country Code" name="code"  id="code" required>
  </div>
 
  <div class="col-md-8">
    <label for="Number" class="form-label required">Whatsapp Number</label>
    <input type="number" class="form-control" placeholder="Number" name="number"  id="number" required>
  </div>

  <div class="form-floating pt-2">
                <textarea class="form-control" placeholder="Enter Message Here" id="msg" name="msg" id="floatingTextarea2" style="height: 80px"></textarea>
                <label for="floatingTextarea2">Message</label>
              </div>
   
            
<div class="d-flex justify-content-center" >
  <button type="reset" class="btn btn-danger px-4 mx-2 btn-block mt-4 mb-4">Reset</button>
  <button name="submit" type="submit" onclick="genmsg()" class="btn btn-primary px-4 mx-2  btn-block mt-4 mb-4">Genrate</button>
  <!-- <button class="btn btn-primary px-4 mx-2  btn-block mt-4 mb-4" >Genrate</button> -->
</div>



</form>

<?php

 include 'dbcon.php';



 if (isset($_POST['submit'])) {
    $code= $_POST['code'];
    $number = $_POST['number'];
    $msg = $_POST['msg'];


    $insertq =" INSERT INTO app (code, conumber, msg) VALUES ('$code','$number','$msg')" ; 
 
    $result = mysqli_query($con , $insertq);
 }
 $string = str_replace(' ', '%20', $msg);
 $data = 'https://wa.me/'.$code.$number.'?text='.$string;

 ?>


<div class="card-body">

  <div class="row align-items-center">
    <div class="col-8 ">
<input type="text" class="form-control" value="<?php echo $data; ?>" id="myInput">
</div>
    <div class="col-4">
<button onclick="myFunction()" id="copybtn" class="btn btn-warning px-4 mx-2 btn-block mt-4 mb-4">Copy Link</button>

</div>

<button  id="urlopen" class="btn btn-info px-4 mx-2 btn-block mt-4 mb-4">Send message</button>


</div>
</div>
  </div>
</div>

<script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Chnage button name after clicked
  document.getElementById("copybtn").innerHTML="Copied!";

}
</script>

<!-- Boostrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>