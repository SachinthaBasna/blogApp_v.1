<?php
include "includes/connection.php";
$rs = Database::search("SELECT * FROM `post`");
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
    </style>
</head>

<body>

    <?php include "includes/navBar.php" ?>

    <div class="hero border rounded p-5 container mt-2" style="background-color: #2B3035;">
        <div class="row rounded border" style="border-color: rgba(255,255,255,0.2);">
            <div class="col-sm-6 p-5">
                <h1 class="fw-bold text-light">Welcome to my Blog Site!</h1>
                <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing. Lorem, ipsum dolor. Lorem
                    ipsum dolor sit. Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                <a href="#artical" class="btn btn-primary">Explore > </a>
            </div>
        </div>

        <!-- Div 2 -->
        <div class="row mt-2 row align-items-md-stretch">
            <div class="col-md-6 rounded p-5" style="background-color: #2B3035;">
                <?php $d = $rs->fetch_assoc(); ?>
                <h2 class="fw-bold text-light"><?php echo $d['title'] ?></h2>
                <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing. Lorem, ipsum dolor. Lorem
                    ipsum dolor sit. Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                <a href="#article" class="btn btn-primary" onclick="postView(<?php echo ($d['id']) ?>);">Read > </a>
            </div>

            <?php
            $rs3 = Database::search("SELECT * FROM `post` WHERE `id` = '" . $d['id'] . "'+1");
            $num3 = $rs3->num_rows;

            for ($i = 0; $i < $num3; $i++) {
                $d3 = $rs3->fetch_assoc();
                ?>
                <!-- Div 2 -->
                <div class="hero-img col-md-6 rounded border p-5"
                    style="background: url('<?php echo $d3['path'] ?>'); background-size: cover;">
                    <?php
            }
            ?>
                <?php $d = $rs->fetch_assoc(); ?>
                <h2 class="fw-bold text-light"><?php echo $d['title'] ?></h2>
                <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing. Lorem, ipsum dolor. Lorem
                    ipsum dolor sit. Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                <a href="#article" class="btn btn-outline-primary" onclick="postView(<?php echo ($d['id']) ?>);">Read >
                </a>
            </div>
        </div>
    </div>

    <div class="border rounded container mt-2 p-2">
        <h2 class="fw-bold text-center" id="artical">Latest Articles</h2>
    </div>

    <div class="container p-4 mt-2">
        <div class="row gap-4 d-flex justify-content-between" id="search-result">

            <?php
            $rs2 = Database::search("SELECT * FROM `post`");
            $num = $rs->num_rows;

            for ($i = 0; $i < $num; $i++) {
                $d = $rs2->fetch_assoc();


                ?>
                <div class="card col-lg-3 p-2 shadow" onclick="postView(<?php echo ($d['id']) ?>);">
                    <img src="<?php echo ($d['path']); ?>" class="rounded-top">
                    <p class="text-center"><?php echo $d['created_at'] ?></p>
                    <h4 class="text-center fw-bold"><?php echo $d['title']; ?></h4>

                    <button class="btn btn-primary">Read Full article</button>
                </div>

                <?php
            }
            ?>
        </div>
    </div>


    <?php include "includes/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>

</html>