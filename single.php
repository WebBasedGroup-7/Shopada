<?php include("path.php"); ?> 
<?php include(ROOT_PATH . "/app/controllers/posts.php");

if(isset($_GET['id'])){
    $post = selectOne('posts', ['id' => $_GET['id']]);
}

$posts = selectALL('categories');
$posts = selectALL('posts', ['published' => 1]);

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

    <title><?php echo $post['title']; ?> | Shopada</title>
  </head>

  <body>

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
      <!-- Content -->
      <div class="content clearfix">
        <!-- Main Content -->
        <div class="main-content-wrapper">
          <div class="main-content single">
          <h1 class="post-title"><?php echo $post['title']; ?></h1>

            <div class="post clearfix">
                <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image" />
                <div class="post-preview">
                &nbsp;
                <span class="post-price"><?php echo 'RM' . $post['price']; ?></span>
                
                </div>
            </div>
            
            <div class="post clearfix">
                <h2>Specification</h2>
                <div class="post-preview">
                &nbsp;
                <p class="preview-text">
                    <?php echo html_entity_decode($post['body']); ?>
                </p>
                </div>
            </div>
          </div>    
        </div>
        <!-- // Main Content -->


        <!-- Sidebar -->
        <div class="sidebar single">
          <div class="section popular">
            <h2 class="section-title">Popular</h2>

            <?php foreach ($posts as $p): ?>
            <div class="post clearfix">
              <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="" />
              <a href="single.php?id=<?php echo $p['id']; ?>" class="title"><h4><?php echo $p['title']; ?></h4></a>
            </div>
            <?php endforeach; ?>

            
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
      <!-- // Sidebar -->

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
