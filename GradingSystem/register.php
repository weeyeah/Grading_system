
<?php

require_once('config/conn.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $checkQuery = "SELECT * FROM `users` WHERE `username` = '$uname'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$uname', '$password')";
        $result = $conn->query($sql);

        if ($result) {
            header('location: login.php');
        } else {
            echo "There was a problem creating an account";
        }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
      <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <h1 class="text-center my-3">Grading System</h1>
              <h3 class="text-center my-3">Register New Account</h3>
              <form action="" method="POST">
                <div class="form-group my-3">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username">
                </div>
                 <div class="form-group my-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
                 <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-outline-primary my-3">Create Account</button>
                    <a href="login.php">Login your account here</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>