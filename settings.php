<?php
  include 'db.php';
  include 'config.php';

  session_start();

  if(!isset($_SESSION['user_id'])) {
    header('Location: ' . URL . 'index.php');
  }
  $user_id = $_SESSION["user_id"];

  if(isset($_POST['delete'])){
    $query = "SELECT password from tbl_users_215 where `user_id` ="  . $_SESSION["user_id"];
    $result = mysqli_query($connection,$query);
    $pass = mysqli_fetch_array($result);
    if (($_POST["password"] == $pass["password"])){
        $query = "DELETE FROM tbl_users_215 WHERE `user_id` = $user_id";

        if (mysqli_query($connection, $query)) { 
            
            session_destroy();
            header("location: "."index.php");
            } 
        }else {
            $message = "Password is wrong, please try again.";
        }
  }

  if (isset($_POST['submit'])) {
    $newName = $_POST["fullname"];
    $newEmail = $_POST["email"];
    $password = $_POST["password"];

    if($newName == null){
        $newName = $_SESSION["name"];
    }

    if($newEmail == null){
        $newEmail = $_SESSION["email"];
    }
    
    $query = "UPDATE tbl_users_215 SET `name` = '$newName', `email` = '$newEmail', `password` = '$password' WHERE (`user_id` = '$user_id')";

    if (mysqli_query($connection, $query)) { 
       
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    $_SESSION["name"] = $newName;
    $_SESSION["email"] = $newEmail;
    $_SESSION["password"] = $password;
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://db.onlinewebfonts.com/c/629a55a7e793da068dc580d184cc0e31?family=Open+Sans" rel="stylesheet"
        type="text/css" />
    <link href="https://db.onlinewebfonts.com/c/3d326e4a3753d0f1220967bb7cbc88b7?family=Boldie" rel="stylesheet"
        type="text/css" />
    <link href="https://db.onlinewebfonts.com/c/8ae42d12ab19bced168f446cd76590ac?family=GROBOLD" rel="stylesheet"
        type="text/css" />
    <link href="https://db.onlinewebfonts.com/c/cc63ce6e304da54106961b31a1d744a9?family=Apercu" rel="stylesheet"
        type="text/css" />
    <link rel="icon" href="favicon.icon" />

    <title>
        Track It Green
    </title>
</head>

<body id="settings">
    <!-- Header -->
    <header>
        <div class="navbar">

            <!-- Mobile Menu -->
            <div id="mobile-menu">
                <div class="hamburger-menu">
                    <input id="menu__toggle" type="checkbox" />
                    <label class="menu__btn" for="menu__toggle">
                        <span></span>
                    </label>

                    <ul class="menu__box">
                        <li><a class="menu__item" href="main.php">Home</a></li>
                        <li><a class="menu__item" href="rpt_pg.php">Report a dirt</a></li>
                        <li><a class="menu__item" href="#">start clean</a></li>
                        <li><a class="menu__item" href="dirt_list.php">Dirt list</a></li>
                    </ul>
                </div>
            </div>
            <a href="/main.php">
                <div class="header-logo"></div>
            </a>

            <!-- NAVIGATION MENUS -->

            <!-- Desktop Menu -->
            <div class="menu">
                <ul>
                    <li><a href="main.php">Home</a></li>
                    <li><a href="/rpt_pg.php">Report a dirt</a></li>
                    <li><a href="">Start cleaning</a></li>
                    <li><a href="dirt_list.php">Dirt list</a></li>
                </ul>
            </div>



            <!-- PROFILE SECTION -->
            <section class="profile-section">
                <div class="dropdown">
                    <img class="profile-pic" src="images/profile-pic.jpg" alt="" />
                    <?php
          echo '<div id="profile-name">' . $_SESSION["name"] . '</div>'
          ?>
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="logout.php">Log out</a>
                    </div>
                </div>
            </section>
        </div>

    </header>

    <!-- MAIN START -->
    <main class="lylw-ptrn">
        <!-- LOGO -->
        <div class="spacing"></div>

        <form action="#" method="POST" class="wrapper brn-ptrn mt-sm-5">
            <h4 class="pb-4 border-bottom">Account settings</h4>

            <div class="py-2">
                <div class="row py-2">
                    <div class="col-md-6">
                        <label for="firstname">Full Name</label>
                        <input type="text" name="fullname" class="bg-light form-control" placeholder="<?php
          echo  $_SESSION["name"] 
          ?>">
                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-md-6">
                        <label for="email">Email Address</label>
                        <input name="email" type="email" class="bg-light form-control" placeholder="<?php
          echo  $_SESSION["email"] 
          ?>">
                    </div>
                    <div class="col-md-6 pt-md-0 pt-3">
                        <label for="Password"> Password</label>
                        <input type="password" name="password" class="bg-light form-control" placeholder="Password"
                            required>
                    </div>
                </div>
                <div class="error-message"><?php if (isset($message)) { echo $message;} ?></div>

                <div class="py-3 pb-4 border-bottom">
                    <button class="btn btn-primary mr-3" type="submit" name="submit">Save Changes</button>
                </div>
                <div class="d-sm-flex align-items-center pt-3" id="deactivate">
                    <div>
                        <b>Deactivate your account</b>
                        <p>Deactivate your account require your password</p>
                    </div>
                    <div class="ml-auto">
                        <button class="btn danger" type="submit" name="delete">Deactivate</button>
                    </div>
                </div>
            </div>
        </form>
        <footer class="footdiv">
            <hr />
            <div class="footer-icons">
                <div>© 2022 Shahar Ariel & Koren Halevie. All rights reserved</div>
                <div class="icons">
                    <a href="https://www.linkedin.com/groups/12685438/"><img class="footers-logo"
                            src="images/linkedin-logo.png" alt="" /></a>
                    <a href="https://www.facebook.com/Track-it-Green-108974095213560/"><img class="footers-logo"
                            src="images/facebook-logo.png" alt="" /></a>
                    <a href="https://www.instagram.com/trackitgreen/"><img class="footers-logo"
                            src="images/instagram-logo.png" alt="" /></a>
                </div>
            </div>
        </footer>
        <!--  bootstrap & js  -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        <script src="js/script.js"></script>
</body>

</html>

<?php 
mysqli_close($connection);
?>