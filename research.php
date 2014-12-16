<?
$title="Research";
include("head.php");


//market status
$marketStatus="Open";
if (date("n")>6 || date("G")<9 || date("G")>16)
   $marketStatus="Closed";
echo "<u>".date("D M j G:i:s  Y")." U.S. Marekts $marketStatus</u><br>";


if($symbol){
    //
    $myStock=new Stock($symbol);

    echo $myStock->getPrice();
    echo $myStock->analyst();
}
else {
    //display some rearch info
    echo "<img src='http://ichart.yahoo.com/t?s=^NSEI'>";
    echo "<img src='http://ichart.yahoo.com/t?s=^IXIC'>";
    
    
}

echo "<div id='symbol'><form action=research.php method=post>Stock Symbol <input type=text size=5 name=symbol><input type=submit value-'Go'></form></div>";


include("foot.php");
