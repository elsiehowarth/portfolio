<?php
//create class which holds connection information in
class pdoDB {
    // private statics to hold the connection
    private static $dbConnection = null;

    // class instantiation
    private function __construct() {

    }
    private function __clone() {

    }
    //create function which holds connection information
    public static function getConnection() {
        // if there isn't a connection already then create one
        if ( !self::$dbConnection ) {
            //start try statement
            try {
                //create a new connection to the database and server
               self::$dbConnection = new PDO( "mysql:host=localhost;dbname=unn_w13004905",
                   'unn_w13004905', '32XARWC6' );
                // self::$dbConnection = new PDO( "mysql:host=localhost;dbname=unn_w13004905",
                //     'root', 'root' );
                self::$dbConnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }//end try statement
            //if no connection and error occurs catch it
            catch( PDOException $e ) {
                // echo the error which has occured
                echo $e->getMessage();
            }//end catch statement
        }//end if statement
        // return the connection
        return self::$dbConnection;
    }//end the getConnection function

}//end the pdoDB class

?>