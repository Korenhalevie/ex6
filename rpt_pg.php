<?php
include 'db.php';
include 'config.php';

session_start();

if ($connection === false && !empty($_POST['type'])) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $type = $_POST["type"];
    $desc = $_POST["desc"];
    $user_id = $_SESSION["user_id"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    if($latitude == NULL || $longitude==NULL){$latitude =32.0899;$longitude= 34.8032;}
    
    $query  = "INSERT INTO tbl_dirt_215 (`type`, `desc`, `reported_user` , `longitude` , `latitude`) VALUES ('$type', '$desc', '$user_id','$longitude','$latitude')";
    
    if (mysqli_query($connection, $query)) {
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
mysqli_close($connection);

if (!isset($_SESSION['user_id'])) {
    header('Location:'. URL .'index.php');}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="favicon.icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Quicksand&family=Ubuntu&display=swap"
        rel="stylesheet">

</head>

<body>
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
                        <li><a class="menu__item" href="#">Report a dirt</a></li>
                        <li><a class="menu__item" href="dirt_list.php">Start clean</a></li>
                        <li><a class="menu__item" href="dirt_list.php">Dirt list</a></li>
                    </ul>
                </div>
            </div>
            <a href="main.php">
                <div class="header-logo" href="#"></div>
            </a>

            <!-- NAVIGATION MENUS -->

            <!-- Desktop Menu -->
            <div class="menu">
                <ul>
                    <li><a href="main.php">Home</a></li>
                    <li><a href="#">Report a dirt</a></li>
                    <li><a href="dirt_list.php">Start cleaning</a></li>
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
                        <a class="dropdown-item" href="settings.php">Settings</a>
                        <a class="dropdown-item" href="settings.php">Profile</a>
                        <a class="dropdown-item" href="logout.php">Log out</a>
                    </div>
                </div>
            </section>
        </div>

    </header>
    <main id="rpt-pg">


        <div class="main-img">
            <h2>There is a dirt around you? </h2>
            <h4>Report now and one of our users will clean it soon!</h4>
            <button class="img-btn">Report</button>
        </div>
        <section class="color-bar"></section>
        <section class="main-art" id="rpt">
            <article>
                <h1>Report section</h1>
                <h3>Help us keep the environment clean by reporting a dirt around you.</h3>
                <div class="main-sectors">
                    <div class="explain-sect" id="report-sect">
                        <form class="container " action="#" method="POST" enctype="multipart/form-data" name="newdirt">
                            <div class="mb-3" id="share-btns">
                                <button type="button" class="btn btn-primary" onclick="getPosition()">Share
                                    location</button>
                                <input type="hidden" name='longitude' id="longitude">
                                <input type="hidden" name='latitude' id="latitude" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Type:
                                </label>
                                <select name="type">
                                    <option selected="" disabled value="other">Open this select menu</option>
                                    <option value="Textile">Textile</option>
                                    <option value="Paper">Paper</option>
                                    <option value="Organic">Organic</option>
                                    <option value="Metal">Metal</option>
                                    <option value="Plastic">Plastic</option>
                                    <option value="Hazardous">Hazardous</option>
                                    <option value="Glass">Glass</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Spot
                                    description:</label>
                                <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"
                                    required></textarea>
                            </div>
                            <button class="img-btn" type="submit" name="submit">report a dirt</button>
                        </form>
                    </div>
                    <div class="explain-sect" id="map-sect">
                        <div id="map"
                            style="position: relative; overflow: hidden;margin: 10px auto;border-radius: 15px;"></div>
                    </div>
                </div>

            </article>

        </section>
    </main>
    <footer class="footdiv">
        <hr />
        <div class="footer-icons">
            <div>© 2022 Shahar Ariel & Koren Halevie. All rights reserved</div>
            <div class="icons">
                <a href="https://www.linkedin.com/groups/12685438/"><img class="footers-logo"
                        src="images/linkedin-logo.png" /></a>
                <a href="https://www.facebook.com/Track-it-Green-108974095213560/"><img class="footers-logo"
                        src="images/facebook-logo.png" /></a>
                <a href="https://www.instagram.com/trackitgreen/"><img class="footers-logo"
                        src="images/instagram-logo.png" /></a>
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
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoQi_3yRacIm2CKsM0KQuc2NT2wBvhRrU&callback=mapReady">
    </script>
</body>

</html>