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
