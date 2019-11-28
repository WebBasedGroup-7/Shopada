<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
adminOnly();
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
    <link rel="stylesheet" href="../../assets/css/style.css" />

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css" />

    <title>Admin Section - Edit User</title>
</head>

<body>

    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">

    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
        <a href="create.php" class="btn btn-big">Add User</a>
        <a href="index.php" class="btn btn-big">Manage Users</a>
        </div>

        <div class="content">
        <h2 class="page-title">Edit User</h2>
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

        <form action="edit.php" method="post">
            <div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
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
            <?php if(empty($admin)): ?>
                    <label>
                        <input type="checkbox" name="admin">
                        Admin
                    </label>
                <?php else: ?>
                    <label>
                        <input type="checkbox" name="admin" checked>
                        Admin
                    </label>
                <?php endif; ?>
            </div>
            <div>
            <button type="submit" name="update-user" class="btn btn-big">Update User</button>
            </div>
        </form>
        </div>
    </div>
    <!-- // Admin Content -->
    </div>
    <!-- // Admin Page Wrapper -->

    <!-- JQuery -->
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"
    ></script>

    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
    <script src="../../assets/js/ckeditor.js"></script>

    <!-- Custom Script -->
    <script src="../../assets/js/scripts.js"></script>
</body>
</html>
