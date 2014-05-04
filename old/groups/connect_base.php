<?
 class analitical
{
  var $sql_login="";
  var $sql_passwd="";
  var $sql_database="wordpressdb";
  var $sql_host="localhost";

  var $conn_id;
  var $sql_query;
  var $sql_err;
  var $sql_result;

function sql_connect()
 {
  $this->conn_id = mysql_connect($this->sql_host,$this->sql_login,$this->sql_passwd);
  mysql_select_db($this->sql_database);
  //mysql_query('SET NAMES cp1251', $this->conn_id);
  mysql_query('SET NAMES utf8', $this->conn_id);
 }

function sql_execute()
 {
  $this->sql_result=mysql_query($this->sql_query,$this->conn_id)or die("Помилка: " . mysql_error());
  $this->sql_err=mysql_error();
 }

function sql_close()
 {
  mysql_close($this->conn_id);
 }
 function select($parameter)
 {  $Row=array(array());
    $j=0;
  $this->sql_connect();
  $this->sql_query=$parameter;
  $this->sql_execute();
 
  while($Mas = mysql_fetch_row($this->sql_result))
	{
		for ($i=0;$i<count($Mas);$i++){
	   $Row[$j][$i] = $Mas[$i];   
	   }
     $j++;   
       
    }
if ($Row[0][0]==''){$Row=NULL;}
  return $Row;
 }
 
}


class video
{
  var $sql_login="";
  var $sql_passwd="";
  var $sql_database="clipbucket";
  var $sql_host="192.168.1.234";

  var $conn_id;
  var $sql_query;
  var $sql_err;
  var $sql_result;

function sql_connect()
 {
  $this->conn_id = mysql_connect($this->sql_host,$this->sql_login,$this->sql_passwd);
  mysql_select_db($this->sql_database);
  //mysql_query('SET NAMES cp1251', $this->conn_id);
  mysql_query('SET NAMES utf8', $this->conn_id);
 }

function sql_execute()
 {
  $this->sql_result=mysql_query($this->sql_query,$this->conn_id)or die("Помилка: " . mysql_error());
  $this->sql_err=mysql_error();
 }

function sql_close()
 {
  mysql_close($this->conn_id);
 }
 function select($parameter)
 {  $Row=array(array());
    $j=0;
  $this->sql_connect();
  $this->sql_query=$parameter;
  $this->sql_execute();
 
  while($Mas = mysql_fetch_row($this->sql_result))
	{
		for ($i=0;$i<count($Mas);$i++){
	   $Row[$j][$i] = $Mas[$i];   
	   }
     $j++;   
       
    }
if ($Row[0][0]==''){$Row=NULL;}
  return $Row;
 }
 
}
class virtual
{
  //var $sql_login="";
  var $sql_login="";
  //var $sql_passwd="";
  var $sql_passwd="";
  var $sql_database="";
  var $sql_host="";

  var $conn_id;
  var $sql_query;
  var $sql_err;
  var $sql_result;

function sql_connect()
 {
  $this->conn_id = mysql_connect($this->sql_host,$this->sql_login,$this->sql_passwd);
  mysql_select_db($this->sql_database);
  //mysql_query('SET NAMES cp1251', $this->conn_id);
  mysql_query('SET NAMES utf8', $this->conn_id);
 }

function sql_execute()
 {
  $this->sql_result=mysql_query($this->sql_query,$this->conn_id)or die("Помилка: " . mysql_error());
  $this->sql_err=mysql_error();
 }

function sql_close()
 {
  mysql_close($this->conn_id);
 }
 function select($parameter)
 {  $Row=array(array());
    $j=0;
  $this->sql_connect();
  $this->sql_query=$parameter;
  $this->sql_execute();
 
  while($Mas = mysql_fetch_row($this->sql_result))
	{
		for ($i=0;$i<count($Mas);$i++){
	   $Row[$j][$i] = $Mas[$i];   
	   }
     $j++;   
       
    }
if ($Row[0][0]==''){$Row=NULL;}
  return $Row;
 }
 
}
/*Для*/
?>

