<?php 
$serverName = "DESKTOP-3DTP1JF\MSSQLSERVER1";
    $database = "TTCLASSETS";
    $uid = 'sa';
    $pwd = 'Engineer@2020';

class Connection{

    protected $isConn;
    protected $datab;
    protected $transaction;

                                //un phpmyadmin    pass phpmyadmin     ip               dbname
    public function __construct($serverName = "DESKTOP-3DTP1JF\MSSQLSERVER1",$database = "TTCLASSETS",$uid = 'sa', $pwd = "Engineer@2020", $options = []){
        
        $this->isConn = TRUE;
        try{
            $this->datab = new PDO("sqlsrv:server=$serverName;Database=$database", $uid, $pwd, $options);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->transaction = $this->datab;
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
           

        }catch(PDOException $e){
            throw new Exception($e->getMessage());          
        } 
        // echo 'Connected Successfully!!!';

    }//endDefaultConstructor
 

    //disconnect from db
    public function Disconnect(){
        $this->datab = NULL;//close connection in PDO
        $this->isConn = FALSE;
    }//endDisconnectFunction


    


}//endClassDatabase

 //$con = new Connection(); //for debugging only
//echo '    debug connection';
 ?>