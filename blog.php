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

        .card {
            cursor: pointer;
            transition: .1s ease-out;
        }

        .card:hover {
            scale: 1.02;
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

    <?php include "includes/navBarBlog.php" ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-sm-8">
                <div class="container mt-2 p-2">
                    <h2 class="fw-bold text-center" id="artical">Latest Articles</h2>
                </div>

                <div class="mt-4">
                    <div class="row gap-4 d-flex justify-content-between" id="search-result">

                        <?php
                        $rs2 = Database::search("SELECT * FROM `post` INNER JOIN `type` ON `post`.`type_type_id` = `type`.`type_id` ORDER BY `post`.`created_at` DESC");
                        $num = $rs2->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs2->fetch_assoc();


                            ?>
                            <?php include "includes/postList.php" ?>
                            <?php
                        }
                        ?>
                    </div>

                </div>

            </div>

            <div class="col-sm-4 mt-4">
                <h1>featured Articles</h1>
                <div class="border rounded p-2 mt-4">
                    <?php
                    $rs2 = Database::search("SELECT * FROM `post` INNER JOIN `type` ON `post`.`type_type_id` = `type`.`type_id` ORDER BY `post`.`created_at` ASC");
                    $num = $rs->num_rows;

                    for ($i = 0; $i < 2; $i++) {
                        $d = $rs2->fetch_assoc();


                        ?>
                        <div class="card col-lg-12 p-2 shadow mt-2" onclick="postView(<?php echo ($d['id']) ?>);">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="<?php echo ($d['path']); ?>" class="rounded img-fluid">
                                </div>
                                <div class="col-sm-8ms-2">
                                    <div class="tags mt-2">
                                        <div class="type-element btn btn-sm text-dark fw-bold"
                                            data-type-id="<?php echo ($d['type_id']) ?>">
                                            <?php echo ($d['type']) ?>
                                        </div>
                                    </div>
                                    <p class="text"><?php echo $d['created_at'] ?></p>
                                    <h4 class="text fw-bold"><?php echo $d['title']; ?></h4>

                                    <p class="text-truncate text-wrap text-truncate1">
                                        <?php echo htmlspecialchars(strip_tags(htmlspecialchars_decode($d['content']))) ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>

</body>

</html>