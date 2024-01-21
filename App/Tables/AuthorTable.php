<?php

namespace App\Tables;

use Bitrix\Main\Entity;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Fields\StringField;

class AuthorTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return 'b_authors';
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
                'autocomplete' => true,
            ])),
            (new StringField('NAME')),
            (new IntegerField('BOOK_ID')),
//            (new Reference('PUBLISHER', PublisherTable::class, ['this.PUBLISHER_ID' => 'ref.ID',]))
        ];
    }
} ?>