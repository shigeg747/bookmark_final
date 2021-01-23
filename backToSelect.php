<?php

session_start();
include("funcs.php");
loginCheck();



$pdo = db_connect();

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();



// }else
if( $_SESSION["kanri_flg"] == 0){
  //Login処理OKの場合
  header("Location: select_user.php");
} else if( $_SESSION["kanri_flg"] == 1){
  header("Location: select_user_bill.php");
}
exit();

?>
