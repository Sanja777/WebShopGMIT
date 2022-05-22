<?php include "includes/database.php" ?>
<!doctype html>
<html lang="en">

<head>
    <!-- standard meta tags -->
    <?php include "includes/meta.php" ?>
    <!-- page title -->
    <title>Home - GMIT Web Shop</title>
</head>

<body>
    <!-- header menu -->
    <?php include "includes/header.php" ?>
    <!-- page title  -->
    <h1>Random images</h1>

    <!-- carousel displays different image each time page is loaded -->
    <?php
    // fetch will get random 3 images as its ordered by rand() and limit is 3
    $banners = fetch_data("banner", ["BannerID", "MediaUrl", "Title", "TargetUrl"], "rand()", "3");
    $isFirst = true;
    if (is_array($banners)) {
        
    ?>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <?php
                            
                             foreach($banners as $data)
                             {
                                 
                            ?>
                            <div class="carousel-item <?php echo $isFirst?"active":"" ?>">
                                <img src="<?php echo $data['MediaUrl']??''; ?>" class="d-block w-100" alt="<?php echo $data['Title']??''; ?>">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?php echo $data['Title']??''; ?></h5>
                                    <a class="btn btn-lg btn-primary" href="<?php echo $data['TargetUrl']??''; ?>" role="button">Learn more</a>
                                </div>
                            </div>
                            <?php
                             $isFirst = false;
                             }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>




    <?php include "includes/js.php" ?>
</body>

</html>