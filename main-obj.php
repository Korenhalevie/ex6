<?php
include 'db.php';
include 'config.php';

session_start();
$dirtID = $_GET["dirtId"];
    //checks if obj exists:
    $query  = "SELECT * FROM tbl_dirt_215 WHERE id =" . $dirtID;
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    if($row['id']==NULL)
    {
        header("Location: " . "dirt_list.php");
    }
    //checks if user loged in
if (!isset($_SESSION['user_id'])) {
    header('Location:'. URL .'index.php');
    }
    //checks for delete main obj
    if(isset($_POST['submit'])){
        $query = "DELETE FROM tbl_dirt_215 WHERE id =" .  $dirtID ; 
        if (mysqli_query($connection, $query)) {
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        header("Location: " . "dirt_list.php ");
    }
    //check for edit
    if(isset($_POST["edit"])){
        header('Location: '.'obj_edit.php?dirtId='.$dirtID);
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

    <title>
        Track It Green
    </title>
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
                        <li><a class="menu__item" href="dirt_list.php">Start clean</a></li>
                        <li><a class="menu__item" href="dirt_list.php">Dirt list</a></li>
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
                    <li><a href="rpt_pg.php">Report a dirt</a></li>
                    <li><a href="#">Start cleaning</a></li>
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
    <!-- MAIN START -->
    <main>
        <!-- LOGO -->

        <div class="main-img" id="main-ob">
            <h2>We can make the nature cleaner</h2>
            <h4>Help us to track it green</h4>
            <a class="img-btn" href="dirt_list.php">view dirt list</a>
        </div>
        <section class="color-bar"></section>

        <!-- Report Section -->
        <section class="main-art main-ob" id="main-obj">
            <article>
                <?php
                echo "<h1>" . $row["type"] . "</h1>";
                echo $row["latitude"] . " " . $row["longitude"];
                echo "<h6>" . $row["date"] . "</h6>";
                echo "<p>" . $row["desc"] . "</p>";
                echo '<div class="container" id="share-btns">';
                if ($row["reported_user"] == $_SESSION["user_id"]) {
                    echo '<form class=" clean-b" action="#" method="post" enctype="multipart/form-data"
                    name="edit">
                    <input type="hidden" value="1"></input>
                    <button class="btn btn-primary mr-3 img-btn" type="submit" name="edit">edit</button>
                    </form>';
                }
                echo '<button type="button" class="btn btn-primary" id="vw-lc" onclick="ShowDiv(),initMap(' . $row["latitude"]
                        . ',' . $row["longitude"] . ')">View location</button>' ;
                echo '<form class="clean-b" action="#" method="post" enctype="multipart/form-data" name="clean">
                    <input type="hidden" value="1"></input>
                    <button class="btn btn-primary mr-3 img-btn" type="submit" name="submit" id="cln-btn">clean</button>
                </form>';
                     
                        echo'</div>';
                        echo '<div class="explain-sect" id="main-obj-map">
                            <div id="map"
                                style="position: relative; overflow: hidden;margin: 10px auto;border-radius: 15px;">
                            </div>
                        </div>';
                        ?>


            </article>
        </section>

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
    <!--  bootstrap & js  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=KEY&callback=mapReady">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html>

<?php
mysqli_close($connection)
;