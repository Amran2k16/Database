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

  <body>
    <div class="container-fluid h-100 background-img">
      <div class="row justify-content-center align-content-center h-100">
        <div class="col-4 align-self-center">
          <form>
            <div class="row p-5 login-background">
              <form action="includes/login.inc.php" method="post">
                <h4 class="text-light">Login Now</h4>
                <input
                  type="text"
                  class="form-control mb-2"
                  name="mailuid"
                  placeholder="Username"
                />
                <input
                  type="password"
                  class="form-control"
                  name="pwd"
                  placeholder="Password"
                />
                <button type="submit" name="login-submit">Log In</button>
              </form>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--
      <form>
          <div class="row mx-auto">
              <h4 class="">Login Now</h4>
              <input type="text" class="form-control mb-2" placeholder="Username">
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              <a href="index.html">
                  <button type="button" class="btn btn-primary align-self-end mt-2 button-success">Log
                      In</button>
              </a>

          </div>
      </form>
    -->

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
