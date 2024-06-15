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
    $rs2 = Database::search("SELECT * FROM `post`");
    $num2 = $rs2->num_rows;
    for ($i2 = 0; $i2 < $num2; $i2++) {
        $d2 = $rs2->fetch_assoc();
        ?>
        <div class="card col-lg-3 p-2 shadow" onclick="postView(<?php echo ($d2['id']) ?>);">
            <img src="<?php echo ($d2['path']); ?>" class="rounded-top">
            <p class="text-center"><?php echo $d2['created_at'] ?></p>
            <h4 class="text-center fw-bold"><?php echo $d2['title']; ?></h4>
            <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore. Lorem ipsum
                dolor sit amet consectetur.</p>
            <button class="btn btn-primary">Read Full article</button>
        </div>
        <?php
    }
} else {
    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
        ?>
        <div class="card col-lg-3 p-2 shadow" onclick="postView(<?php echo ($d['id']) ?>);">
            <img src="<?php echo ($d['path']); ?>" class="rounded-top">
            <p class="text-center"><?php echo $d['created_at'] ?></p>
            <h4 class="text-center fw-bold"><?php echo $d['title']; ?></h4>
            <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore. Lorem ipsum
                dolor sit amet consectetur.</p>
            <button class="btn btn-primary">Read Full article</button>
        </div>
        <?php
    }
}


?>