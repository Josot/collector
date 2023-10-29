<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Classis Car Collection</title>

    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="icon" href="../media/logo/logo2.png">
    <link rel="stylesheet" href="style-inv.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
    <main>
        <header id="header">

            <!-- NAVBAR -->
            <nav>
                <div class="container">
                    <div class="logo">
                        <a href="../"><img class="main-logo" src="../media/logo/logo2.png" alt=""></a>
                    </div>
                    <div class="links">
                        <ul>
                            <li>
                                <a href="../about-us/">About us</a>
                            </li>
                            <li>
                                <a href="../inventory/">Inventory</a>
                            </li>
                            <li>
                                <a href="../" class="active">Home</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                </div>
            </nav>
            <!-- NAVBAR -->


            <div class="header-content">
                <video class="video" src="../media/video/inventory_top.mp4" autoplay muted loop></video>

                <div class="area">
                    <div class="container grid-2">
                        <div class="column-1">
                            <h1 class="header-title" style="color: white;">Our Inventory</h1>
                            <p class="text" style="color: white;">
                            Nestled at the soul of our enterprise resides a hidden gem of motorcycle heritage,
                             painstakingly curated and safeguarded for the most discerning aficionados.
                              Our modern motorcycle assortment serves as a living tribute to the relentless innovation
                               and artistic mastery that define the world of high-performance biking.
                            </p>
                            <a href="#inventory" class="btn">Take me there!</a>
                        </div>

                        <div class="column-2 image">
                            <img class="img-logo-header" src="../media/logo/logo2.png" alt="">
                        </div>
                    </div>

                </div>

            </div>

        </header>

        <div id="inventory" class="inventory">
            <div class="container-inv">
                <!-- <div class="navbar-inventory">
                    <div class="search-bar">
                        <h1>Search Our Inventory</h1>
                        <form method="GET" action="search.php">
                            <input type="text" class="search-input" name="search" placeholder="Search by make or model">
                            <button class="search-button" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="links">
                        <ul>
                            <li>
                                <a class="active-inv" href="#inventory">Current Inventory</a>
                            </li>
                            <li>
                                <a href="../inventory/sold/#inventory">Sold Inventory</a>
                            </li>
                            <li>
                                <a href="../inventory/coming-soon/#inventory">Coming Soon?</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="mobile-link">
                        <ul>
                            <li>
                                <a href="../inventory/#inventory">Current Inventory</a>
                            </li>
                            <li>
                                <a href="../inventory/sold/#inventory">Sold Inventory</a>
                            </li>
                            <li>
                                <a href="../inventory/coming-soon/#inventory">Coming Soon?</a>
                            </li>
                        </ul>
                    </div>
                </div> -->
                
                <img src="../dbs/inventory.db" alt="">

                <div class="inventory-items">
                    <?php

                    

                    class MyDB extends SQLite3
                    {
                        function __construct()
                        {
                            $this->open('../dbs/inventory.db');
                        }
                    }


                    // selecting files
                    $sql = <<<EOF
                        SELECT * from inventory;
                    EOF;

                    $db = new MyDB();



                    // echoing table
                    $ret = $db->query($sql);
                    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {

                        if ($row['sold'] == 'true') {
                            continue;
                        }
                        if ($row['comingsoon'] == 'true') {
                            continue;
                        }
                        if ($row['reserved'] == 'yes') {
                            continue;
                        }

                        $product_id = $row['ID'];

                        echo "<projects>";
                            echo "<div class='hidden'>{$row['ID']}</div>";
                            echo "<div class='hidden'>Sold? {$row['sold']}</div>";
                            echo "<div class='hidden'>Gereserveerd? {$row['reserved']}</div>";
                            echo "<div class='hidden'>Coming: {$row['comingsoon']}</div>";
                            echo "<div class=''><h1>{$row['brand']}</h1></div>";
                            echo "<div class=''><h2>{$row['model']}</h2></div>";
                            echo "<div class=''><h3>{$row['consy']}</h3></div>";
                            echo "<div class=''>{$row['price']}</div>";
                            echo "<img class='car-img-inv' src='../media/uploads/{$row['image']}'>";
                            echo "<div class=''>Engine: {$row['engine']}</div>";
                            echo "<div class=''>Fuel: {$row['fuel']}</div>";
                            echo "<a class='active-inv' href='product_details.php?id=$product_id'>Order Now</a>";
                        echo "</projects>";
                    }

                    $db->close();

                    ?>
                </div>

            </div>
        </div>

    </main>
    <footer class="footer">
        <div class="container">
            <div class="grid-4">
                <div class="grid-4-col footer-about">
                    <h3 class="title-sm">About "Moto Garage"</h3>
                    <p class="text">
                    We are Moto Garage, we are a place of love for motorcycles since 1954, ready to give you the best deals.
                    We sell you your favourite motorcycles for a low price and buy your motorcycles aswell.
                    We are happy to be of service!
                    </p>
                </div>

                <div class="grid-4-col footer-links">
                    <h3 class="title-sm">Links</h3>
                    <ul>
                        <li>
                            <a href="./inventory/">Inventory</a>
                        </li>
                        <li>
                            <a href="./about-us/">About us</a>
                        </li>
                    </ul>
                </div>

                <div class="grid-4-col footer-links">
                    <h3 class="title-sm">What We do Here</h3>
                    <ul>
                        <li>
                            <a href="#">Sell motorcycles</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="bottom-footer">
                <div class="copyright">
                    <p class="text">
                        Copyright&copy;2023 All rights reserved by
                        <span>Moto Garage</span>
                    </p>
                </div>

                <div class="followme-wrap">
                    <div class="followme">
                        <h3>Follow Creator</h3>
                        <span class="footer-line"></span>
                        <div class="social-media">
                            <a href="https://github.com/Josot" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/joost-van-ewijk/" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="https://twitter.com/KidYeh" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>

                        </div>
                    </div>

                    <div class="back-btn-wrap">
                        <a href="#" class="back-btn">
                            <i class="fas fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="../javascript/hamburgermenu.js"></script>

</body>

</html>