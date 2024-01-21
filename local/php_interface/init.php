<?php
define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/local/php_interface/custom-log.txt");

// Composer
try {
    require_once $_SERVER["DOCUMENT_ROOT"].'/vendor/autoload.php';
} catch (Exception $exception) {
    die('Не установлен composer');
}

// Constants
require_once "constants.php";
require __DIR__ . '/include/functions.php';




//AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("MyClass", "OnAfterIBlockElementUpdateHandler"));
//class MyClass
//{
//    // создаем CEventLog::Add(array(
////            "SEVERITY" => "SECURITY",
////            "AUDIT_TYPE_ID" => "MY_OWN_TYPE",
////            "MODULE_ID" => "main",
////            "ITEM_ID" => 123,
////            "DESCRIPTION" => "Обновлено инит",
////        ));обработчик события "OnAfterIBlockElementUpdate"
//    public static function OnAfterIBlockElementUpdateHandler(&$arFields)
//    {
//
//    }
//}