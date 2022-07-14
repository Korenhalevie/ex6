<?php
  include 'db.php';
  include 'config.php';

  session_start();

  if(!isset($_SESSION['user_id'])) {
    header('Location: ' . URL . 'index.php');
  }
  $json = file_get_contents("data/carousel.json");
  $json = json_decode($json);
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
                        <li><a class="menu__item" href="#">Home</a></li>
                        <li><a class="menu__item" href="rpt_pg.php">Report a dirt</a></li>
                        <li><a class="menu__item" href="dirt_list.php">Start clean</a></li>
                        <li><a class="menu__item" href="dirt_list.php">Dirt list</a></li>
                    </ul>
                </div>
            </div>
            <a href="#">
                <div class="header-logo"></div>
            </a>

            <!-- NAVIGATION MENUS -->

            <!-- Desktop Menu -->
            <div class="menu">
                <ul>
                    <li><a href="#">Home</a></li>
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
    <main>
        <!-- LOGO -->

        <div class="main-img" id="main">
            <h2>We can make the nature cleaner</h2>
            <h4>Help us to track it green</h4>
            <a class="img-btn" href="dirt_list.php">view dirt list</a>
        </div>
        <section class="color-bar"></section>

        <!-- Report Section -->
        <section class="main-art" id="rpt">
            <article>
                <h1>Report A Dirt</h1>
                <h3>Why reporting?</h3>

                <p class="explain-sect">
                    Lets picture an event, you are walking with your family, nothing better, beautiful skys, green
                    trees, and THEN
                    out of nowhere lots of garbage, what will your kids learn? that they can throw garbage on the
                    ground? but then
                    you remember about Track it green,
                    you can report garbage straight to KKL to let us know there is gabage that need cleaning and you
                    will help us!
                </p>
                <a class="img-btn" class="button" href="rpt_pg.php">report a dirt</a>
            </article>
            <div id="rprt-clean-img"></div>

        </section>

        <!-- Clean Section -->
        <section class="main-art" id="cln">
            <article>
                <h1>Start Cleaning</h1>
                <h3>Why cleaning?</h3>

                <p class="explain-sect">
                    We have all walk around in a natioal park and saw a full garbage can or snacks bags someone didnt
                    pick up,
                    here at Track it Green we take the help of everyone, together we can keep the national parks clean
                    and make
                    the country a better place. "why?" you
                    ask, well you get to help the earth and our beloved country, be cleaner but there's more! you are
                    also getting
                    points that you can use to get in paid national park for free and win prizes! Join Us to make Israel
                    cleaner.
                </p>
                <a class="img-btn" class="button" href="dirt_list.php">start clean</a>

            </article>


        </section>






        <section class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8 mx-auto">
                        <div class="p-5 bg-white shadow rounded">
                            <!-- Bootstrap carousel-->
                            <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
                                <!-- Bootstrap carousel indicators [nav] -->
                                <ol class="carousel-indicators mb-0">
                                    <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>

                                <!-- Bootstrap inner [slides]-->

                                <!-- Bootstrap inner [slides]-->
                                <div class="carousel-inner px-5 pb-4">
                                    <!-- Carousel slide-->
                                    <div class="carousel-item active">
                                        <div class="media">
                                            <img class="rounded-circle img-thumbnail" src="images/traveler-1.jpeg"
                                                alt="" width="75" height="75" />
                                            <div class="media-body ml-3">
                                                <blockquote class="blockquote border-0 p-0">
                                                    <p class="font-italic lead">
                                                        <i
                                                            class="fa fa-quote-left mr-3 text-success"></i><?php echo $json->recommends[2]->response ?>
                                                    </p>
                                                    <footer class="blockquote-footer">
                                                        <?php echo $json->recommends[2]->name ?>
                                                        <cite
                                                            title="Source Title"><?php echo $json->recommends[2]->title ?></cite>
                                                    </footer>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Carousel slide-->
                                    <div class="carousel-item">
                                        <div class="media">
                                            <img class="rounded-circle img-thumbnail" src="images/traveler-2.jpeg"
                                                alt="" width="75" height="75" />
                                            <div class="media-body ml-3">
                                                <blockquote class="blockquote border-0 p-0">
                                                    <p class="font-italic lead">
                                                        <i
                                                            class="fa fa-quote-left mr-3 text-success"></i><?php echo $json->recommends[0]->response ?>
                                                    </p>
                                                    <footer class="blockquote-footer">
                                                        <?php  echo $json->recommends[0]->name ?>
                                                        <cite
                                                            title="Source Title"><?php echo $json->recommends[0]->title ?></cite>
                                                    </footer>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Carousel slide-->
                                    <div class="carousel-item">
                                        <div class="media">
                                            <img class="rounded-circle img-thumbnail" src="images/traveler-3.jpeg"
                                                alt="" width="75" height="75" />
                                            <div class="media-body ml-3">
                                                <blockquote class="blockquote border-0 p-0">
                                                    <p class="font-italic lead">
                                                        <i
                                                            class="fa fa-quote-left mr-3 text-success"></i><?php echo $json->recommends[1]->response ?>
                                                    </p>
                                                    <footer class="blockquote-footer">
                                                        <?php echo $json->recommends[1]->name ?>
                                                        <cite
                                                            title="Source Title"><?php echo $json->recommends[1]->title ?></cite>
                                                    </footer>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bootstrap controls [dots]-->
                                <a class="carousel-control-prev width-auto" href="#carouselExampleIndicators"
                                    role="button" data-slide="prev">
                                    <i class="fa fa-angle-left text-dark text-lg"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next width-auto" href="#carouselExampleIndicators"
                                    role="button" data-slide="next">
                                    <i class="fa fa-angle-right text-dark text-lg"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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