<?php
class Database {
  private $host = '127.0.0.1';
  private $db_name = 'desa';
  private $db_user = 'root';
  private $db_pass = '';
  
  private $options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  public $conn = null;
  public $result = array();

  public function check_connection() {
    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass,$this->options);
      $this->conn->exec("set names utf8");
      $this->conn=null;
      $result = array('ErrCode'=>false, 'ErrMsg'=>'Main System: Database and application connected !');}
    catch(PDOException $exception) {
      $result = array('ErrCode'=>true, 'ErrMsg'=>'Main System: '.$exception->getMessage());}    
      return $result;} 
   
  public function execute_sp($sp_name = '', $sp_paramater = array()) {
    if (trim($sp_name)=='') {$result = array('ErrCode'=>true, 'ErrMsg'=>'Main System: Data input incomplete !');} else {
      clearstatcache(); $perintah = '('; 
      foreach ($sp_paramater as $kunci => $kunci_isi ) {$perintah .= ':'.$kunci.',';}
      if (strlen($perintah)>1) {$perintah = substr($perintah,0,strlen($perintah)-1);}
      $perintah = 'call ' . $sp_name . $perintah .')';
      try {$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->db_user,$this->db_pass,$this->options);}
      catch (PDOException $Exception) {$this->conn = null; return array ('ErrCode'=>true, 'ErrMsg'=>'Main System: '.$Exception->getMessage());}  	
      try {   
        $stmt=$this->conn->prepare($perintah);  
        foreach ($sp_paramater as $kunci => $kunci_isi) {
          if (is_bool($kunci_isi)) {$type = PDO::PARAM_BOOL;}           
          elseif (is_null($kunci_isi)) {$type =PDO::PARAM_NULL;}
          elseif (is_int($kunci_isi)) {$type = PDO::PARAM_INT;}
          else {$type = PDO::PARAM_STR;} 
          $stmt->bindValue(":$kunci",$kunci_isi,$type);}
        $stmt->execute(); 	
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);	}
      catch(PDOException $exception) {$result = array('ErrCode'=>true,'ErrMsg'=>'Main System: '.$exception->getMessage());}}
    return $result;}}
?>         
