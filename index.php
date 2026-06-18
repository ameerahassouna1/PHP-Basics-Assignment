<?php
$products = [
    [
        "name" => "Laptop Dell XPS",
        "price" => 1200,
        "category" => "Electronics",
        "available" => true 
    ],
    [
        "name" => "Wireless Mouse",
        "price" => 25,
        "category" => "Accessories",
        "available" => false 
    ],
    [
        "name" => "Gaming Headset",
        "price" => 80,
        "category" => "Audio",
        "available" => true
    ]
];

$userName = "";
$feedbackMessage = "";
$confirmation = "";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['message'])) {
        $userName = htmlspecialchars($_POST['username']);
        $feedbackMessage = htmlspecialchars($_POST['message']);
        
        $confirmation = "Thank you, <strong>" . $userName . "</strong>, for your feedback!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basics Assignment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f7f6;
            color: #333;
        }
        h2, h3 {
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            background: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        .in-stock {
            color: green;
            font-weight: bold;
        }
        .out-stock {
            color: red;
            font-weight: bold;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 500px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #219653;
        }
        .alert {
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-bottom: 20px;
            max-width: 500px;
        }
    </style>
</head>
<body>

    <h2>Product List</h2>
    
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price ($)</th>
                <th>Category</th>
                <th>Availability</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>" . $product['name'] . "</td>";
                echo "<td>" . $product['price'] . "</td>";
                echo "<td>" . $product['category'] . "</td>";
                
                if ($product['available'] === true) {
                    echo "<td class='in-stock'>In Stock</td>";
                } else {
                    echo "<td class='out-stock'>Out of Stock</td>";
                }
                
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <hr>

    <h3>Website Feedback Form</h3>

    <?php if (!empty($confirmation)): ?>
        <div class="alert">
            <?php echo $confirmation; ?>
        </div>
    <?php endif; ?>

    <form action="index.php" method="POST">
        <label for="username">User Name:</label>
        <input type="text" id="username" name="username" required>

        <label for="message">Message / Feedback:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input type="submit" value="Submit Feedback">
    </form>

</body>
</html>