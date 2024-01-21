<?php

namespace App\Tables;

use Bitrix\Main\Entity;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\OneToMany;
use Bitrix\Main\ORM\Fields\StringField;

class PublisherTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return 'b_publishers';
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
            (new OneToMany('BOOKS', BookTable::class,'PUBLISHER'))

        ];
    }
} ?>