<?
//check username with users object
//if good
include("objects/db.class.php");
include("objects/user.class.php");
//echo "test";
$myUser= new User();


 $userID=$myUser->login($user,md5($pass));

if ($userID>0){
    setcookie("gtsficg-user",$userID,time()+999999);
    include("manage.php");
    //echo "<META HTTP-EQUIV=REFRESH CONTENT=\"1;\" URL=\"manage.php\">";
}
else {
    //if bad
    $error="<center><font color=red>Login not accepted</font></center>";
    include("index.php");
}
