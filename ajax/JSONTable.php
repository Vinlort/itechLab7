<?php
require_once "../request.php";
require_once "../ConnectionFactory.php";
require_once "../functions.php";

try
{
  $sth = $dbh->prepare(SQL_SELECT_COUNT_OF_WORKERS);
  $sth->execute([$_GET['selectCountOfWorkers']]);
  $data = $sth->fetchAll();
} catch (PDOException $ex)
{
  $data = [];
  echo $ex->GetMessage();
}

$jsonStr = json_encode($data);
echo $jsonStr;
 ?>
