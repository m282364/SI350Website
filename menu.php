<?php 
session_start();

$id = session_id();

$loggedin = isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] === true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<meta charset="utf-8">
<meta name="author" content="Melania Gonzalez">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View our Menu</title>
<link type="text/css" rel="stylesheet" href="styles.css">
<style>
    .table-container { margin-top: 30px; }
    tbody tr { cursor: pointer; }
    .food-thumb {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
    }
    td { vertical-align: middle; }
</style>
</head>
<body>

<?php if($loggedin): ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img src="images/LOGO.png", width = 200px, height = 200px, padding=20px>
    <a class="navbar-brand" href="http://midn.cs.usna.edu/~m282364/SI350/Lab07/index.php">21st Company</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/~m282364/SI350/Lab07/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/~m282364/SI350/Lab07/requestReport.php">Request Report</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/~m282364/SI350/Lab07/schedule.php">Training Schedule </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/~m282364/SI350/Lab07/logout.php">Log Out</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/~m282364/SI350/Lab07/grid.html">Check out FlexBox & Grid</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php else: ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <div class="container-fluid">
    <img src="images/LOGO.png", width = 200px, height = 200px, padding=20px>
    <a class="navbar-brand" href="http://midn.cs.usna.edu/~m282364/SI350/Lab07/index.php">21st Company</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/~m282364/SI350/Lab07/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/~m282364/SI350/Lab07/registration.php">Register</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/~m282364/SI350/Lab07/schedule.php">Training Schedule </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/~m282364/SI350/Lab07/login.php">Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/~m282364/SI350/Lab07/grid.html">Check out FlexBox & Grid</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php endif; ?>

<div class="container" style="padding-top: 20px;">
    <div class="mb-3">
        <label for="menuSearchBox" class="form-label">Search for a Menu Item:</label>
        <input type="text" id="menuSearchBox" class="form-control" style="width: 400px;" onkeyup="showHint()" placeholder="Enter dish name or category...">
    </div>

    <div class="table-container">
        <h4>Menu Results <small class="text-muted">(Click a row to add)</small></h4>
        <table id="searchTable" class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th style="width: 200px;">Image</th>
                    <th>Item</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody id="searchBody"></tbody>
        </table>
    </div>

    <div class="table-container">
        <h4>Items I am Interested In <small class="text-muted">(Click a row to remove)</small></h4>
        <table id="selectedTable" class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th style="width: 200px;">Image</th>
                    <th>Item</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody id="selectedBody"></tbody>
        </table>
    </div>
</div>

<script>
    let selectedItems = [];

    function addRowToSelectedTable(itemName, category, imageUrl) {
        const selectedBody = document.getElementById("selectedBody");
        const row = document.createElement("tr");
        const imgHtml = imageUrl 
            ? `<img src="${imageUrl}" alt="${itemName}" class="food-thumb" onerror="this.style.display='none'">` 
            : "";

        row.innerHTML = `
            <td>${imgHtml}</td>
            <td>${itemName}</td>
            <td>${category}</td>
        `;
        row.onclick = function() {
            selectedItems = selectedItems.filter(item => item !== itemName);
            row.remove();
            showHint();
        };
        selectedBody.appendChild(row);
    }

    function showHint() {
        const inputValue = document.getElementById("menuSearchBox").value.trim().toLowerCase();
        const searchBody = document.getElementById("searchBody");

        if (inputValue === "") {
            searchBody.innerHTML = "";
            return;
        }

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            let menuData;
            try {
                menuData = JSON.parse(xhttp.responseText);
            } catch (e) {
                console.error("Invalid JSON from part0.php:", xhttp.responseText);
                return;
            }

            searchBody.innerHTML = "";
            const entries = Array.isArray(menuData) ? menuData : Object.values(menuData);

            entries.forEach(function(entry) {
                let itemName = "";
                let category = "";
                let imageUrl = "";

                if (Array.isArray(entry)) {
                    category = (entry[0] || "").trim();
                    itemName = (entry[1] || "").trim();
                    imageUrl = (entry[4] || "").trim();
                } else if (typeof entry === "object" && entry !== null) {
                    const cleanEntry = {};
                    Object.keys(entry).forEach(k => {
                        cleanEntry[k.trim().replace(/^\uFEFF/, '').toLowerCase()] = String(entry[k]).trim();
                    });
                    itemName = cleanEntry["name"] || "";
                    category = cleanEntry["category"] || "";
                    imageUrl = cleanEntry["image"] || "";
                }

                if (!itemName || itemName.toLowerCase() === "name" || selectedItems.includes(itemName)) {
                    return;
                }

                if (itemName.toLowerCase().includes(inputValue) || category.toLowerCase().includes(inputValue)) {
                    const row = document.createElement("tr");
                    const imgHtml = imageUrl 
                        ? `<img src="${imageUrl}" alt="${itemName}" class="food-thumb" onerror="this.style.display='none'">` 
                        : "";

                    row.innerHTML = `
                        <td>${imgHtml}</td>
                        <td><strong>${itemName}</strong></td>
                        <td>${category}</td>
                    `;
                    row.onclick = function() {
                        if (!selectedItems.includes(itemName)) {
                            selectedItems.push(itemName);
                            addRowToSelectedTable(itemName, category, imageUrl);
                            row.remove();
                        }
                    };
                    searchBody.appendChild(row);
                }
            });
        };
        xhttp.open("GET", "part0.php?q=" + encodeURIComponent(inputValue));
        xhttp.send();
    }
</script>
</body>
</html>
