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

        <h3 class="text-center mt-5">Preview</h3>
        <div class="container col-sm-12 border p-2 rounded mt-2 d-flex justify-content-center">

        </div>




        <script src="assets/script.js"></script>
    </body>

    </html>

    <?php
} else {
    echo ("Your'e not a admin!");
}
?>