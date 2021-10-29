<!-- a page with a navbar, a form to collect new member information, and a submit button -->
<!-- navbar with name and going back to homepage -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New Member</title>
    </head>
    <body>
        <!-- navbar -->
        <div>

        </div>
        <!-- form for member information, needs
            ~ member_name, string
            ~ address, phone, string
            ~ membership_id, integer (use <select>)
                `type of membership: silver(0), gold(1), business(2)
        -->
        <div>
                <form action="includes/addMember.inc.php" method="POST">
                <!-- input fields below -->


                <button type="submit" name="addMemberSubmit">Submit</button>
            </form>
        </div>
        
    </body>
</html>