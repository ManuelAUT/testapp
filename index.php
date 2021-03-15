<html>
<head>
<link href="//amp.azure.net/libs/amp/latest/skins/amp-default/azuremediaplayer.min.css" rel="stylesheet">
<script src= "//amp.azure.net/libs/amp/latest/azuremediaplayer.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>
<body>
<?php
$servername = "ringmysql.mysql.database.azure.com";
$username = "student@ringmysql";
$password = "asdf1234.";
$dbname = "Products";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, bezeichnung, thumbnail, langbeschreibung FROM Products");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		echo  "<div class='container'>".
		      "<h1 class='my-4'>".
		      "</h1>".

		      "<div class='row'>";
		while($row = $stmt->fetch()) {
		echo "<div class='col-lg-6 mb-4'>".
		     "<div class='card h-100'>".

		     "<a href='#'><img class='card-img-top' src='" . $row['thumbnail'] . "' width=700 height=400 alt=''></a>".
		     "<div class='card-body'>".
		     "<h4 class='card-title'>".
		     "<p>" . htmlspecialchars($row['bezeichnung'], ENT_QUOTES, 'UTF-8') . "</p>".
		     "</h4>".
         "<p class='card-text'>".
         "<p>" . htmlspecialchars($row['langbeschreibung'], ENT_QUOTES, 'UTF-8') . "</p> ".
         "<form action='buy.php' method='post'>".
		     "<input type='hidden' name='artnr' value=" . $row['id'] . ">".
         "<div class='form-group'>".
         "<label for='menge'>Menge</label>".
         "<input type='number' name='menge' class='form-control' id='menge' placeholder='Menge eingeben'>".
         "</div>".
         "<div class='form-group'>".
         "<label for='comment'>Kommentar</label>".
         "<input type='text' name='comment' class='form-control' id='comment' placeholder='Kommentar eingeben'>".
         "</div>".
         "<button type='submit' class='btn btn-primary'>Buy</button>".
         "</form>".
         "</p>".
		     "</div>".
		     "</div>".
		     "</div>";
		}
echo "</div>";

}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
echo "</table>";
$conn = null;
?>
<div class='container'>
<video id="vid1" class="azuremediaplayer amp-default-skin" autoplay controls width="1280" height="720"
        poster="" data-setup='{"nativeControlsForTouch": false}'>
        <source
          src="http://ringmedia-frct1.streaming.media.azure.net/0f21d862-4f24-4115-9f2e-c15cc5f1868a/smogfreering.ism/manifest"
          type="application/vnd.ms-sstr+xml" />
        <p class="amp-no-js">
          To view this video please enable JavaScript, and consider upgrading to a web browser that supports HTML5 video
        </p>
</video>
</div>
</body>
</html>
