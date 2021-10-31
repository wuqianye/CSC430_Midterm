<!-- processor for adding a new member -->

<?php
    // db connection file
    include "dbconnect.inc.php";

    // if "addMemberSubmit" button is clicked
    // "addMemberSubmit" is the id to the button
    if (isset($_POST['addMemberSubmit'])) {
        // get values from the input fields
        $member_name = trim(stripslashes(htmlspecialchars($_POST['member_name'])));
        $address = trim(stripslashes(htmlspecialchars($_POST['address'])));
        $phone = trim(stripslashes(htmlspecialchars($_POST['phone'])));
        $membership_id = trim(stripslashes(htmlspecialchars($_POST['membership_id'])));
        $member_since = date('Y-m-d');
        $member_expires = date('Y-m-d', strtotime('+1 year'));

        // sql query
        $query = 'INSERT INTO members (member_name, address, phone, membership_id, member_since, member_expires) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($query);
        // bind parameters with ? in the query, 'sssi' is the data types for each parameter, s for string, i for integer
        $stmt->bind_param('sssiss', $member_name, $address, $phone, $membership_id, $member_since, $member_expires);
        if ($stmt->execute()) {
            ?>
                <div style="height:100vh; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                    <h1>New Member Added!</h1>
                    <h2>PAGE WILL BE REDIRECTED TO HOME IN 4 SECONDS</h2>
                    <a href="../home.php">
                        <h2>Return to Home</h2>
                    </a>
                </div>                
            <?php
            header("Refresh:4; url=../home.php");
        } else {
            ?>
                <div style="height:100vh; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                    <h1 style="color:red;">Execution Failed!</h1>
                    <h2>PAGE WILL BE REDIRECTED TO HOME IN 4 SECONDS</h2>
                    <a href="../home.php">
                        <h2>Return to Home</h2>
                    </a>
                </div>                
            <?php
            header("Refresh:4; url=../home.php");
        }
    }
?>