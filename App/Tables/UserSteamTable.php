<?php
namespace App\Tables;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\DatetimeField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Main\Type\DateTime;

class UserSteamTable extends DataManager
{
    public static function getTableName()
    {
        return 'sl_user_steam';
    }

    public static function getMap()
    {
        return [
            new IntegerField(
                'ID',
                [
                    'primary' => true,
                    'autocomplete' => true,
                ]
            ),
            new IntegerField(
                'USER_ID',
                [
                    'required' => true,
                ]
            ),
            new Reference(
                'USER',
                \Bitrix\Main\UserTable::class,
                Join::on('this.USER_ID', 'ref.ID')
            ),
            new StringField(
                'STEAM_ID',
                [
                    'required' => true,
                ]
            ),
            new DatetimeField(
                'CREATED_AT',
                [
                    'default_value' => new \Bitrix\Main\Type\DateTime(),
                ]
            ),
        ];
    }
}