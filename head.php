<?
if (!class_exists("DBBase")) {
   include("objects/db.class.php");
}
if (!class_exists("Stock")){
   include("objects/stock.class.php");
}
if (!class_exists("User")){
   //include("objects/user.class.php");
}
include("objects/portfolio.class.php");
//head.php
//echo $title;
/*if ((!eregi("Home",$title) && !eregi("Research",$title)) && !$HTTP_COOKIE_VARS["gtsficg-user"]){
    //if not logged in redirect
    header("Location: index.php");
} */
echo "<html>\n";
echo "<head>\n";
echo "\t<title>$title--GT Investment Challenge</title>\n";

echo "<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\">";


?>
</head>
<body>
<div id="head"></div>

<div id="menu" style="position:absolute;top:80;background:#265aa6;">
<!--Home
Manage
Research
Competition
IC Home-->
<span class="mleft"></span>
				<div class="box"><a href="index.php">Home</a></div><div class="boxx"><div class="boxx1"></div><div class="boxx2"></div><div class="boxx3"></div><div class="boxx4"></div><div class="boxx5"></div><div class="boxx6"></div><div class="boxx7"></div><div class="boxx8"></div></div>
				<div class="box"><a href="manage.php">Manage</a></div><div class="boxx"><div class="boxx1"></div><div class="boxx2"></div><div class="boxx3"></div><div class="boxx4"></div><div class="boxx5"></div><div class="boxx6"></div><div class="boxx7"></div><div class="boxx8"></div></div>
				<div class="box"><a href="research.php">Research</a></div><div class="boxx"><div class="boxx1"></div><div class="boxx2"></div><div class="boxx3"></div><div class="boxx4"></div><div class="boxx5"></div><div class="boxx6"></div><div class="boxx7"></div><div class="boxx8"></div></div>
                <div class="box"><a href="competition.php">Competition</a></div><div class="boxx"><div class="boxx1"></div><div class="boxx2"></div><div class="boxx3"></div><div class="boxx4"></div><div class="boxx5"></div><div class="boxx6"></div><div class="boxx7"></div><div class="boxx8"></div></div>
				<div class="box"><a href="http://gtsf.gatech.edu/ic/">IC Home</a></div>
				<span class="mright"></span>

</div>



<div id="content">



