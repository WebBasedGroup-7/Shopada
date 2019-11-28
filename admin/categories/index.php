<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/categories.php");
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

    <title>Admin Section - Manage Categories</title>
</head>

<body>

    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">

    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
        <a href="create.php" class="btn btn-big">Add Category</a>
        <a href="index.php" class="btn btn-big">Manage Categories</a>
        </div>

        <div class="content">
        <h2 class="page-title">Manage Categories</h2>

        <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

        <table>
            <thead>
            <th>SN</th>
            <th>Name</th>
            <th colspan="2">Action</th>
            </thead>
            <tbody>
                <?php foreach ($categories as $key => $category): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><a href="edit.php?id=<?php echo $category['id']; ?>" class="edit">edit</a></td>
                        <td><a href="index.php?del_id=<?php echo $category['id']; ?>" class="delete">delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
