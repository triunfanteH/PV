<?php


class Connection extends PDO{

function __construct(){
$user ='root';
$pass = '';
$database ='portalVendas';
$dsn = "mysql:host=localhost;dbname=$database";

//configurar opções

$options= array(

PDO::ATTR_PERSISTENT=>true,
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

 );

try{
	parent::__construct ($dsn,$user,$pass,$options);

}catch(PDOException $e){

	echo '<div class ="alert alert-danger">';
	echo $e->getMessage();
	echo '<div>';
}

}
}

?>