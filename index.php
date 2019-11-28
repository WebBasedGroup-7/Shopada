<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/categories.php");

$posts = array();
$postsTitle = 'Most Popular';

if (isset($_GET['c_id'])) {
    $posts = getPostsByCategoryId($_GET['c_id']);
    $postsTitle = "You searched for posts under '" . $_GET['name'] . "'";
}
else if (isset($_POST['search-term'])) {
    $postsTitle = "You searched for '" . $_POST['search-term'] . "'";
    $posts = searchPosts($_POST['search-term']);
} else{
    $posts = getPublishedPosts();
}
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

    <title>Shopada</title>
  </head>

  <body>

    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
      <!-- Post Slider -->
      <div class="post-slider">
        <h1 class="slider-title">Recommended Items</h1>
        <i class="fas fa-chevron-left prev"></i>
        <i class="fas fa-chevron-right next"></i>

        <div class="post-wrapper">

            <?php foreach ($posts as $post): ?>
                <div class="post">
                    <img
                    src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>"
                    alt=""
                    class="slider-image"
                    />
                    <div class="post-info">
                    <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                    <i class="far fa-user"><?php echo $post['fullname']; ?></i>
                    &nbsp;
                    <i class="far fa-calendar"><?php echo ' ' . date('F j, Y', strtotime($post['created_at'])); ?></i>
                    &nbsp;
                    <span class="post-price"><?php echo 'RM' . $post['price']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>        
          
        </div>
      </div>
      <!-- // Post Slider -->

      <!-- Content -->
      <div class="content clearfix">
        <!-- Main Content -->
        <div class="main-content">
          <h1 class="most-popular-title"><?php echo $postsTitle; ?></h1>

          <?php foreach ($posts as $post): ?>
            <div class="post clearfix">
                <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image" />
                <div class="post-preview">
                <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                <i class="far fa-user"><?php echo $post['fullname']; ?></i>
                &nbsp;
                <i class="far calendar"><?php echo ' ' . date('F j, Y', strtotime($post['created_at'])); ?></i>
                <br />
                <span class="post-price"><?php echo 'RM' . $post['price']; ?></span>
                <p class="preview-text">
                    <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                </p>
                <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Buy Now</a>
                </div>
            </div>
          <?php endforeach; ?>        

        </div>
        <!-- // Main Content -->

        <div class="sidebar">
          <div class="section search">
            <h2 class="section-title">Search</h2>
            <form action="index.php" method="post">
              <input
                type="text"
                name="search-term"
                class="text-input"
                placeholder="Search..."
              />
            </form>
          </div>

          <div class="section categories">
            <h2 class="section-title">Categories</h2>
            <ul>
                <?php foreach ($categories as $key => $category): ?>
                    <li><a href="<?php echo BASE_URL . '/index.php?c_id=' . $category['id'] . '&name=' . $category['name']; ?>"><?php echo $category['name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <!-- // Content -->
    </div>
    <!-- // Page Wrapper -->

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

    <!-- JQuery -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>

    <!-- Slick Carousel -->
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>

    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>
  </body>
</html>
