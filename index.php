<?php

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

$app->get('/',function (){
    echo "home";
});
$app->run();
