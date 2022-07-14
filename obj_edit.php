<?php
include 'db.php';
include 'config.php';

session_start();
$dirtID = $_GET["dirtId"];
//checks if obj exists:
$query  = "SELECT * FROM tbl_dirt_215 WHERE id =" . $dirtID;
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
if ($row['id'] == NULL) {
    header("Location: " . "dirt_list.php");
}
//checks if user loged in
if (!isset($_SESSION['user_id'])) {
    header('Location:'. URL .'index.php');
}
if(isset($_POST["submit"])){
    $newType = $_POST["type"];
    $desc = $_POST["desc"];
    if($newType == NULL){
        $newType = $row["type"];
    }
    if($desc==NULL){
        $desc = $row["desc"];
    }
    $query = "UPDATE tbl_dirt_215 SET `type` = '$newType' , `desc` = '$desc' WHERE (`id` = $dirtID)";
    if (mysqli_query($connection, $query)) { 
       header("Location: "."dirt_list.php");
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
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
    <link rel="icon" href="favicon.icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Quicksand&family=Ubuntu&display=swap"
        rel="stylesheet">

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

    <!-- MAIN START -->
    <main class="lylw-ptrn">
        <!-- LOGO -->
        <div class="spacing"></div>

        <form action="#" method="POST" class="wrapper brn-ptrn mt-sm-5">
            <h4 class="pb-4 border-bottom">Dirt Information</h4>

            <div class="py-2">
                <div class="row py-2">
                    <div class="col-md-6">
                        <label for="Obj type">Type:</label>
                        <select name="type">
                            <option selected="" disabled value="<?php $row["type"]?>"><?php echo $row["type"]; ?>
                            </option>

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
                </div>

                <div class="row py-2">
                    <div class="col-md-6">
                        <label for="exampleFormControlTextarea1" class="form-label">Spot description:</label>
                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1"
                            placeholder="<?php echo $row["desc"]; ?>" rows="3"></textarea>
                    </div>
                </div>
                <div class="error-message"><?php if (isset($message)) {
                                                echo $message;
                                            } ?></div>
                <div class="py-3 pb-4 border-bottom">
                    <button class="btn btn-primary mr-3" type="submit" name="submit">Save Changes</button>
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