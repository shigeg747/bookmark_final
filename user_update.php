<?php

session_start();
include("funcs.php");

//入力チェック(受信確認処理追加)
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]==""
){
  exit('ParamError');
}


//1. POSTデータ取得

$name = $_POST["name"];
$lid= $_POST["lid"];
$lpw= $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];
$id = $_POST["id"];


var_dump($name);
echo '<br>';
var_dump($lid );
echo '<br>';
var_dump($lpw );
echo '<br>';
var_dump($kanri_flg);
echo '<br>';
var_dump($life_flg );

//2.DB接続
$pdo = db_connect();


//3.UPDATE gs_an_table SET ....; で更新(bindValue)

$sql = 'UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw,  kanri_flg=:kanri_flg, life_flg=:life_flg WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //更新したいidを渡す
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //select.phpへリダイレクト
  header("Location: user_kanri.php");
  exit;

}



?>
