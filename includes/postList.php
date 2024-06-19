<?php
$rs2 = Database::search("SELECT * FROM `post` INNER JOIN `type` ON `post`.`type_type_id` = `type`.`type_id` ORDER BY `post`.`created_at` DESC");
$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs2->fetch_assoc();


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

    <script>

        function changeColor() {
            const typeElements = document.querySelectorAll(".type-element"); // Select all elements with class 'type-element'

            typeElements.forEach((element) => {
                const typeId = element.getAttribute("data-type-id"); // Get the 'data-type-id' attribute value

                if (typeId === "1") {
                    element.className = "type-element btn btn-sm text-light fw-bold";
                    element.style = "background: #3498db;";
                } else if (typeId === "2") {
                    element.className = "type-element btn btn-sm text-dark fw-bold";
                    element.style = "background: #27ae60;";
                } else if (typeId === "3") {
                    element.className = "type-element btn btn-sm text-light fw-bold";
                    element.style = "background: #9b59b6;";
                } else if (typeId === "4") {
                    element.className = "type-element btn btn-sm text-dark fw-bold";
                    element.style = "background: #e74c3c;";
                } else if (typeId === "5") {
                    element.className = "type-element btn btn-sm text-light fw-bold";
                    element.style = "background: #f39c12;";
                } else if (typeId === "6") {
                    element.className = "type-element btn btn-sm text-light fw-bold";
                    element.style = "background: #16a085 ;";
                } else {
                    // Default styling if no specific condition matches
                    element.className = "type-element btn btn-sm text-light fw-bold";
                    element.style = "background: #2c3e50  ;";
                }
            });
        }

        changeColor();
    </script>
    <?php
}
?>