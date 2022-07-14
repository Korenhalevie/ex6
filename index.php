<?php
include "config.php";
include 'db.php';


session_start(); // on logout session_destroy();
if(!empty($_POST["loginMail"])) {

    $query  = "SELECT * FROM tbl_users_215 WHERE email='" . $_POST["loginMail"] . "' AND password = '" . $_POST["loginPass"] . "'";

    // echo $query;

    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result);
    if(is_array($row)){
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["name"] = $row["name"];
        $_SESSION["email"] = $row["email"];
        header('Location: '.'main.php');
    }
    else{
        $message = "Invalid username or password";
    }

    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Quicksand&family=Ubuntu&display=swap"
        rel="stylesheet">
    <title>Log in</title>
</head>

<body>
    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="images/TIG-logo.png" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">We are Track It Green</h4>
                                    </div>

                                    <form form action="#" method="post" id="frm">
                                        <p>Please login to your account</p>

                                        <div class="form-outline mb-4">
                                            <input type="email" name="loginMail" id="form2Example11"
                                                class="form-control" placeholder="Email address" />
                                            <label class="form-label" for="form2Example11">Username</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example22" name="loginPass"
                                                class="form-control" />
                                            <label class="form-label" for="form2Example22">Password</label>
                                        </div>

                                        <div class="error-message"><?php if (isset($message)) { echo $message;} ?></div>
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit">Log
                                                in</button>

                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a type="button" class="btn btn-outline-danger" id="crt-btn"
                                                href="register.php">Create
                                                new</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">We are more than just a company</h4>
                                    <p class="small mb-0">We are here to track it green!
                                        <br>
                                        Log in to help us keep our favorite tracks clean. Clean or report if you see a
                                        dirt,
                                        thus keeping our environment and tracks clean.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- safsafsssssssssssssssssssssssssss -->
    <!-- <div class="container">
        <h1>Login</h1>
        <form action="#" method="post" id="frm">
            <div class="form-group">
                <label for="loginMail">Email: </label>
                <input type="email" class="form-control" name="loginMail" id="loginMail">
            </div>
            <div class="form-group">
                <label for="loginPass">Password: </label>
                <input type="pasword" class="form-control" name="loginPass" id="loginPass" placeholder="PassWord">
            </div>
            <button type="submit" class="btn btn-primary">Log me In</button>
        </form>
    </div> -->

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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
</body>


</html>