<?php

require_once('config.php');

class MySQLdatabase {
    
    //ABSTRACT DATABASE VARIABLE
    private $db;
    
    //IMMEDIATE CONNECTION
    function __construct(){
        $this->open_connection();
    }
    
    //OPEN CONNECTION
    public function open_connection(){
        $this->db = mysqli_connect(dbhost, dbuser, dbpass, dbname);
         if(mysqli_connect_errno()) {
            die("Database connection failed: " . 
                 mysqli_connect_error() . 
                 " (" . mysqli_connect_errno() . ")"
            );
        }
    }
    
    //CLOSE CONNECTION
    public function close_connection(){
        if(isset($this->db)){
            mysqli_close($this->db);
            unset($this->db);
        }
    }
    
    //CONFIRM QUERY
    public function query($sql){
    $result = mysqli_query($this->db, $sql);
        
    $this->confirm_query($result);
        
    return $result;
}
    //CONFIRM DATABASE QUERY 
    public function confirm_query($result_set){
        if (!$result_set) {
                    die("Database query failed.");
                }
    }
    
    public function mysql_prep($string) {
    $safe_result = mysqli_real_escape_string($this->db, $string);
    return $safe_result;
}
    
    public function fetch_assoc($result_set){
        return mysqli_fetch_assoc($result_set);
    }
    
    public function escape_string($string){
        return mysqli_real_escape_string($this->db, $string);
    }
    
}//END CLASS

$database = new MySQLdatabase();
$db =& $database;

?>