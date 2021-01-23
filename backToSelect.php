<?php

session_start();
include("funcs.php");
loginCheck();



$pdo = db_connect();

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

var_dump($_SESSION["kanri_flg"]);
var_dump($_SESSION["id"]);


// }else
if( $_SESSION["kanri_flg"] == 0){
  //Login処理OKの場合
  header("Location: select_user.php");
} else if( $_SESSION["kanri_flg"] == 1){
  header("Location: select_user_bill.php");
}
exit();

?>
