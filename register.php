<?php
include 'db.php';
include 'config.php';


if ($connection === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}



if (isset($_POST['submit'])) {
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM tbl_users_215 WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    if (!empty($row["email"])) {
        $message = "Email already exists";
    } else {
        $query  = "INSERT INTO tbl_users_215 (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";

        if (mysqli_query($connection, $query)) {
            header("Location: index.php");
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
}
mysqli_close($connection);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
    <title>registration</title>
</head>

<body>
    <section class="vh-100" id="registration">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form action="#" method="POST" class="mx-1 mx-md-4">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control"
                                                    name="fullname" required />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" class="form-control"
                                                    name="email" required />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" name="password"
                                                    class="form-control" required />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>
                                        <div class="error-message"><?php if (isset($message)) { echo $message;} ?></div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg"
                                                name="submit">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div id="reg-logo"
                                    class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <a class="logo-link" href="/index.php">
                                        <img src="images/TIG-logo.png" class="img-fluid" alt="Sample image">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footdiv">
        <hr />
        <div class="footer-icons">
            <div>© 2022 Shahar Ariel & Koren Halevie. All rights reserved</div>
            <div class="icons">
                <a href="https://www.linkedin.com/groups/12685438/"><img class="footers-logo" src="images/linkedin-logo.png" alt="" /></a>
                <a href="https://www.facebook.com/Track-it-Green-108974095213560/"><img class="footers-logo"
                        src="images/facebook-logo.png" alt="" /></a>
                <a href="https://www.instagram.com/trackitgreen/"><img class="footers-logo"
                        src="images/instagram-logo.png" alt="" /></a>
            </div>
        </div>
    </footer>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>

</html>