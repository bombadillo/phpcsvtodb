<?php

class CsvToDb {

  private $sFileName;

  public $sTableName;

  function __construct($sFileName) {
    $this->sFileName = $sFileName;
  }

  public function getContents() {
    $sContents = file_get_contents($this->sFileName);

    return $sContents;
  }

  public function parseCsv($sContents) {

    $your_array = explode("\n", $sContents);

    return $your_array;
  }

  public function writeArrayToDb($aData) {

    $this->connectToDb();

    foreach ($aData as $line) {
      $sLineParsed = $this->getLineItems($line);

      if (!$sLineParsed) continue;

      $sSql = "INSERT INTO $this->sTableName " .
              "VALUES ($sLineParsed)";
              echo $sSql . PHP_EOL;

      $result = mysql_query($sSql) or die(mysql_error());
    }
  }

  private function connectToDb() {

    $this->con = mysql_connect(DB_MYSQL_HOST,DB_MYSQL_USER,DB_MYSQL_PASS,false,128);
    mysql_select_db("ims",$this->con);
  }

  private function getLineItems($line) {

    $aLineItems = explode(",", $line);

    if (count($aLineItems) < 2) return false;

    $sValues = "";

    foreach ($aLineItems as $value) {
      if (is_string($value)) {
         $sValues .= ",'$value'";
      } else {
        $sValues .= ", $value";
      }
    }

    $sValues = substr($sValues, 1);

    return $sValues;
  }
}
