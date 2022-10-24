<?php

$date=date_create("2008-01-02");
$date1=date_create("2025-06-14");

while ($date <= $date1) {
	$result= date_add($date,date_interval_create_from_date_string("6 month"));
	echo date_format($date,"Y-m-d")."<br>";

}
while ($result != $date) {
	date_add($result,date_interval_create_from_date_string("1 year"));
	echo date_format($result, "Y-m-d")."<br>";
}

?>
<?php
$date=date_create("2008-01-02");
$date1=date_create("2025-06-14");

while ($date <= $date1) {
	date_add($date,date_interval_create_from_date_string("6 month"));
	echo date_format($date,"Y")."<br>";
}
?>
