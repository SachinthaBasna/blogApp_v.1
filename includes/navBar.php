<link rel="stylesheet" href="assets/style.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="./index.php"><img src="resources/Logo.png" height="28px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5 gap-5">
                <li class="nav-item rounded p-1 mt-2" style="background: #B1EF42;">
                    <a class="nav-link active text-dark" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-2" href="./blog.php">Articles</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link mt-2" href="./about.php">about</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link mt-2" href="./contact.php">Contact us</a>
                </li>
            </ul>

            <div class="d-flex justify-content-end mt-2">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search" style="border:2px solid #B1EF42; color: #B1EF42;" oninput="searchPost()">
                <a href="#search-result"><button class="btn" onclick="searchPost();" style="background:#B1EF42; color: black;">Search</button></a>
            </div>

        </div>
    </div>
</nav>