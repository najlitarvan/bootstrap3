<!-- list_books.php -->
<!DOCTYPE html>
<html>

<head>
    <title>List of Books</title>
</head>

<body>
    <a href="insert_book.php">Add New Book</a>
    <a href="search_books.php">Search book</a>
    <h1>List of Books</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "book_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ISBN</th>
                    <th>Author's First Name</th>
                    <th>Author's Last Name</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["isbn"] . "</td>
                    <td>" . $row["first_name"] . "</td>
                    <td>" . $row["last_name"] . "</td>
                    <td>" . $row["title"] . "</td>
                    <td>" . $row["description"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <br>

</body>

</html>