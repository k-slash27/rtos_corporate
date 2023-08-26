<?php
declare(strict_types=1);

namespace App\Controllers;

require_once 'Controller.php';

use App\Models\Api;
use Dotenv\Dotenv;

class ContactController extends Controller
{
    public $env;

    public function __construct() {
        $this->env = Dotenv::createImmutable(__PROJECT_ROOT__)->load();
    }

    public function index() {
        $api = new Api();
        $meta = $api->getData('meta');
        return $this->view('contact/index', ['meta' => $meta, 'env' => $this->env]);
    }

    public function post() {
        print_r($_POST);
    }
}