<?php
//DB接続
define('DSN','mysql:host=127.0.0.1;dbname=login;charset=utf8;');
define('DB_USER','root');
define('DB_PASSWORD','@Pass2222');
try{
$dbh=new PDO(DSN,DB_USER,DB_PASSWORD);
//echo '接続できました';
}catch(PDOException $e){
echo '接続エラー'.$e->getMessage();
exit();
}




