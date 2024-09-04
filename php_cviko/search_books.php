<!-- search_books.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Search Books</title>
</head>

<body>
    <a href="list_books.php">View All Books</a>
    <a href="insert_book.php">Add New Book</a>
    <h1>Search Books</h1>
    <form action="search_books.php" method="post">
        Author's Last Name: <input type="text" name="last_name"><br>
        Author's First Name: <input type="text" name="first_name"><br>
        Book Title: <input type="text" name="title"><br>
        ISBN: <input type="text" name="isbn"><br>
        <input type="submit" name="search" value="Search">
    </form>

    <?php
    if (isset($_POST['search'])) {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "book_database";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get search criteria
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $title = $_POST['title'];
        $isbn = $_POST['isbn'];

        // Build query with conditions
        $sql = "SELECT * FROM books WHERE 1=1";
        if (!empty($last_name)) {
            $sql .= " AND last_name LIKE '%" . $conn->real_escape_string($last_name) . "%'";
        }
        if (!empty($first_name)) {
            $sql .= " AND first_name LIKE '%" . $conn->real_escape_string($first_name) . "%'";
        }
        if (!empty($title)) {
            $sql .= " AND title LIKE '%" . $conn->real_escape_string($title) . "%'";
        }
        if (!empty($isbn)) {
            $sql .= " AND isbn LIKE '%" . $conn->real_escape_string($isbn) . "%'";
        }

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
            echo "No results found.";
        }

        $conn->close();
    }
    ?>

    <br>
</body>

</html>