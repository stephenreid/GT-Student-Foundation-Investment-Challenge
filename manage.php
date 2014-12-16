<?
$title="Manage Virtual Portfolio";
include("head.php");
echo "<center><input type=submit value='Buy'><input type=submit value='Sell'></center>";
//display portfolio
//display sector analysis
$myPort=new Portfolio("1");
$portfolio=$myPort->makePortfolio();
echo "<table>";
foreach($portfolio as $line){
    echo "<tr align=center>";
    foreach ($line as $column){
        echo "<td>$column</td>";
    }
    echo "</tr>";
}

include("foot.php");
