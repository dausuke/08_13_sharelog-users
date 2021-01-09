<?php
session_start();
ini_set('display_errors', 1);

// DB接続の設定
include('functions.php');
$pdo = connect_to_db();

$userid = $_SESSION["uid"];
$comment = $_POST['commentdata'];
$content_id = $_POST['contentid'];

//コメントをしたユーザーのアカウント名取得
$sql_accountname = 'SELECT accountname FROM userdata_table WHERE id=:userid';
$stmt_accountname = $pdo->prepare($sql_accountname);
//バインド変数設定
$stmt_accountname->bindValue(':userid', $userid, PDO::PARAM_STR);
//SQL実行
$status_accountname = $stmt_accountname->execute();
if ($status_accountname == false) {
    $error = $stmt_accountname->errorInfo();
    // データ登録失敗次にエラーを表示
    exit('sqlError:' . $error[2]);
} else {
    // データ表示
    $result_accountname = $stmt_accountname->fetch(PDO::PARAM_STR);
}

//コメントした投稿のidを取得
$sql_content_id = 'SELECT id FROM content_table WHERE id=:content_id';
$stmt_content_id = $pdo->prepare($sql_content_id);
//バインド変数設定
$stmt_content_id->bindValue(':content_id', $content_id, PDO::PARAM_STR);
//SQL実行
$status_content_id = $stmt_content_id->execute();
if ($status_content_id == false) {
    $error = $stmt_content_id->errorInfo();
    // データ登録失敗次にエラーを表示
    exit('sqlError:' . $error[2]);
} else {
    // データ表示
    $result_content_id = $stmt_content_id->fetch(PDO::PARAM_STR);
    // var_dump($result_content_id);
    // exit();
}

// var_dump($_POST);
//コメント投稿時
$sql = 'INSERT INTO comment_table(id,userid,content_id,content_account,comment,getday) VALUES(NULL,:userid,:content_id,:content_account,:comment,sysdate())';
$stmt = $pdo->prepare($sql);
//バインド変数設定
$stmt->bindValue(':userid', $userid, PDO::PARAM_STR);
$stmt->bindValue(':content_account', $result_accountname['accountname'], PDO::PARAM_STR);
$stmt->bindValue(':content_id', $result_content_id['id'], PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
//SQL実行
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
// データ登録失敗次にエラーを表示
    exit('sqlError:' . $error[2]);
}else{
    //データ登録後、コメントデータ取得
    //直前にINSERTしたレコードのid取得
    $lastInsertId = $pdo->lastInsertId();
    $comment_sql = 'SELECT * FROM comment_table WHERE id=:lastInsertId';
    $comment_stmt = $pdo->prepare($comment_sql);
    //バインド変数設定
    $comment_stmt->bindValue(':lastInsertId', $lastInsertId, PDO::PARAM_STR);
    //SQL実行
    $comment_status = $comment_stmt->execute();

    if ($comment_status == false) {
        $error = $comment_stmt->errorInfo();
        // データ登録失敗次にエラーを表示
        exit('sqlError:' . $error[2]);
    } else {
        // データ表示
        $comment_result = $comment_stmt->fetch(PDO::PARAM_STR);
       
        echo json_encode($comment_result, JSON_UNESCAPED_UNICODE);
        // var_dump($comment_result);
        // exit();
    }
}