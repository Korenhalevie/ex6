<?php
include 'db.php';
include 'config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location:'. URL .'index.php');
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
    <link rel="icon" href="favicon.icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Quicksand&family=Ubuntu&display=swap"
        rel="stylesheet">

    <title>Track It Green</title>
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
                        <li><a class="menu__item" href="rpt_pg.php">Report a dirt</a></li>
                        <li><a class="menu__item" href="#">Start clean</a></li>
                        <li><a class="menu__item" href="#">Dirt list</a></li>
                    </ul>
                </div>
            </div>
            <a href="main.php">
                <div class="header-logo"></div>
            </a>

            <!-- NAVIGATION MENUS -->

            <!-- Desktop Menu -->
            <div class="menu">
                <ul>
                    <li><a href="main.php">Home</a></li>
                    <li><a href="#">Report a dirt</a></li>
                    <li><a href="#">Start cleaning</a></li>
                    <li><a href="#">Dirt list</a></li>
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
    <!-- MAIN START -->
    <main class="obj">
        <div class="main-img" id="dlist">
            <h2>There is a dirt around you?</h2>
            <h4>Report now and one of our users will clean it soon!</h4>
            <a class="img-btn" class="button" href="rpt_pg.php">report a dirt</a>
        </div>
        <section class="color-bar"></section>

        <div class="table-sec">
            <section class="table-section">
                <table class="table table-striped" id="srt-tbl">
                    <thead>
                        <tr class="categories">
                            <th scope="col" class="dis-non" onclick="sortTable(1)">#</th>
                            <th scope="col" onclick="sortTable(0)">Added by</th>
                            <th scope="col" onclick="sortTable(1)">Date & Time</th>
                            <th scope="col" onclick="sortTable(2)">Type</th>
                            <th scope=" col" class="dis-non" onclick="sortTable(3)">Description</th>
                            <th scope="col">Link</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                    include "db.php";
                    // get all data from DB
                    $query  = "SELECT tbl_dirt_215.* , tbl_users_215.name FROM tbl_dirt_215 INNER JOIN tbl_users_215 ON id where tbl_dirt_215.reported_user = tbl_users_215.user_id";
                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                        die("DB query failed.");
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr class="table-row">';
                        echo        '<th scope="row" class="dis-non">' . $row["id"] . '</th>';
                        echo        '<td>' . $row["name"] . '</td>';
                        echo        '<td>' . $row["date"] . '</td>';
                        echo        '<td>' . $row["type"] . '</td>';
                        echo        '<td class="dis-non">' . $row["desc"] . '</td>';
                        echo        '<td>';
                        echo            '<a href="'. URL .'main-obj.php?dirtId='.$row["id"].'"><img class="link-icon" src="./images/link-icon.png" /></a>';
                        echo        '</td>';
                        echo    '</tr>';
                    }
                    ?>


                    </tbody>
                </table>
            </section>
        </div>
    </main>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="js/script.js"></script>
</body>

</html>


<?php
mysqli_close($connection);
?>