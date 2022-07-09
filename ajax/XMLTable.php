<?php
require_once "../request.php";
require_once "../ConnectionFactory.php";
require_once "../functions.php";

  try
  {
    $sth = $dbh->prepare(SQL_SELECT_TIME_OF_WORK);
    $sth->execute([$_POST['selectWorkTime']]);
    $data = $sth->fetchAll();
  } catch (PDOException $ex)
  {
    $data = [];
    echo $ex->GetMessage();
  }

  $xml = new DomDocument('1.0','utf-8');
  $xml->formatOutput = true;
  $xmlItems = $xml->appendChild($xml->createElement('items'));
  foreach ($data as $d){
      $xmlItem = $xmlItems->appendChild($xml->createElement('item'));
      foreach ($d as $key => $val){
          $xmlName = $xmlItem->appendChild($xml->createElement("Time"));
          $xmlName->appendChild($xml->createTextNode($val));
      }
  }
  $xml->save('../xml/file1.xml');
 ?>
