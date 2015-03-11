<?php

class CsvToDb {

  private $sFileName;

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

}
