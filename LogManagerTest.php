<html>
<head>
</head>
<body>
<?php
require_once(__DIR__.'\libraries\LogManager.php');

echo "Instance log Manager </br>";
$logManager = new LogManager();

$logManager->appendfile("LogManager Test", "Probando");

echo "Write in the log";
?>
</html>