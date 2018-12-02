<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <title>Student Information</title>
  </head>

  <body >
    <div class="container-fluid h-100 background-img">
      <div class="row justify-content-center align-content-center h-100">
        <div class="col-4 align-self-center">
          <div class="card">
            <div class="card-body">
                <nav>
                  <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Log In</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Sign Up</a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <!-- Log In -->
                    <form class="mt-2" action="includes/login.inc.php" method="post">
                      <div class="row justify-content-end">
                        <div class="col">
                          <input type="text" name="username" class="form-control" placeholder="Username" >
                          <input type="password" name="password" class="form-control mt-2" placeholder="Password">
                          <button type="submit" name="login-submit" class="btn btn-primary mt-2 align-self-end">Sign in</button>
                        </div>
                      </div>
                    </form>
                   
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel"  aria-labelledby="nav-profile-tab">
                    <!-- Sign Up -->
                    <form class="mt-2" action="includes/signup.inc.php" method="post">
                      <div class="row">
                        <div class="col">
                          <input type="text" class="form-control" name="uid" placeholder="Username">
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col">
                        <input type="text" class="form-control" name="email" placeholder="Email"> 
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col">
                          <input type="text" class="form-control" name="firstname" placeholder="First Name">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col">
                          <select name="courseselect"class="form-control" id="exampleFormControlSelect1">
                            <option value="">Select the course you are enrolled in</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Neuroscience">Neuroscience</option>
                            <option value="Finance and Accounting">Finance and Accounting</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Law">Law</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col">
                          <input type="password" class="form-control" name="pwd" placeholder="password">
                        </div>
                        <div class="col">
                          <input type="password" class="form-control" name="pwd-repeat" placeholder="repeat Password">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary mt-2 align-self-end" name="signup-submit">Sign Up</button>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="path-to-javascript-file.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
