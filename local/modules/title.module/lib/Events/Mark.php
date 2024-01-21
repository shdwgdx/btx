<?php

namespace Title\Module\Events;

use Title\Module\Orm\IblockElementTable;

class Mark
{
    public static function addMarkHandler(&$arFields): void
    {
        $title = $arFields["NAME"];

        if (mb_substr($title, -1) !== '!') {
            $newTitle = $title.'!';

            IblockElementTable::update(
                $arFields["ID"],
                ["NAME" => $newTitle]
            );
        }
    }
}