<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$con = mysql_connect($servername, $username, $password);
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbname, $con);


$id = $_GET['id'];


// determine if short url is valid
$query = "SELECT orig FROM shorturl WHERE short = '". $id ."'";

$result = mysql_query($query) or die ("Error in query: $query " . mysql_error());
$row = mysql_fetch_array($result);
$url = $row['orig'];
$num_results = mysql_num_rows($result);

if ( $num_results > 0  ) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ". $url );
	exit;
} else {header("Location: ". "http://iamds.tk/u/" );
    // redirect to submit page or short URL not found page.
}
mysql_close($con);
?>
