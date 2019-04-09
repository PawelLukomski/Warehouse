<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', -1);
ini_set('max_execution_time', 0);
error_reporting(E_ALL);
require "../vendor/autoload.php";

$request = new \Manager\Request();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

if($url[0] != "/"){
    $request->setRequest($url);
}
else{
    header("Location: /Home");
}
$repoOrders = new \Repository\OrdersRepository();

$status = $repoOrders->countByStatus(0);

$manager = new \Manager\MainManager();
$pageName = $manager->param()['mainParams']['pageName'];
$nav = $manager->param()['navParams'];
$outTemplate = $manager->param()['outTemplate'];
$controller = new \Controller\Controller();


    if (isset($url[1]) && in_array($url[1], $outTemplate))
        $request->useController();
    else {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title><?php echo $pageName ?></title>
            <link rel="stylesheet" href="/assets/styles/style.css">
            <link rel="stylesheet" href="/assets/styles/reset.css">
            <link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,700|Permanent+Marker|Sriracha"
                  rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
                  integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
                  crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="/assets/js/sortable.js"></script>
        </head>
        <body>
        <header class="header_main">
            <h1><?php echo $pageName ?></h1>
            <nav class="nav_main">
                <ul>
                    <?php
                    foreach ($nav as $key => $item)
                        if($key == "[Zamówienia - Materiałów]")
                        {
                            if($status > 0)
                            {
                                echo "<a href='$item'><li style='background: #fff; padding: 0 10px; color: #a31f1b'>$key - <div style='position: absolute; top: 60px; background: #a31f1b; color: #fff; padding: 5px; line-height: 15px;'>[$status] NIE ZAMÓWIONYCH</div></li></a>";
                            }
                            else{
                                echo "<a href='$item'><li>$key</li></a>";
                            }
                        }
                        else
                            echo "<a href='$item'><li>$key</li></a>";
                    ?>
                </ul>
            </nav>
        </header>
        <div class="main_container">
            <div class="section_container">
                <?php
                $request->useController();
                ?>
            </div>
        </div>
        </body>
        </html>
        <?php
    }

    ?>