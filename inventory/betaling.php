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
                                <a href="">Sell us your car!</a>
                            </li>
                            <li>
                                <a href="">About us</a>
                            </li>
                            <li>
                                <a href="../inventory/">Inventory</a>
                            </li>
                            <li>
                                <a href="">Blog</a>
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

            <?php
            class MyDB extends SQLite3
            {
                function __construct()
                {
                    $this->open('../dbs/inventory.db');
                }
            }

            $db = new MyDB();

            if (!$db) {
                die("Database connection failed: " . $db->lastErrorMsg());
            }

            // Check if the 'id' parameter is set in the URL
            if (isset($_GET['id'])) {
                $product_id = $_GET['id'];

                // Query the database to fetch product details based on the product ID
                $sql = "SELECT * FROM inventory WHERE id = $product_id";
                $result = $db->query($sql);

                if (!$result) {
                    die("Query failed: " . $db->lastErrorMsg());
                }

                $product = $result->fetchArray(SQLITE3_ASSOC);

                if ($product) {
                    // Display product details
                    echo "<div class='header-content'>";

                        echo "<div class='area'>";

                            echo "<div class='container grid-2'>";
                                echo "<div class='column-1'>";

                                echo "<img class='car-img-inv-details' src='../media/uploads/{$product['image']}' alt=''>";


                                echo "</div class='column-1'>";

                                echo "<div class='column-2 image'>";

                                echo "</div class='column-2 image'>";

                            echo "</div class=''>";

                        echo "</div class=''>";




                    echo "</header>";

                    echo "<div class='header-content'>";

                        echo "<div class='area'>";

                            echo "<div class='container grid-2'>";
                                echo "<div class='column-1'>";

                                    echo "<h1>Specifications:</h1>";

                                    echo "<ul>";
                                        echo "<il>";
                                            echo "<p>Milage: {$product['milage']}";
                                        echo "</il>";

                                        echo "<il>";
                                            echo "<p>Transmission: {$product['transmission']}";
                                        echo "</il>";

                                        echo "<il>";
                                            echo "<p>Drivetrain: {$product['drivetrain']}";
                                        echo "</il>";

                                        echo "<il>";
                                            echo "<p>Engine: {$product['engine']}";
                                        echo "</il>";

                                        echo "<il>";
                                            echo "<p>Fuel: {$product['fuel']}";
                                        echo "</il>";
                                    echo "</ul>";


                                echo "</div class='column-1'>";

                                echo "<div class='column-2 image'>";

                                    echo "<div class='information-spec'>";
                                        echo "<p>{$product['specDesc']}</p>";
                                    echo "</div>";

                                echo "</div class='column-2 image'>";


                            echo "</div class=''>";

                        echo "</div class=''>";


                    echo "</header>";




                    // Add more product details as needed
                } else {
                    echo "Product not found.";
                }
            } else {
                echo "Product ID not provided.";
            }

            // Close the database connection
            $db->close();
            ?>


    </main>
    <footer class="footer">
        <div class="container">
            <div class="grid-4">
                <div class="grid-4-col footer-about">
                    <h3 class="title-sm">About "The Classic Car Collection"</h3>
                    <p class="text">
                        Welcome to "The Classic Car Collection," where automotive nostalgia meets
                        modern technology. Our website is a digital haven for car enthusiasts,
                        designed to provide a seamless experience for those who
                        appreciate the timeless beauty of classic automobiles.
                    </p>
                </div>

                <div class="grid-4-col footer-links">
                    <h3 class="title-sm">Links</h3>
                    <ul>
                        <li>
                            <a href="#">Inventory</a>
                        </li>
                        <li>
                            <a href="#">Sell Your Classic Car!</a>
                        </li>
                        <li>
                            <a href="#">Our Blog</a>
                        </li>
                        <li>
                            <a href="#">About us</a>
                        </li>
                    </ul>
                </div>

                <div class="grid-4-col footer-links">
                    <h3 class="title-sm">What We do Here</h3>
                    <ul>
                        <li>
                            <a href="#">Sell Classic Cars</a>
                        </li>
                        <li>
                            <a href="#">Buy Classic Cars</a>
                        </li>
                        <li>
                            <a href="#">Blog about our adventures</a>
                        </li>
                        <li>
                            <a href="#">Always adding new cars to the collecion</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="bottom-footer">
                <div class="copyright">
                    <p class="text">
                        Copyright&copy;2023 All rights reserved by
                        <span>The Classic Car Collection</span>
                    </p>
                </div>

                <div class="followme-wrap">
                    <div class="followme">
                        <h3>Follow Creator</h3>
                        <span class="footer-line"></span>
                        <div class="social-media">
                            <a href="https://github.com/Rick05Baas">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-question"></i>
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