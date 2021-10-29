<!-- processor for adding a new member -->

<?php
    // db connection file
    include "dbconnect.inc.php";

    // if "addMember" button is clicked
    // "addMember" is the id to the button
    if (isset($POST['addMember'])) {
        // get values from the input fields
        $member_name = trim(stripslashes(htmlspecialchars($_POST['member_name'])));
        $address = trim(stripslashes(htmlspecialchars($_POST['address'])));
        $phone = trim(stripslashes(htmlspecialchars($_POST['phone'])));
        $membership_id = trim(stripslashes(htmlspecialchars($_POST['membership_id'])));
        $member_since = date('m-d-Y');
        $member_expires = date('m-d-Y', strtotime('+1 year'));

        // sql query
        $query = 'INSERT INTO members (member_name, address, phone, membership_id, member_since, member_expires) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($query);
        // bind parameters with ? in the query, 'sssiss' is the data types for each parameter, s for string, i for integer
        $stmt->bind_param('sssiss', $member_name, $address, $phone, $membersip_id, $member_since, $member_expires);
        if ($stmt->execute()) {
            echo 'new member added';
        } else {
            echo 'executin failed';
        }
    }
?>