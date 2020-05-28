<?php
$key_search = (isset($_REQUEST['search'])) ? $_REQUEST['search'] : "";
header("location:resultsearch.php?key=$key_search");
?>