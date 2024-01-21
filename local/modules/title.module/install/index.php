<?php


defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\EventManager;

class title_module extends CModule
{
    public const MODULE_ID = 'title.module';

    public function __construct()
    {
        $arModuleVersion = [];
        include __DIR__.'/version.php';

        $this->MODULE_NAME = 'Названия элементов';
        $this->MODULE_DESCRIPTION
            = 'Добавление восклицательного знака в названиях элементов инфоблока';
        $this->MODULE_ID = 'title.module';
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

    }

    public function InstallEvents()
    {

        $eventManager = EventManager::getInstance();
        $eventManager->registerEventHandler(
            "iblock",
            "OnAfterIBlockElementUpdate",
            $this->MODULE_ID,
            "\Title\Module\Events\Mark",
            "addMarkHandler"
        );
        $eventManager->registerEventHandler(
            "iblock",
            "OnAfterIBlockElementAdd",
            $this->MODULE_ID,
            "\Title\Module\Events\Mark",
            "addMarkHandler"
        );
    }

    public function UnInstallEvents()
    {

        $eventManager = EventManager::getInstance();
        $eventManager->unRegisterEventHandler(
            "iblock",
            "OnAfterIBlockElementUpdate",
            $this->MODULE_ID,
            "\Title\Module\Events\Mark",
            "addMarkHandler"
        );
        $eventManager->unRegisterEventHandler(
            "iblock",
            " OnAfterIBlockElementAdd",
            $this->MODULE_ID,
            "\Title\Module\Events\Mark",
            "addMarkHandler"
        );
    }

    public function DoInstall()
    {
        $this->InstallEvents();
        RegisterModule($this->MODULE_ID);
    }

    public function DoUninstall()
    {
        $this->UnInstallEvents();
        UnRegisterModule($this->MODULE_ID);
    }
}