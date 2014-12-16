<?
include("db.class.php");
class Website extends DBBase {

    var $siteId;
    var $javasscript;

    function Website($siteId){
        //initializes
        parent::DBBase();
        $this->siteId=$siteId;

    }
    function CSSButton($text,$link){
        //$_return= "<a href='$link' class=\"basicbutton\"  value='$text'";
        $_return="<form method=post action=\"$link\">";
        $_return.= "<input type=\"submit\" name=submit class=\"basicbutton\" ";
        $_return.="onMouseDown=\"this.className='basicbuttondown'\" ";
        $_return.="onMouseUp=\"this.className='basicbutton'\" ";
        $_return.="onMouseOver=\"this.className='basicbuttonover'\" ";
        $_return.="onMouseOut=\"this.className='basicbutton'\" ";
        //$_return.="onClick=\"javascript:window.location.href='$link';\" ";
        $_return.= "value=\" $text \">\n";
        $_return.="</form>";
        //$_return.=">$text</a";
        return $_return;
    }
    function sideMenu(){
        //echos the side menu
        $run=$this->run("select * from menu where siteKey='$this->siteId' order by priority");
        //echo "select * from menu where siteKey='$this->siteId' order by priority";
        while ($row = mysql_fetch_array($run['result'])) {
            //make css buttons out of db
            echo $this->CSSButton($row['name'],$row['link']);
            echo "<br>";
            

        }
    }
    function getMenuInfo(){
        //echo "test";

        return $run['result'];
    }
    function setSideMenuPos($setting){
        setcookie("sideMenuPos","$setting");
    }
    function getSideMenuPos($cookievars){
          if (strlen($cookievars['sideMenuPos'])<1){
              return "e";
          }
          else {
              return $cookievars['sideMenuPos'];
          }
    }

        





        




}//end of class


