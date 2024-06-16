<?php
include "includes/connection.php";

$pid = $_GET['pid'];

$rs = Database::search("SELECT * FROM `post` WHERE `id` = '" . $pid . "'");
$num = $rs->num_rows;

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <?php
    if ($num > 0) {
        $d = $rs->fetch_assoc();
        ?>
        <title>MyBlog | <?php echo ($d['title']) ?></title>
        <?php
    }
    ?>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>

</head>

<body>
    <?php
    $pid = $_GET['pid'];

    $rs2 = Database::search("SELECT * FROM `post` WHERE `id` = '" . $pid . "'");
    $num2 = $rs2->num_rows;

    if ($num2 > 0) {
        $d2 = $rs2->fetch_assoc();

        ?>
        <?php include "includes/navBar.php" ?>


        <div class="container-sm  mt-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" style="color: #B1EF42;">Home</a></li>
                    <li class="breadcrumb-item"><a href="blog.php" style="color: #B1EF42;">Articles</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <?php echo ($d['title']) ?></li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-sm-12">
        
                    <h1 class="fw-bold" style="font-size: 54px;"><?php echo ($d['title']) ?></h1>
                    <div class="footer-group">
                        <h5 class="text-body">by: <i><?php echo ($d['author']) ?></i></h5>
                        <h6 class="text-body-secondary"><?php echo ($d['created_at']) ?></h6>
                    </div>
                    <hr>
                    <div class="col-sm-12">
                        <img class="img-fluid" width="100%" src="<?php echo ($d2['path']); ?>">
                    </div>

                    <div class="border-sm p-sm-5">
                        <?php echo htmlspecialchars_decode($d['content']); ?>
                    </div>
                </div>
            </div>
        </div>



        <?php
    }
    ?>

    <?php include "includes/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>

</html>