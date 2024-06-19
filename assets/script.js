// Admin SignIn
function signIn() {
  // alert("OK");

  var uname = document.getElementById("un");
  var password = document.getElementById("pw");

  var fd = new FormData();

  fd.append("un", uname.value);
  fd.append("pw", password.value);

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var response = xhttp.responseText;
      alert(response);
      uname = "";
      password = "";
      window.location = "./adminDashboard.php";
    }
  };

  xhttp.open("POST", "./includes/adminSignInProcess.php", true);
  xhttp.send(fd);
}

// Publish post
function publishPost() {
  // alert("Wada machan");

  var title = document.getElementById("title");
  var author = document.getElementById("author");
  var img = document.getElementById("img");
  var content = document.getElementById("content");

  // Calculate Current Date
  var date = new Date();
  var dd = date.getDate();
  var mm = date.getMonth() + 1;

  if (dd < 10) {
    dd = "0" + dd;
  }

  if (mm < 10) {
    mm = "0" + mm;
  }

  var yyyy = date.getFullYear();
  date = yyyy + "-" + mm + "-" + dd;

  // alert(date);

  var fd = new FormData();

  fd.append("title", title.value);
  fd.append("date", date);
  fd.append("content", content.value);
  fd.append("author", author.value);

  fd.append("img", img.files[0]);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var response = xhttp.responseText;
      alert(response);
    }
  };

  xhttp.open("POST", "./publishPostProcess.php", true);
  xhttp.send(fd);
}

// Post View
function postView(x) {
  var postId = x;
  // alert(x);
  // alert("OK")

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var response = xhttp.responseText;
      window.location = "./post.php?pid=" + postId;
    }
  };

  xhttp.open("GET", "./post.php?pid=" + postId, true);
  xhttp.send();
}

function searchPost() {
  // alert("OK");
  var searchText = document.getElementById("search");

  var xhttp = new XMLHttpRequest();
  var f = new FormData();
  f.append("searchText", searchText.value);

  xhttp.onreadystatechange = function () {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      // alert("OK");
      var response = xhttp.responseText;

      if (response == "nosearch") {
        location.reload();
      } else {
        document.getElementById("search-result").innerHTML = response;
      }
    }
  };

  xhttp.open("POST", "./searchProcess.php", true);
  xhttp.send(f);
}

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

function updatePost(x) {
  // alert("OK");

  var id = x;

  var edTitle = document.getElementById("edTitle");
  var edAuthor = document.getElementById("edAuthor");
  var edImg = document.getElementById("edImg");
  var edContent = document.getElementById("edContent");
  
  // alert(id);
  // console.log(edTitle.value);
  // console.log(edAuthor.value);
  // console.log(edContent.value);
  // console.log(edImg.value);

  var formData = new FormData();

  formData.append("edtitle", edTitle.value);
  formData.append("edAuthor", edAuthor.value);
  formData.append("edImg", edImg);
  formData.append("edContent", edContent.value);
  formData.append("id", id);

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      // alert("wada");
      var response = xhttp.responseText;
      alert(response);
    }
  };

  xhttp.open("POST", "./includes/updatePostProcess.php");
  xhttp.send(formData);
}
