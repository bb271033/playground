<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transactions</title>
    <link rel="shortcut icon" href="../favicon.ico" />
    <link rel="stylesheet" href="../assets/css/w3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/themes/default/jquery.mobile.flatui.css" />
    <link rel="stylesheet" href="../css/themes/default/jquery.mobile-1.4.5.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/screen.css" />
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.mobile-1.4.5.min.js"></script>
    <script src="../js/index.js"></script>
	<style>
	/* Reduce the height of the header on smaller screens. */
	@media all and (max-width: 48em){
		.ui-popup .ui-title {
			font-size: .75em;
		}
	}
	</style>
</head>

<body>
    <div data-role="page" id="trans-page" data-title="Transactions">
        <div data-role="header" data-position="fixed" class="w3-black">
            <h1 class="w3-sriracha">Transactions</h1>
        </div>
        <div role="main" class="ui-content">
            <ul data-role="listview" class="w3-ul">
                <?php
include(__DIR__.'/../Rundiz/Thaidate/Thaidate.php'); 
include(__DIR__.'/../Rundiz/Thaidate/thaidate-functions.php');
$dir = __DIR__.'/../settings/conn.php';
if(file_exists($dir)){
	include($dir);
                    $database = new Database();
                    $conn = $database->getConnection();
                    $sql = "SELECT a.id, a.day, a.details, b.diary_transaction_name, a.amount, a.path FROM diary a, diary_transaction b WHERE a.diary_transaction_id=b.diary_transaction_id ORDER BY a.day;";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_object()){
$id = $row->id;
$day = strtotime($row->day);
$dated = thaidate('j M y', $day);
$detail = $row->details;
$tran = $row->diary_transaction_name;
if($tran === "ยืม"){
	$color_text = "red";
}
else if($tran === "คืน") $color_text = "blue";

$amount = number_format(abs($row->amount));
                        echo '<li>';
echo "<a href='#' class='trans' id='mon$id'>";
if($row->path){
	echo  "<img src='../photos/$row->path' alt='$detail' />";
} else{
	echo "";
}
echo "<h2 class='w3-text-$color_text'>$tran $amount บาท</h2>";
echo "<p>".$dated."&nbsp; - &nbsp;".$detail."</p>";
echo '</a>';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>