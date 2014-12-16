<?
getSector("Symbol")
{
    //getSector.php
    //@symbol

    $fileurl="http://finance.yahoo.com/q/pr?s=$symbol";
    //not supported in < 4 $file=file_get_contents("$fileurl");
    $fileA=file($fileurl);
    foreach ($fileA as $line) {
        $file.=$line;
    }
    $sectorPos=strpos($file,"Sector:");
    $sector=substr($file,$sectorPos+88,strpos($file,"</a>",$sectorPos+88)-($sectorPos+88));
    return $sector;
}
