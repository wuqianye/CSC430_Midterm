<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Poppins" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="assets/styles.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    </head>
    <body>
        <div>
            <header>
                <nav>
                    <a href="home.php">
                        <div class="logo">CSC 430</div>
                    </a>
                </nav>
            
                <!-- LOGIN FORME START HERE -->
                <div class="form_login">            
                    <div class="wrapper">
                        <div class="title-text">
                            <div class="title login">
                                Member Search
                            </div>
                            <div class="title signup">
                                Member Signup
                            </div>
                        </div>

                        <div class="form-container">
                            <div class="slide-controls">
                                <input type="radio" name="slide" id="login" checked>
                                <input type="radio" name="slide" id="signup">
                                <label for="login" class="slide login">Search</label>
                                <label for="signup" class="slide signup">Signup</label>
                                <div class="slider-tab"></div>
                            </div>
                            <div class="form-inner">

                                <form action="" class="login" method="POST">
                                    <div class="field">
                                        <input type="number" placeholder="Search Member ID.." name="key">
                                        <div class="field btn">
                                            <div class="btn-layer"></div>
                                            <input name="searchSumbit" type="submit">
                                        </div>
                                    </div>
                                </form>

                                <form action="includes/addMember.inc.php" class="signup" method="POST">
                                    <div class="field">
                                        <input name="member_name" type="text" placeholder="First & Last Name" required="required">
                                    </div>
                                    <div class="field">
                                        <input name="address" type="text" placeholder="Address" required="required">
                                    </div>
                                    <div class="field">
                                        <input name="phone" type="tel" id="txtnumber" minlength="12" maxlength="12" onclick="tel()" placeholder="000-000-0000" required="required">                         
                                    </div>
                                    <div class="field">
                                        <select name="membership_id">
                                            <option value="0">Silver</option>
                                            <option value="1">Gold</option>
                                            <option value="2">Business</option>
                                        </select>
                                    </div>                                        
                                    <div class="field btn">
                                        <div class="btn-layer"></div>
                                        <input name="addMemberSubmit" type="submit">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>                
                </div>
            </header>
        </div>
        <div id="processors">
            <?php
                // db connection file
                include "includes/dbconnect.inc.php";
            
                $key = trim(stripslashes(htmlspecialchars($_POST["key"])));

                if ($key != null) {
                    $query = 'SELECT m.*, ms.membership_name FROM members m, membership_type ms WHERE m.member_id = ?';
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('i', $key);
                    $stmt->execute();
                    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                    if (!$result) exit ('No Result');
                    if ($result) {
                        $member = $result[0];
                        // print_r($member)
                        ?>
                            <div id="result-container">
                                <h2>Member ID: <?php echo $member["member_id"]; ?></h2>
                                <h1>Member Name: <?php echo $member["member_name"]; ?></h1>
                                <p><b>Address:</b> <?php echo $member["address"]; ?></p>
                                <p><b>Phone:</b> <?php echo $member["phone"]; ?></p>
                                <p><b>Membership Type:</b> <?php echo $member["membership_name"]; ?></p>
                                <p><b>Member Since:</b> <?php echo $member["member_since"]; ?></p>
                                <p><b>Member Expires:</b> <?php echo $member["member_expires"]; ?></p>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>

        <script src="assets/script.js"></script>
    </body>
</html>