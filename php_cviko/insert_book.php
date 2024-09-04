<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Book</title>
</head>

<body>
    <a href="list_books.php">View All Books</a>
    <a href="search_books.php">Search book</a>
    <h2>Insert New Book</h2>
    <form action="insert_book.php" method="post">
        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" required><br><br>

        <label for="first_name">Author's First Name:</label><br>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Author's Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="title">Book Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="5" required></textarea><br><br>

        <input type="submit" value="Insert Book">
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $isbn = $_POST['isbn'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Database connection
    $servername = "localhost";
    $username = "root"; // Change to your MariaDB username
    $password = "root"; // Change to your MariaDB password
    $dbname = "book_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL to insert data into table
    $sql = "INSERT INTO books (isbn, first_name, last_name, title, description) 
            VALUES ('$isbn', '$first_name', '$last_name', '$title', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New book inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>