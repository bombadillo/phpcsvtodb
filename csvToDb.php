<?php

require_once "classes/CsvToDb.php";

$sCurrentDate = date("ymd");

$sFileName = "data.csv";

$oCsvToDb = new CsvToDb($sFileName);
$oCsvToDb->sTableName = "ims.fault_reply";

$sContents = $oCsvToDb->getContents();

$aCsvRows = $oCsvToDb->parseCsv($sContents);

$bWritten = $oCsvToDb->writeArrayToDb($aCsvRows);
