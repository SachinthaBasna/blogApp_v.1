<?php
include "includes/connection.php";

session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {


    ?>

    <!DOCTYPE html>
    <html data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Blog</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Admin - MyBlog</title>
        <style>
            .editable-div {
                border: 1px solid #ccc;
                padding: 10px;
                min-height: 100px;
                /* Optional: Set minimum height */
                overflow-y: auto;
                /* Optional: Add scrollbars if content overflows */
            }
        </style>
    </head>

    <body>
        <div class="container border p-5 rounded mt-2">
            <h2 class="text-center fw-bold">Create New Post</h2>
            <div class="row  d-flex">
                <div class="col-sm-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" id="title">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">author</label>
                    <input type="text" class="form-control" id="author">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" id="img">
                </div>

                <div class="col-sm-6">
                    <label class="form-label">Type</label>
                    <div class="col-sm-12">
                        <select class="form-control">
                            <option value="0">Select article Type</option>
                            <?php
                            $rsType = Database::search("SELECT * FROM `post`");
                            $numType = $rsType->num_rows;

                            for ($i = 0; $i < $numType; $i++) {
                                $row = $rs->fetch_assoc();
                                ?>
                                <option value=""><?php echo $row['type'] ?></option>
                                <?php
                            }

                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <label class="form-label">Content</label>
                <textarea maxlength="5000" class="form-control" rows="15" id="content"></textarea>
            </div>



            <div class="d-flex justify-content-end">
                <div class="mt-2">
                    <button class="btn btn-warning" onclick="publishPost();">Publish</button>
                </div>
            </div>
        </div>










        <!-- Edit article  -->
        <h3 class="text-center mt-5">Edit Created Posts</h3>



        <div class="container border rounded p-4" style="height: 100vh;">
            <div class="d-flex justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <select class="form-select" id="select">
                            <option value="0">Select Article</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `post`");
                            $num = $rs->num_rows;
                            // echo($num);
                        

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();

                                ?>

                                <option value="<?php echo $d['id']; ?>"><?php echo $d['title']; ?></option>


                                <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="col-3">

                        <button class="btn btn-warning" onclick="selectPost();">Select</button>
                    </div>
                </div>
            </div>

            <div class="" id="editPostSection">

                <?php
                $rs2 = Database::search("SELECT * FROM `post` WHERE `id` = '" . $d['id'] . "'");
                $num2 = $rs2->num_rows;
                // echo($num);
            

                for ($i = 0; $i < $num2; $i++) {
                    $d2 = $rs2->fetch_assoc();

                    ?>




                    <div class="row  d-flex">
                        <div class="col-sm-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" value="<?php echo $d2['title'] ?>">
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">author</label>
                            <input type="text" class="form-control" id="edAuthor" value="<?php echo $d2['author'] ?>">
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" id="edImg">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label class="form-label">Content</label>
                        <textarea maxlength="5000" class="form-control" rows="15" id="edContent"></textarea>
                    </div>



                    <div class="d-flex justify-content-end">
                        <div class="mt-2">
                            <button class="btn btn-warning" onclick="publishPost();">Update Post</button>
                        </div>
                    </div>


                    <?php
                }
                ?>
            </div>
        </div>


        <script src="assets/script.js"></script>
        <script>
            function selectPost() {

                var id = document.getElementById('select');
                alert(id.value);
                // alert("Ok");
                document.getElementById('editPostSection').className = "d-block";
                var edTitle = document.getElementById('edTitle');
                var edImg = document.getElementById('edImg');
                var edAuthor = document.getElementById('edAuthor');
                var edContent = document.getElementById('edContent');

                var xhttp = new XMLHttpRequest();
                var formData = new FormData();

                formData.append("edTitle", title.value);
                formData.append("edTitle", author.value);
                formData.append("edTitle", content.value);
                formData.append("edTitle", title.value);


                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        // alert("OK");
                        document.getElementById('editPostSection').innerHTML = xhttp.responseText;
                    }
                };

                xhttp.open("POST", "includes/editPostProcess.php", true);
                xhttp.send(formData);

            }
        </script>
    </body>

    </html>

    <?php
} else {
    echo ("Your'e not a admin!");
}
?>