<?php

require_once "classes/CsvToDb.php";

$sFileName = "data.csv";

$oCsvToDb = new CsvToDb($sFileName);

$sContents = $oCsvToDb->getContents();

$aCsvRows = $oCsvToDb->parseCsv($sContents);

var_Dump($aCsvRows);
