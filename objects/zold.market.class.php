<?
//
//This whole class is pointless, don't upload it.
include("db.class.php");
class Market extends DBBase {


    function Market(){
        //initializes
        parent::DBBase();


    }
    function updateAllPrices()
    {
        //updates all market information prices
        $this->setPriceFromCSV($this->stockIndex())
        
    }
    function stockIndex(){
        //returns array of stocks tracked on market
    }
    function setPriceFromCSV($stockIndex){
        //gets the csv from yahoo
        //http://finance.yahoo.com/d/quotes.csv?
        //s=AAPL+AGCCQ.PK&f=sl1d1t1c1ohgv&e=.csv
        /*
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
        foreach ($stockIndex as $stock)
        {
            //
            $stocks.="$stock+";
        }
        
        $file="http://finance.yahoo.com/dquotes.csv?s=$stocks&f=snk1d1r2k2g3&e=.csv";
        foreach ($file as $line)
        {
            //echo $line;
            list ($symbol,$name,$price,$date,$price2earnings,$change,$annaulizedgain)=explode(",",$pizza);
            list($price,$time)=explode(" ",$price);
            //update db
        }
            

        
        
    }
    



