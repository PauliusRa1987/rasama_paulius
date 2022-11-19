<?php
session_start();
require __DIR__. '/InputHandler.php';
require __DIR__. '/TaxCalculator.php';
require __DIR__. '/OutputHandler.php';
require __DIR__. '/MainClass.php';
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    InutHandler::getIncome($_POST['income']??0);
    $_SESSION['income'] = $_POST['income']??0;
    InutHandler::getAdditional($_POST['additional']??0);
    $_SESSION['additional'] = $_POST['additional']??0;
    InutHandler::getExemption($_POST['exemption']??0);
    $_SESSION['exemption'] = $_POST['exemption']??0;
    $main = new MainClass;
    $main->main();
    $_SESSION['main'] = serialize($main)  ?? 0;
    header('Location: http://localhost/rasama_paulius/');
    die;
}
if (isset($_SESSION['income'])) {
    $inc = $_SESSION['income'];
    $add = $_SESSION['additional'];
    $exep = $_SESSION['exemption'];
    $main = $_SESSION['main'];
    $main =unserialize($main);
    unset($_SESSION['income'], $_SESSION['additional'], $_SESSION['exemption'], $_SESSION['main']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NordSwitch</title>
</head>
<body>
<h2>You must pay: <?= $main->tax ?? 0 ?></h2>
<form action="" method="post">
  <label for="income">Income:</label><br>
  <input type="text" id="income" name="income" value="<?= $inc ?? '' ?>" required><br>
  <label for="additional">Additional income:</label><br>
  <input type="text" id="additional" name="additional" value="<?= $add ?? '' ?>" required><br>
  <label for="exemption">Tax exemption:</label><br>
  <input type="text" id="exemption" name="exemption" value="<?= $exep ?? '' ?>" required><br><br>
  <input type="submit" value="Submit">
</form><br> 
<form style="display: inline;" action="http://localhost/rasama_paulius/" method="get">
<input  type="submit" value="QUIT">
</form> 
</body>
</html>