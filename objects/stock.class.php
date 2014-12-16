<?

class Stock extends DBBase {

    var $price;
    var $symbol;
    var $name;
    var $date;
    var $price2earnings;
    var $change;
    var $annualizedGain;
    var $OneYearTarget;
    var $marketCap;
    var $time;
    var $dividendPshare;
    var $divDate;
    var$exDiv;

    function Stock($symbol){
        //initializes
        parent::DBBase();
        $this->sybol=$symbol;
        //download yahoo price info
        //$file="http://finance.yahoo.com/dquotes.csv?s=$stocks&f=snd1r2k2g3t8j1qr1d&e=.csv";
        $file=file("http://finance.yahoo.com/d/quotes.csv?s=$symbol&f=snk1r2&e=.csv");
        //AAPL	APPLE COMPUTER	6:18pm - <b>67.65</b>	36.49

        foreach ($file as $line)
        {
            //symbol,name,date,price - time,p/e, change
            @list ($this->symbol,$this->name,$price,$this->date,$this->price2earnings,$this->change,$this->annaulizedgain,$this->OneYearTarget,$this->marketCap,$this->exDiv,$this->divDate,$this->dividendPShare)=explode(",",$line);
            $price=eregi_replace("- <b>","",$price);
            $price=eregi_replace("</b>","",$price);
            $price=eregi_replace("\"","",$price);
            list($this->time,$this->price)=explode(" ",$price);

        }
        
        


    }
    function getSector()
    {
        //getSector.php
        //@symbol
        $symbol=$this->symbol;
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
    function getSplit()
    {
        //return true if stock has split and not been tracked
    }
    function getPrice()
    {
        return $this->price;
    }
    function getChange()
    {
        return $this->change;
    }
    function processDividends()
    {
        $exDiv=strtotime($this->exDiv);
        $divDate=strtotime($this->divDate);
        //should check to see if it is an action already
        $run=$this->run("select * from actions where Symbol='$this->symbol' and type='Dividend' and Date>$exDiv and Date<=".$divDate+(60*60*24*10));
        
        if (mysql_num_rows($run['result'])<1)
        {
            //this really doesnt need to be done often
            $sql="select * from portfolios where Symbol='$this->sprice' and BuyDate>$exDiv and (SellDate>=$divDate or SellDate=0)";
            //row result update portfolios
        }
    }
    function toArray()
    {
        //take all info and make it into a nice array with text fields
        $_return=array();
        /*$_return+={"Symbol",$this->symbol};
        $_return+={"Name",$this->name};
        $_return+={"Price",$this->price};
        $_return+={"Change",$this->change);
        $_return+={"P/E",$this->price2earnings};
        $_return+={"1yr Gain:",$this->annualizedGain);*/

    }
    function analyst(){
        $file="";
        $symbol=$this->symbol;
        $symbol=eregi_replace("\"","",$symbol);
        $fileurl="http://finance.yahoo.com/q/ao?s=$symbol";
        //echo $fileurl;
        //not supported in < 4 $file=file_get_contents("$fileurl");
        $fileA=file($fileurl);
        foreach ($fileA as $line) {
            $file.=$line;
        }
        $sectorPos=strpos($file,"Mean Recommendation (this week):");
        $sector=substr($file,$sectorPos+37,38);
        if ($sector<1.5){
            return ("Strong Buy");
        }
        elseif($sector<2.3){
            return ("Buy");
        }
        elseif($sector<2.7){
            return ("Hold");
        }
        elseif($sector<3.5){
            return ("Sell");
        }
        else {
            return ("Strong Sell");
        }

    }
        
        
        
    
                   /*
        Originally I was going to be like akshay and track a conglomeration of stocks,
but then I found that yahoo provides real-time quotes through their csv generator.
By grabbing every stock on the fly there is potentially more load on the server
at any given time, but there is also more accuracy in reporting. If downloads
are huge then I can change this.
       Symbol                            s
      Name                              n
      Last Trade (With Time)            l
      Last Trade (Price Only)           l1
      Last Trade Date                   d1
      Last Trade Time                   t1
      Last Trade Size                   k3
      Change and Percent Change         c
      Change                            c1
      Change in Percent                 p2
      Ticker Trend                      t7
      Volume                            v
      Average Daily Volume              a2
      More Info                         i
      Trade Links                       t6
      Bid                               b
      Bid Size                          b6
      Ask                               a
      Ask Size                          a5
      Previous Close                    p
      Open                              o
      Day's Range                       m
      52-week Range                     w
      Change From 52-wk Low             j5
      Pct Chg From 52-wk Low            j6
      Change From 52-wk High            k4
      Pct Chg From 52-wk High           k5
      Earnings/Share                    e
      P/E Ratio                         r
      Short Ratio                       s7
      Dividend Pay Date                 r1
      Ex-Dividend Date                  q
      Dividend/Share                    d
      Dividend Yield                    y
      Float Shares                      f6
      Market Capitalization             j1
      1yr Target Price                  t8
      EPS Est. Current Yr               e7
      EPS Est. Next Year                e8
      EPS Est. Next Quarter             e9
      Price/EPS Est. Current Yr         r6
      Price/EPS Est. Next Yr            r7
      PEG Ratio                         r5
      Book Value                        b4
      Price/Book                        p6
      Price/Sales                       p5
      EBITDA                            j4
      50-day Moving Avg                 m3
      Change From 50-day Moving Avg     m7
      Pct Chg From 50-day Moving Avg    m8
      200-day Moving Avg                m4
      Change From 200-day Moving Avg    m5
      Pct Chg From 200-day Moving Avg   m6
      Shares Owned                      s1
      Price Paid                        p1
      Commission                        c3
      Holdings Value                    v1
      Day's Value Change                w1,
      Holdings Gain Percent             g1
      Holdings Gain                     g4
      Trade Date                        d2
      Annualized Gain                   g3
      High Limit                        l2
      Low Limit                         l3
      Notes                             n4
      Last Trade (Real-time) with Time  k1
      Bid (Real-time)                   b3
      Ask (Real-time)                   b2
      Change Percent (Real-time)        k2
      Change (Real-time)                c6
      Holdings Value (Real-time)        v7
      Day's Value Change (Real-time)    w4
      Holdings Gain Pct (Real-time)     g5
      Holdings Gain (Real-time)         g6
      Day's Range (Real-time)           m2
      Market Cap (Real-time)            j3
      P/E (Real-time)                   r2
      After Hours Change (Real-time)    c8
      Order Book (Real-time)            i5
      Stock Exchange                    x
*/

}
  ?>
