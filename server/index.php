<?php
if (empty($_SERVER['REQUEST_URI'])) {
  exit;
}

require_once __DIR__ . "/vendor/autoload.php";

use Configure\Configure;

$c = new Configure();

// URLをスラッシュで分解
$array_parse_uri = explode('/', $_SERVER['REQUEST_URI']);

// PHPファイル名抽出
$last_uri = $array_parse_uri[1];
$last_uri = substr($last_uri, 0, strcspn($last_uri,'?'));

$uris = explode('_', $last_uri);

$call = reset($uris);
$call = ucfirst(strtr(ucwords(strtr($call, ['_' => ' '])), [' ' => ''])) . "Controller";
$call = $call==='Controller' ? 'IndexController' : $call;


// PHPファイル名がapp/controller/配下の場合
if (file_exists(__CONTROLLER_DIR__ . "/" . $call . ".php")) {

    // コントローラーをインクルードしてインスタンス化
    include(__CONTROLLER_DIR__ . "/" . $call . ".php");
    $class = 'App\Controllers\\' . $call;

    $obj = new $class();

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
      if (isset($array_parse_uri[3]) && !empty($array_parse_uri[3]) && $array_parse_uri[2]=="p") {
        $response = $obj->index($array_parse_uri[3]);
      } else if (isset($array_parse_uri[2]) && !empty($array_parse_uri[2])) {
        $response = $obj->detail($array_parse_uri[2]);
      } else {
        $response = $obj->index();
      }
    } else {
        // // POSTデータバリデーション 
        // $errors = $v->main($_POST);
        // if ($errors) {
        //     header("HTTP/1.1 400 " . json_encode($errors));
        //     exit;
        // }
        // POSTならpostメソッドを呼び出す
        $response = $obj->post();
    }

    // コントローラーからのレスポンスを出力
    echo $response;
    exit;

} else {
    // ファイルがなければ404エラー
    echo $call;
    header("HTTP/1.0 404 Not Found");
    exit;
}