<?php

namespace Title\Module\Orm;

use Bitrix\Main\Entity;

/**
 * Class IblockElementTable
 *
 *  Fields:
 *  <ul>
 *  <li> ID int mandatory
 *  <li> NAME string optional
 *  </ul>
 */
class IblockElementTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return 'b_iblock_element';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap(): array
    {
        return [
            new Entity\IntegerField('ID', [
                'primary' => true,
            ]),
            new Entity\StringField('NAME'),
        ];
    }
}