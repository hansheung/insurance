<?php 
    $title = "CheckOut";

    $cert_num = $_POST['cert_num'];
    $policy_id = $_POST['policy_id'];
    $premium = $_POST['premium'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InsurHans | Payment Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>
<body class="bg-light">
<div class="container w-50">
  <h1 class="mt-3 mb-4 fw-bold">Payment summary</h1>
  <div class="card shadow">
    <div class="card-body">
      <h5 class="card-title">Total amount payable</h5>
      <h1 class="card-text text-danger fw-bold"><span class="h4">$ </span><?php echo number_format($premium, 2, '.', ',') ?></h1>
    </div>
  </div>
  <!-- /.card -->
  <h5 class="mt-5 mb-4 fw-bold">Payment method</h5>
  <div class="card shadow">
    <div class="card-body pb-0">
      <h5><i class="fa-regular fa-credit-card pr-4"></i>Visa or Mastercard</h5>
    </div>
    <hr>
    <div class="card-body d-flex justify-content-between pt-0 pb-0">
      <h5><span><img src="../../dist/img/credit/visa.svg" alt="" width="70px" height="60px"></span></h5>
      <input class="" type="radio" name="paymentRadio" id="paymentRadio1">
    </div>
    <hr>
    <div class="card-body d-flex justify-content-between pt-0 pb-0">
      <h5><span><img src="../../dist/img/credit/mastercard.svg" alt="" width="70px" height="60px"></span></h5>
      <input class="" type="radio" name="paymentRadio" id="paymentRadio1">
    </div>
  </div>

  <div class="card shadow">
    <div class="card-body pb-0">
      <h5><i class="fa-solid fa-building-columns pr-4"></i>Online Banking</h5>
    </div>
    <hr>
    <div class="card-body d-flex justify-content-between">
      <h5><span><img src="../../dist/img/credit/fpx.png" alt="" width="70px"></span></h5>
      <input class="" type="radio" name="paymentRadio" id="paymentRadio1">
    </div>
  </div>

  <div class="card shadow">
    <div class="card-body pb-0">
      <h5><i class="fa-solid fa-wallet pr-4"></i>E-wallet</h5>
    </div>
    <hr>
    <div class="card-body d-flex justify-content-between py-0">
      <h5><span><img src="../../dist/img/credit/boost.png" alt="" width="70px"></span></h5>
      <input class="" type="radio" name="paymentRadio" id="paymentRadio1">
    </div>
    <hr>
    <div class="card-body d-flex justify-content-between pb-3 pt-0">
      <h5><span><img src="../../dist/img/credit/touchNgo.png" alt="" width="60px"></span></h5>
      <input class="" type="radio" name="paymentRadio" id="paymentRadio1">
    </div>
  </div>
  
</div>
<footer class="footer">
    <div class="container w-50">
      <div class="row">
        <div class="col-4"></div>
        <div class="col-5">
          <p class="mb-0">Total payable amount</p>
          <div class="text-danger"><span class="h4">$</span><span class="h1"> <?php echo number_format($premium, 2, '.', ',') ?></span></div>
        </div>
        <div class="col-3">
          <form method="POST" action="../../controllers/checkout/checkout.php">
            <input type="hidden" name="premium" value="<?php echo $premium ?>" />
            <input type="hidden" name="cert_num" value="<?php echo $cert_num ?>" />
            <input type="hidden" name="policy_id" value="<?php echo $policy_id ?>" />
            <button type="submit" class="btn btn-primary rounded-pill p-2 mt-3" style="width: 100%; margin-top: auto;">CONFIRM</button>
          </form>
          
        </div>
      </div>
    </div>
</footer>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
