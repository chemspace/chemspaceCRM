<?php // ChemSpaceCRM application "index"
error_reporting(-1); // Report all PHP errors
ini_set("display_errors", 1);

$startTime = microtime(true);

define("SYSTEM_INCLUDE_PATH", '');
require_once(SYSTEM_INCLUDE_PATH . 'include/config.php');

ob_start();

require_once(SYSTEM_INCLUDE_PATH . 'include/application.php');
$app = ChemSpaceApplication::getInstance();
$app->connect($db);

$result = $app->db->query("SELECT id FROM contacts");
$row = $result->fetch_assoc();
echo '<br>ID fetched: <b>' . htmlentities($row['id']) . '</b>';


$app->finish();
echo '<br>TOTAL time: ' . (microtime(true) - $startTime);
?>