<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $product_name = $_POST["product_name"];
    $prodID = $_POST["product_id"];
    $shipping_address = $_POST["shipping_address"];
    $customerName = $_POST["customerName"];
    $customerMail = $_POST["customerMail"];

    //generate order number
    $order_number = uniqid();

    // send email

    $to = $customerMail;
    $subject = "Order: $product_name";
    $message = "Hello $customerName \n";
    $message .= "Thank you for your order!\n";
    $message .= "Order Number: $order_number\n";
    $message .= "Product Name: $product_name\n";
    $message .= "Shipping Address: $shipping_address\n";
    $message .= "Customer Name: $customerName\n";
    $message .= "Customer Email: $customerMail\n";
    $message .= "Your order is now processing, we will be in touch soon!";

    $headers = "From: The Classic Car Collection";

    if (mail($to, $subject, $message, $headers)) {
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

        // Insert order details into the database
        $sql = "INSERT INTO orders
        (order_number, product_name, shipping_adress, customer_name, customer_email)
         VALUES
         ('$order_number', '$product_name', '$shipping_address', '$customerName', '$customerMail')";

        $result = $db->query($sql);

        if ($result) {
            echo "Order placed successfully. You will receive a confirmation email shortly.";
            header('location: thanks.php');
        } else {
            echo "Failed to place the order and store in the database: " . $db->lastErrorMsg();
        }

        $db->close();
    } else {
        echo "Failed to send the confirmation email.";
    }
} else {
    echo "Invalid request.";
}