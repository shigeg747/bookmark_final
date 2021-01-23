<?php

session_start();
include("funcs.php");

//入力チェック(受信確認処理追加)
if(
  !isset($_GET["id"]) || $_GET["id"]==""
){
  exit('ParamError');
}


//1. GETデータ取得
$id = $_GET["id"];

//2.DB接続
$pdo = db_connect();

$sql = "SELECT * FROM gs_user_table WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view = "";
if($status==false){
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
} else {
  $row = $stmt->fetch();
}

$name = $row['name'];
$lid = rand(999,10000)*2-1;
$lpw = rand(999,10000)*2-1;
$kanri_flg = $row['kanri_flg'];
// $life_flg = $row['life_flg'];


//3.UPDATE gs_an_table SET ....; で更新(bindValue)

$sql_set = 'UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw,  kanri_flg=:kanri_flg, life_flg=:life_flg WHERE id=:id';
$stmt_set = $pdo->prepare($sql_set);
$stmt_set->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt_set->bindValue(':lid', $lid, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt_set->bindValue(':lpw', $lpw, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt_set->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt_set->bindValue(':life_flg', "1", PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt_set->bindValue(':id', $id, PDO::PARAM_INT);  //更新したいidを渡す
$status_set = $stmt_set->execute();

//４．データ登録処理後
if($status_set==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt_set->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //select.phpへリダイレクト
  header("Location: index.html");
  exit;

}



?>
