<?php


use Micro7\Controllers\HomeController;

require_once "vendor/autoload.php";

$app = new \Micro7\App();

$container =$app->getContainer();
$container['config'] = function (){
  return [
    "db_driver"=>[
        "default"=>'mysql',
        "mysql"=>[
            "host"=>'localhost',
            "db_name"=>'pdo',
            "db_username"=>'root',
            "db_password"=>'',
            "port"=>'3306',
        ]
    ]
  ];
};
$container['db'] = function ($c){
    $default  = $c['config']['db_driver']['default'];
    $dbname   = $c['config']['db_driver'][$default]['db_name'];
    $username = $c['config']['db_driver'][$default]['db_username'];
    $pass     = $c['config']['db_driver'][$default]['db_password'];
    $host     = $c['config']['db_driver'][$default]['host'];
    $port     = $c['config']['db_driver'][$default]['port'];
  return  new PDO("{$default}:host={$host};dbname={$dbname};port={$port}",$username,$pass);
};
$container['errorHandler'] = function (){
  die('404');
};
$app->get('/',[HomeController::class,'index']);
$app->post('/sing-up',function (){
    echo "sing-up";
});
$app->run();
