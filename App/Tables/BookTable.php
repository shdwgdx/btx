<?php

namespace App\Tables;

use Bitrix\Main\Entity;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
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
                'autocomplete' => true,
            ])),
            (new StringField('TITLE')),
            (new IntegerField('PRICE')),
            new Entity\ExpressionField(
                'TITLE_PRICE',
                'CONCAT(%s, " ", %s)',
                ['TITLE', 'PRICE']
            ),
            (new IntegerField('PUBLISHER_ID')),
            (new IntegerField('AUTHOR_ID')),
            (new Reference('PUBLISHER', PublisherTable::class, ['this.PUBLISHER_ID' => 'ref.ID',]))
        ];
    }
} ?>