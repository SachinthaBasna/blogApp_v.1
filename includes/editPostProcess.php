<?php
include "connection.php";

$postId = $_POST['id'];
// echo($postId);

$rs2 = Database::search("SELECT * FROM `post` WHERE `id` = '" . $postId . "'");
// echo($num);

$d2 = $rs2->fetch_assoc();

if ($d2) {


    ?>




    <div class="row d-flex">
        <div class="col-sm-6">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" value="<?php echo $d2['title'] ?>" id="edTitle">
        </div>

        <div class="col-sm-6">
            <label class="form-label">author</label>
            <input type="text" class="form-control" value="<?php echo $d2['author'] ?>" id="edAuthor">
        </div>


        <div class="col-sm-12 row mt-2">
            <div class="col-sm-2">
                <img src="<?php echo $d2['path'] ?>" class="img-thumbnail">
            </div>
            <div class="col-sm-6">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" value="<?php echo $d2['path'] ?>" id="edImg">
            </div>
        </div>
    </div>

    <div class="col-sm-12 mt-2">
        <label class="form-label">Content</label>
        <textarea class="form-control" rows="15" id="edContent"><?php echo $d2['content'] ?></textarea>
    </div>



    <div class="d-flex justify-content-end">
        <div class="mt-2">
            <button class="btn btn-warning" onclick="updatePost(<?php echo $d2['id'] ?>);">Update Post</button>
        </div>
    </div>


    <?php
}
?>

