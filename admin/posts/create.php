<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");?>
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

    <title>Admin Section - Add Post</title>
</head>

<body>

    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">

    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content">
        <div class="button-group">
        <a href="create.php" class="btn btn-big">Add Post</a>
        <a href="index.php" class="btn btn-big">Manage Posts</a>
        adminOnly();
        </div>

        <div class="content">
        <h2 class="page-title">Add Post</h2>
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
            
            <form action="create.php" method="post" enctype="multipart/form-data">
                <div>
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $title; ?>" class="text-input">
                </div>
                <div>
                    <label>Specification</label>
                    <textarea name="body" id="body"><?php echo $body; ?></textarea>
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="image" class="text-input">
                </div>
                <div>
                    <label>Price (RM)</label>
                    <?php if($price == 0): ?>
                        <input type="number" name="price" placeholder="0.00" step="0.01" min="0" class="text-input"/>
                    <?php else: ?>
                        <input type="number" name="price" value="<?php echo $price; ?>" step="0.01" min="0" class="text-input"/>
                    <?php endif; ?>
                </div>
                <div>
                    <label>Category</label>
                    <select name="category_id" class="text-input">
                    <option value=""></option>
                        <?php foreach($categories as $key => $category): ?>
                            <?php if(!empty($category_id) && $category_id == $category['id']): ?>
                                <option selected value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <?php if(empty($published)): ?>
                        <label>
                            <input type="checkbox" name="published">
                            Publish
                        </label>
                    <?php else: ?>
                        <label>
                            <input type="checkbox" name="published" checked>
                            Publish
                        </label>
                    <?php endif; ?>
                </div>
                <div>
                    <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
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
