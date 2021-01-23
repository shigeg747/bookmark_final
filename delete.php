<?php

session_start();
include("funcs.php");

//DB接続します
$pdo = db_connect();


//1.GETでidを取得
$id = $_GET["id"];

$sql = 'DELETE FROM gs_bm_table WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //更新したいidを渡す
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //select.phpへリダイレクト
  header("Location: select.php");
  exit;

}



?>
