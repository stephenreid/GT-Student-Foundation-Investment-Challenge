 <?
$title="Home";
include("head.php");
?>
<center><h1>Welcome to the Georgia Tech Student Foundation's Investment Challenge.<h1></center>
<?
echo $error;
?>
<p>&nbsp;&nbsp; Think you have what it takes to be a big time investor? Think you can beat the hedge funds?
Positive you can beat the market? Why not give it a try?
</p>
<p>&nbsp;&nbsp;The Student foundation is offering this challenge to find the
people on campus with the best investing skill (or luck). You could win free prizes!
There will be a competition every month to find the best of the best, starting in
March 2006.
</p>
<p>&nbsp;&nbsp;The goal of this site is to encourage students to try
investing and to try the investments commmittee at Georgia Tech while also
provided valuable research information for users.
</p>
<?
//check for cookie before displaying this box
if (!$HTTP_COOKIE_VARS["gtsficg-user"])
{
    echo "<div id='loginForm' style=\"font-color:black;\">";
    echo "<form action=login.php method=post>";
    echo "<table border=0 bgcolor=#cccccc>";
    echo "<tr bgcolor=white><td><font color=black>Username:</td><td><input type=text name=user></tr>";
    echo "<tr bgcolor=white><td><font color=black>Password:</td><td><input type=password name=pass></td></tr>";
    echo "<tr><td></td><td><input type=submit value=\"Login\"></td></tr>";
    echo "</table>";
    echo "</div>";
}

