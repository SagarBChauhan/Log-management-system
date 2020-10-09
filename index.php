<?PHP 
require_once './Connection.php';
ob_start();
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Log </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
      
      <?php
        if(isset($_POST['btn_Login']))
        {
            $user=$_POST['username'];
            $query_Select="select UserType from tbl_user_master where Username='".$_POST['username']."' and Password='".$_POST['pass']."';";
            $result= mysqli_query($con, $query_Select);
            while ($row= $result->fetch_assoc())
            {
                $Utype=$row['UserType'];
                echo $Utype;
            }
            if (isset($Utype))
            {
                echo 'Login';
                if($Utype=="HOD")
                {
                    $_SESSION['username']=$user;
                    $_SESSION['usertype']=$Utype;
                    header("Location:Hod.php");
                }
                elseif ($Utype=="Guide") 
                {
                    $_SESSION['username']=$user;
                    $_SESSION['usertype']=$Utype;
                    header("Location:Guide.php");
                }
                elseif ($Utype=="Sudent") 
                {
                    $_SESSION['username']=$user;
                    $_SESSION['usertype']=$Utype;
                    header("Location:Student.php");
                }
            }
            else {
                echo 'No user found';
            }
            
        }
      ?>
      <form action="" method="Post">
          <div class="mx-auto mt-5" style="width: 200px;">
          <div class="card" style="width: 18rem;" >
              <img src="img/index.png" class="card-img-top img-thumbnail rounded-circle" alt="...">
            <div class="card-body">
            <div class="Row ">
                <div class="col-md-12">
                    <input type="text" name="username" value="" placeholder="UserName" required/>
                </div>
            </div>
            <div class="Row">
                <div class="col-md-12">
                    <input type="password" name="pass" value="" placeholder="Password" required/>
                </div>
            </div>
            <div class="Row">
                <div class="col-md-12">
                      <input type="submit" value="Login" name="btn_Login"/>
                </div>
            </div>
            </div>
          </div>
          </div>
      </form>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php
ob_flush();
?>