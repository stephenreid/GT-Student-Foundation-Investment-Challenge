<?
$title="Sell";
include("head.php");
//list holding with a bullet to sell

$myPort=new Portfolio("1");
$portfolio=$myPort->makePortfolio();
echo "<form name=sell action=sell.php method=post>";
echo "<table>\n";
foreach($portfolio as $line){
    echo "\t<tr align=center>\n";

    $index++;
    if ($index>1){
        echo "\n\t<td><input type=radio value=\"".$line[1]."\" name=sellSymbol ></td>";
        echo "\n\t<td><input type=\"text\" size=\"4\" name=\"percent\" onBlur=\"if (document.sell.percent.value>100){alert(\"percent error\");}\"></td>";
        echo "\n\t<td><input type=text size=4 name=cash></td>";
    }
    else {
        echo "\n\t<td>Select</td>";
        echo "\n\t<td>Sell Percent</td>";
        echo "\n\t<td>Sell Shares</td>";
    }
    foreach ($line as $column){
        echo "\n\t<td>$column</td>";
    }
    echo "</tr>";
}
/*$myPort=new Portfolio("1");
$portfolio=$myPort->makePortfolio();

foreach($portfolio as $line){
    echo "<tr align=center>";
    //echo "<td><input type=radio value=\"".$line[1]."\" name=sellSymbol ></td>";
    foreach ($line as $column){
        echo "<td>$column</td>";
    }
    echo "</tr>";
}
*/

include("foot.php");
