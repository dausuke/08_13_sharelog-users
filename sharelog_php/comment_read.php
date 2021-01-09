<?php
session_start();
ini_set('display_errors', 1);

// DB接続の設定
include('functions.php');
$pdo = connect_to_db();

//コメントデータ取得
    $comment_sql = 'SELECT * FROM comment_table ';
    $comment_stmt = $pdo->prepare($comment_sql);
    //SQL実行
    $comment_status = $comment_stmt->execute();

    if ($comment_status == false) {
        $error = $comment_stmt->errorInfo();
        // データ登録失敗次にエラーを表示
        exit('sqlError:' . $error[2]);
    } else {
        // データ表示
        $comment_result = $comment_stmt->fetchAll(PDO::PARAM_STR);
        echo json_encode($comment_result, JSON_UNESCAPED_UNICODE);
        // var_dump($result[0]['shopname']);
        // exit();
    }