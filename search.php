<!-- a page with a navbar, a searchbar near the top, and detailed search result (search by member_id, should return only one result), and a update information button -->
<!-- navbar with name and going back to homepage -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search</title>
    </head>
    <body>
        <div>
            <form action="search.php" method="POST">
                <input id="search" name="search" type="number" placeholder="Enter Member ID">
                <button type="submit" name="submitSearch">Search</button>
            </form>
        </div>
        <div>
            <?php
                include 'includes/dbconnect.inc.php';

                if (isset($_POST['submitSearch'])) {
                    $key = trim(stripslashes(htmlspecialchars($_POST["key"])));

                    $query = 'SELECT * FROM members WHERE member_id = ?';
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('i', $key);
                    $stmt->execute();
                    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                    if (!$result) exit ('No Result');
                    if ($result) {
                    ?>
                        <!-- display result -->
                            
                    <?php
                    }
                }                
            ?>
        </div>
    </body>
</html>