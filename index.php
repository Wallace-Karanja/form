<?php 
  // include './process_form.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
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
              <li class="links"><a href="">About</a></li>
            </div>
            <div>
              <li class="links"><a href="">Contact Us</a></li>
            </div>
            <div>
              <li class="links"><a href="admin.php">Admin</a></li>
            </div>
          </ul>
        </nav>
      </div>
    </div>
    <div class="container">
      <div></div>
        <main>
          <h1>Application Form</h1>
          <div>
            <form action="" method="post" id="form">
            <div>
              <label for="firstName">Firstname<span id="firstname"></span></label>
            <input type="text" name="firstname" id="firstName" value="<?php echo (isset($_POST['firstname']) ? $_POST['firstname'] : "");?>" />
            </div>
            <div>
              <label for="lastName">Lastname <span id="lastname"></span></label>
          <input type="text" name="lastname" id="lastName" value="<?php echo (isset($_POST['lastname']) ? $_POST['lastname'] : "");?>" />
            </div>
          <div><input type="submit" name="submit" value="submit" id="submit" /></div>
                </form>
                <p id="message"></p>
                </div>
        </main>
    <?php 
    // if (isset($_POST['submit'])) {
    //   $form = new Form();
    //   $form->insert();
    //   if ($form->queryStatus == 0) {
    //     echo "Success !";
    //   }elseif ($form->queryStatus == 1) {
    //     echo  "something went wrong/logic";
    //   } elseif ($form->queryStatus == 2){
    //     echo  "User already exists";
    //   }else{
    //     echo "failure";
    //   }
    // }
    ?>


      <div></div>
    </div>
    
  </body>
</html>
