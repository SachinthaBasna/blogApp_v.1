<?php
include "includes/connection.php";
$searchText = $_POST['searchText'];

$rs = Database::search("SELECT * FROM `post` WHERE `title` LIKE '%" . $searchText . "%'");
$num = $rs->num_rows;
?>
<p class="text-center" id="postnum"><span class="fw-bold"><?php echo ($num); ?></span> articles Found</p>
<?php
$searchText = strtolower($searchText);

if (empty($searchText)) {
    $rs2 = Database::search("SELECT * FROM `post` INNER JOIN `type` ON `post`.`type_type_id` = `type`.`type_id` ORDER BY `post`.`created_at` DESC");
    $num2 = $rs2->num_rows;
    for ($i2 = 0; $i2 < $num2; $i2++) {
        $d2 = $rs2->fetch_assoc();
        ?>
        <div class="card col-lg-12 p-2 shadow" onclick="postView(<?php echo ($d2['id']) ?>);">
            <div class="row">
                <div class="col-sm-4">
                    <img src="<?php echo ($d2['path']); ?>" class="rounded img-thumbnail">
                </div>
                <div class="col-sm-8">
                    <div class="tags mt-2">
                        <div class="type-element btn btn-sm text-dark fw-bold" data-type-id="<?php echo ($d2['type_id']) ?>">
                            <?php echo ($d2['type']) ?>
                        </div>
                    </div>
                    <p class="text"><?php echo $d2['created_at'] ?></p>
                    <h4 class="text fw-bold"><?php echo $d2['title']; ?></h4>

                    <p class="text-truncate text-wrap text-truncate1">
                        <?php echo htmlspecialchars(strip_tags(htmlspecialchars_decode($d2['content']))) ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
        ?>
        <div class="card col-lg-12 p-2 shadow" onclick="postView(<?php echo ($d['id']) ?>);">
            <div class="row">
                <div class="col-sm-4">
                    <img src="<?php echo ($d['path']); ?>" class="rounded img-thumbnail">
                </div>
                <div class="col-sm-8">
                    <div class="tags mt-2">
                        <div class="type-element btn btn-sm text-dark fw-bold" data-type-id="<?php echo ($d['type_id']) ?>">
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
}


?>