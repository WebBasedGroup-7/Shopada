<?php include("path.php") ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
guestsOnly();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Font Awesome -->
    <script
      src="https://kit.fontawesome.com/82900df3f7.js"
      crossorigin="anonymous"
    ></script>

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Candal|Lora&display=swap"
      rel="stylesheet"
    />

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <title>Register</title>
  </head>

  <body>

    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <div class="auth-content">
      <form action="register.php" method="post">
        <h2 class="form-title">Register</h2>

        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

        <div>
          <label>Fullname</label>
          <input type="text" name="fullname" value="<?php echo $fullname; ?>" class="text-input" />
        </div>

        <div>
          <label>Mobile Number</label>
          <input type="number" name="mobileNum" value="<?php echo $mobileNum; ?>" class="text-input" />
        </div>

        <div>
          <label>Email</label>
          <input type="email" name="email" value="<?php echo $email; ?>" class="text-input" />
        </div>

        <div>
          <label>Password</label>
          <input type="password" name="password" value="<?php echo $password; ?>" class="text-input" />
        </div>

        <div>
          <label>Password Confirmation</label>
          <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input" />
        </div>

        <div>
          <button type="submit" name="register-btn" class="btn btn-big">
            Register
          </button>
        </div>

        <p>Or <a href="<?php echo BASE_URL . '/login.php' ?>">Sign In</a></p>
      </form>
    </div>

    <!-- JQuery -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>

    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>
  </body>
</html>
