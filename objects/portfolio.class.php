<?

class Portfolio extends DBBase {
    var $user;



    function Portfolio($userkey){
        //initializes
        parent::DBBase();
        //echo "userkey"+$userkey;
        $this->user=$userkey;


    }
    function trade($symbol,$shares)
    {
        //buys stock and adds it to the portfolio
        $buyStock=new Stock($symbol);
        //this should buy and sell
        $this->changeCash(-($buyStock->getPrice()*$shares+4.95));
        $this->add($symbol,$shares,($buyStock->getPrice()*$shares+4.95),time());
    }
    function changeCash($amount)
    {
        $this->cash+=$amount;
        $this->run("insert into ");
    }
    function add($symbol,$shares,$price,$time){
        //adds to db the transaction
    }
    function portfolioSymbols(){
        $symbols=array();
        $sql="select Distinct(Symbol) from icg_Transactions where UserKey=".$this->user;
        $run=$this->run($sql);
        while ($row = mysql_fetch_array($run['result'])) {
            array_push($symbols,$row['Symbol']);
        }
        return $symbols;
    }
    function symbolDetails($symbol){
        $details=array();
        //echo $symbol;
        $sql="Select Sum(Shares), sum(SharePrice), Count(*) from icg_Transactions where UserKey=".$this->user." and Symbol='$symbol'";
        $run=$this->run($sql);
        while ($row = mysql_fetch_array($run['result'])){
            //print_r($row);
            $shares=$row['Sum(Shares)'];
            $totalSharePrice=$row['sum(SharePrice)'];
            $count=$row['Count(*)'];
        }
        //$results=mysql_numrows($run['result']);


        $aveSP=round($totalSharePrice/$count,2);
        $myStock=new Stock($symbol);//get some current info
        $pGain=round(((($shares*$myStock->getPrice())/($shares*$aveSP))*100),2) ;
        array_push($details,$symbol,$myStock->getPrice(),$myStock->getChange(),$shares,$aveSP,round(($shares*$myStock->getPrice()-$shares*$aveSP),2),$pGain);

            //symbol,price,change,shares,averagePrice,gain$,gain%

        return $details;
    }
    function makePortfolio(){
        $symbols=$this->portfolioSymbols();
        $portfolio=array();
        array_push($portfolio,array("Symbol","Price","Change","Shares","Average Price","Gain","% Gain"));
        foreach ($symbols as $symbol){
            array_push($portfolio,$this->symbolDetails($symbol));
        }
        return $portfolio;
    }
        
        

}

        


//end of class

