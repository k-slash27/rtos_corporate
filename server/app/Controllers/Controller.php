<?php
declare(strict_types=1);

namespace App\Controllers;

require_once __PROJECT_ROOT__ . "/vendor/autoload.php";

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;


class Controller
{

    public function __construct() {
    }

    public function view(string $template, array $param): string {
        // Viewへのレンダリング
        $loader = new FilesystemLoader(__VIEW_DIR__);
        $twig = new Environment($loader);
        return $twig->render($template . ".html", $param);
    }
}