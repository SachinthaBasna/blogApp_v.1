<?php
include "includes/connection.php";

$pid = $_GET['pid'];

$rs = Database::search("SELECT * FROM `post` WHERE `id` = '" . $pid . "'");
$num = $rs->num_rows;

?>

<!DOCTYPE html>
<html lang="en">

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
        <p><?php echo ($pid) ?></p>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <h1 class="fw-bold"><?php echo ($d['title']) ?></h1>
                    <div class="footer-group">
                        <p class="footer-group-item">by: <b><?php echo ($d['author']) ?></b></p>
                        <p class="footer-group-item"><?php echo ($d['created_at']) ?></p>
                    </div>
                    <hr>
                    <div class="col-sm-12 ">
                        <img class="img-fluid" src="<?php echo ($d2['path']); ?>">
                    </div>

                    <div class="border p-5 ps-5">
                        <?php echo htmlspecialchars_decode($d['content']); ?>
                    </div>
                </div>
            </div>
        </div>



        <?php
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
</body>

</html>