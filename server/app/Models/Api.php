<?php

declare(strict_types=1);

namespace App\Models;

require_once __PROJECT_ROOT__ . "/vendor/autoload.php";

use Dotenv\Dotenv;
use \Microcms\Client;

class Api
{
    protected $client;
    
    public function __construct() {
        Dotenv::createImmutable(__PROJECT_ROOT__)->load();
        $this->client = new Client(
            $_ENV['MICROCMS_SERVICE_DOMAIN'],  // YOUR_DOMAIN は XXXX.microcms.io の XXXX 部分
            $_ENV['MICROCMS_API_KEY']  // API Key
        );
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