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

                                    echo "<h1 class=header-title'>{$product['brand']} {$product['model']}</h1>";
                                    echo "<h1 class=header-title'>{$product['price']}</h1>";
                                    echo "<h2 class=header-title'>{$product['consty']}</h2>";
                                    echo "<p class='text'>
                                            {$product['desc']}
                                        </p>";

                                        echo "<a class='active-inv' href='betaling.php?id=$product_id'>Order Now</a>";


                                echo "</div class='column-1'>";

                                echo "<div class='column-2 image'>";
                                    echo "<img class='car-img-inv-details' src='../media/uploads/{$product['image']}' alt=''>";

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
                                            echo "<p>mileage: {$product['mileage']}";
                                        echo "</il>";

                                        echo "<il>";
                                            echo "<p>Transmission: {$product['transmission']}";
                                        echo "</il>";
                                        echo "<il>";
                                            echo "<p>Engine: {$product['engine']}";
                                        echo "</il>";

                                        echo "<il>";
                                            echo "<p>Fuel: {$product['fuel']}";
                                        echo "</il>";
                                        echo "<il>";
                                            echo "<p>Year: {$product['consty']}";
                                        echo "</il>";
                                        echo "<il>";
                                            echo "<p>HP: {$product['hp']}";
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