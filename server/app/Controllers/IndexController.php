<?php
declare(strict_types=1);

namespace App\Controllers;

require_once 'Controller.php';

use App\Models\Api;

class IndexController extends Controller
{
    public function __construct() {

    }

    public function index() {
        $api = new Api();
        $meta = $api->getData('meta');
        $news = $api->getData('news', null, [
            "limit" => 3,
            "orders" => ["-published"]
        ]);

        // print_r($news);
        return $this->view('index', ['meta' => $meta, 'news' => $news]);
    }
}