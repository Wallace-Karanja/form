<?php
// include './process_form.php';
// include './Form.php';
include './Admin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles.css">
    <!-- <script src="../script.js" defer></script> -->
    <title>Form</title>
</head>

<body>
    <div class="header-container">
        <div></div>
        <div></div>
        <div>
            <nav>
                <ul class="nav-container">
                    <div class="links">
                        <li><a href="index.php">Home</a></li>
                    </div>
                    <div>
                        <li class="links"><a href="login.php">Login</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
    <div class="container">
        <div></div>
        <main>
            <h1>Password Reset</h1>
            <div>
                <form action="" method="post" id="form">
                    <div>
                        <label for="emailAddress">Email<span id="email_address"></span></label>
                        <input type="email" name="email_address" id="emailAddress" value="<?php echo (isset($_POST['email_address']) ? $_POST['email_address'] : ""); ?>" />
                    </div>
                    <div>
                        <label for="idNumber">Id Number/Staff No<span id="id_number"></span></label>
                        <input type="tel" name="id_number" id="idNumber" value="<?php echo (isset($_POST['id_number']) ? $_POST['id_number'] : ""); ?>" />
                    </div>
                    <div>
                        <label for="pass">Password<span id="password"></span></label>
                        <input type="password" name="password" id="pass" value="<?php echo (isset($_POST['password']) ? $_POST['password'] : ""); ?>" />
                    </div>
                    <div>
                        <label for="confirm_pass">Confirm Password<span id="confirm_password"></span></label>
                        <input type="password" name="confirm_password" id="confirm_pass" value="<?php echo (isset($_POST['confirm_password']) ? $_POST['confirm_password'] : ""); ?>" />
                    </div>
                    <div><input type="submit" name="submit" value="Reset" id="submit" /></div>
                </form>
                <p id="message"></p>
                <?php
                if (isset($_POST['submit'])) {
                    //   $form = new Form();
                    //   var_dump($form->createLog($_POST));
                    // var_dump($_POST);
                    $admin = new Admin();
                    var_dump($admin->resetPassword());
                }
                ?>
            </div>
        </main>
        <div></div>
    </div>

</body>

</html>