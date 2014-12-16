<?

class User extends DBBase {



    function User(){
        //initializes
        parent::DBBase();


    }
    function addNew($username,$md5password,$gth,$email,$name,$status)
    {
        //make a new user
    }
    function login($username,$md5password)
    {
        $run=$this->run("select ID from icg_Users where User='$username' and Password='$md5password'");
        while ($row = mysql_fetch_array($run['result'])) {
            return $row['ID'];
        }



    }
    function isAdmin()
    {
        //returns if user is admin or not to allow access to admins ection
    }
    

}

        





        







