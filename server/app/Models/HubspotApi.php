<?php

declare(strict_types=1);

namespace App\Models;

require_once __PROJECT_ROOT__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

class HubspotApi
{
    protected $client;
    
    public function __construct() {
        Dotenv::createImmutable(__PROJECT_ROOT__)->load();

        $url = "https://api.hsforms.com/submissions/v3/integration/submit/".$_ENV['HUBSPOT_PORTAL_ID']."/".$_ENV['HUBSPOT_FORM_ID'];

        $curl = curl_init($url);

        $header = "Content-Type: application/json";

        $params = $_POST;

        $options = array(
            // HEADER
            CURLOPT_HTTPHEADER =>$header,
            // Method
            CURLOPT_POST => true, // POST
            // body
            CURLOPT_POSTFIELDS => $params,
            // 変数に保存。これがないと即時出力
            CURLOPT_RETURNTRANSFER => true,
            // header出力
            CURLOPT_HEADER => true, 
        );
        
        //set options
        curl_setopt_array($curl, $options);
        
        // 実行
        $response = curl_exec($curl);
        
        // ステータスコード取得
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        // header & body 取得
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE); // ヘッダサイズ取得
        $header = substr($response, 0, $header_size); // header切出
        $header = array_filter(explode("\r\n",$header));
        $json = substr($response, $header_size); // body切出
        
        curl_close($curl);
        
        print_r($json); // json結果
        print_r($header); // header配列
    }

    public function getData($endpoint=null, $field=null, $cond=[]) {
        if ($endpoint != null) {
            if ($cond != []) {
                $obj = $this->client->list($endpoint, $cond);
                $arr = json_decode(json_encode($obj), true);
                return $arr;    
            }
            if ($field != null) {
                $singleContent = $this->client->get($endpoint)->{$field};
                return $singleContent;
            }
            $obj = $this->client->get($endpoint);
            $arr = json_decode(json_encode($obj), true);
            return $arr;
        }
        return 'Bad Request';
    }
}