<?php
include "includes/connection.php";
$rs = Database::search("SELECT * FROM `post`ORDER BY `created_at` DESC");
$num = $rs->num_rows;

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        html {
            scroll-behavior: smooth;
        }

        .hero h1 {
            text-shadow: 0 0 1px black;
        }

        .hero-img {
            position: relative;
            z-index: 1;
        }

        .hero-img::before {
            content: '';
            position: absolute;
            background-color: black;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            overflow: hidden;
            z-index: -5;
            border-radius: 5px;
            opacity: 0.3;
        }

        .card {
            cursor: pointer;
            transition: .1s ease-out;
        }

        .card:hover {
            scale: 1.02;
        }

        .text-truncate1 {
            max-height: 4.5em;
            position: relative;
        }

        .text-truncate2 {
            max-height: 4.5em;
            position: relative;
        }

        .text-truncate1::after {
            content: '';
            bottom: 0;
            left: 0;
            width: 100%;
            height: 40px;
            position: absolute;
            background: linear-gradient(180deg, transparent, #212529);
        }
    </style>
</head>

<body>

    <?php include "includes/navBar.php" ?>
    <!-- Hero -->
    <div class="hero p-5 container mt-2">
        <div class="row border-light-subtle rounded-3 border" style="background: rgba(255, 255, 255 ,0.1);">
            <div class="col-sm-6 p-5">
                <h1 class="fw-bold text-light">Welcome to TechZilla</h1>
                <p class="text-light lead">Explore our diverse range of tech articles curated by our team of tech
                    enthusiasts
                    and experts. From product reviews to how-to guides and industry trends, TechZilla covers topics that
                    matter to today's tech-savvy audience.</p>
                <a href="#artical" class="btn btn-lg" style="border:2px solid #B1EF42; color: #B1EF42;">Explore > </a>
            </div>
        </div>

        <!-- Div 2 -->
        <div class="row mt-2 row align-items-md-stretch">
            <div class="col-md-6 border-light-subtle p-5">
                <?php $d = $rs->fetch_assoc(); ?>
                <h2 class="fw-bold text-light"><?php echo $d['title'] ?></h2>
                <p class="text-truncate text-light text-wrap text-truncate2">
                    <?php echo htmlspecialchars(strip_tags(htmlspecialchars_decode($d['content']))) ?>
                </p>
                <a href="#article" class="btn btn-lg text-dark" onclick="postView(<?php echo ($d['id']) ?>);" style="background: #B1EF42;">Read >
                </a>
            </div>

            <?php
            $rs3 = Database::search("SELECT * FROM `post` WHERE `id` > '{$d['id']}' ORDER BY `created_at` DESC LIMIT 1");

            $num3 = $rs3->num_rows;

            for ($i = 0; $i < $num3; $i++) {
                $d3 = $rs3->fetch_assoc();
                ?>
                <!-- Div 2 -->
                <div class="hero-img col-md-6 border-light-subtle rounded-3 border p-5"
                    style="background: url('<?php echo $d3['path'] ?>'); background-size: cover;">
                    <?php
            }
            ?>
                <?php $d = $rs->fetch_assoc(); ?>
                <h2 class="fw-bold text-light"><?php echo $d['title'] ?></h2>

                <p class="text-truncate text-light text-wrap text-truncate2">
                    <?php echo htmlspecialchars(strip_tags(htmlspecialchars_decode($d['content']))) ?>
                </p>

                <a href="#article" class="btn btn-lg"
                    onclick="postView(<?php echo ($d['id']) ?>);" style="border:2px solid #B1EF42; color: #B1EF42;">Read >
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-2 p-2">
        <h2 class="fw-bold text-center" id="artical">Latest Articles</h2>
    </div>

    <div class="container p-4 mt-2">
        <div class="row gap-4 d-flex justify-content-between" id="search-result">


                <?php include "includes/postList.php"?>


        </div>
    </div>


    <?php include "includes/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>

    <script>
        
    </script>
</body>

</html>