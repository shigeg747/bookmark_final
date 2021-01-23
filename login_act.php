<?php

session_start();
include("funcs.php");


// session_start();
$lid= $_POST["lid"];
$lpw = $_POST["lpw"];


//1. 接続します
$pdo = db_connect();
// try {
//   $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DbConnectError:'.$e->getMessage());
// }

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

//３．抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//４. 該当レコードがあればSESSIONに値を代入

if( $lid != "" && $lid == "kanri" && $lpw != "" && $lpw == "kanri"){
  header("Location: user_kanri.php");
} else

//Login処理OKの場合
if( $val["id"] != "" && $val["kanri_flg"] == 0){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["name"]   = $val['name'];
  $_SESSION["kanri_flg"] = $val["kanri_flg"];
  $_SESSION["id"] = $val["id"];
  header("Location: select_user.php");
} else
if( $val["id"] != "" && $val["kanri_flg"] == 1){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["name"]   = $val['name'];
  $_SESSION["kanri_flg"] = $val["kanri_flg"];
  $_SESSION["id"] = $val["id"];
  header("Location: select_user_bill.php");
} else {
  //Login処理NGの場合login.phpへ遷移
  header("Location: index.html");
}
//処理終了
exit();
?>

