<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review System Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar w-75 m-auto navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">RestroRating.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register here</a>
      </li>
    
    </ul>
    <form method="POST"  action="search.php">
          <div class="form-group row">
            <div class="col-xs-3">
              <input class="form-control input-lg" id="ex2" type="text" name="search" placeholder="search">
            </div>
            <div class="col">
              <button type="submit" name="submit" class="btn btn-dark btn">Search</button>
            </div>
          </div>
          </form>
  </div>
</nav>
   
    <div class="bg-info w-75 my-4 mx-auto py-4">
        <h2 class="text-center">Registration</h2>
        <div class="container text-center">
            <form action="signupProcess.php" method="POST" enctype="multipart/form-data">
                <!-- enctype attribute indicates database ma text ani diff format data(ie.image) post cha-->
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="username" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" name="password" placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" name="cpassword" placeholder="Confrim your password" required>
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control w-50 m-auto" name="image">
                </div>
                <button type="submit" class="btn btn-dark my-4">Register</button>
                <p>Already have an account?<a href="./index.php" class="text-white">Review here</a></p>
            </form>
        </div>
    </div>
    
</body>
