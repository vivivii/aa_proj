<?php
date_default_timezone_set('PRC');
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='aa_project';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='root';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";


try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    echo "连接成功<br/>";
    $dbh = null;
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}

$db = new PDO($dsn, $user, $pass,array(PDO::ATTR_PERSISTENT => true));
//$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
