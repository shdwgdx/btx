<?php

namespace Title\Module\Orm;

use Bitrix\Main\Entity;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;

class BookTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return 'b_books';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap(): array
    {
        return [
            (new IntegerField('ID', [
                'primary' => true,
            ])),
            (new StringField('TITLE'))
        ];
    }
} ?>