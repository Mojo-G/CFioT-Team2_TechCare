<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tech Care | Login Page</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.png" alt="login" class="login-card-img">
          </div>
          
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/logo.svg" alt="logo" class="logo">
              </div>
              
              <p class="login-card-description">Patient Monitor Dashboard</p>

                    <!--Menampilkan status jika login berhasil atau salah-->
                    <script src="assets/vendor/sweetalert2.min.js"></script>
                    <link rel="stylesheet" href="assets/vendor/sweetalert2.min.css">
                    <?php
                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') 
                    {
                      ?>
                            <script>
                                Swal.fire({
                                    title   : "<?php echo $_SESSION['status_title']; ?>",
                                    icon    : "<?php echo $_SESSION['status']; ?>",
                                    text    : "<?php echo $_SESSION['status_text']; ?>",
                                    confirmButtonText: 'Ok'
                                });
                            </script>
                      <?php
                      unset($_SESSION['status']);
                    }
                    ?>
                                        <!-- END SCRIPT -->

              
              <form action="code.php" method="POST">
                  <div class="form-group">
                    <label for="text" class="sr-only">User Name / ID</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" name="login_btn" class="btn btn-block login-btn mb-4"> Log In </button>
                </form>
                
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include('include/scripts.php');
?>