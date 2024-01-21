<?php

namespace Title\Module\Controller;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\DB\Exception;
use Bitrix\Main\Engine\ActionFilter\HttpMethod;
use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Bitrix\Iblock\Elements\ElementLinuxTable;

class ApiController extends Controller
{
    /**
     * @throws LoaderException
     */
    public function init(): void
    {
        parent::init();
        Loader::includeModule('iblock');




    }

    /**
     * @throws Exception
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function getElementsAction(): array
    {
        $collection = ElementLinuxTable::query()
            ->addSelect('NAME')
            ->addSelect('PREVIEW_TEXT')
            ->addSelect('OS')
            ->addSelect('LAST_VERSIONS.ITEM')
            ->addSelect('LOGO.FILE')
            ->fetchCollection();

        $result = [];
        foreach ($collection as $object) {
            $lastVersionsArray = [];
            foreach ($object->getLastVersions() as $item) {
                $lastVersionsArray[] = $item->getItem()->getValue();
            }
            $result[] = [
                'id' => $object->getId(),
                'title' => $object->getName(),
                'description' => $object->getPreviewText(),
                'OS' => $object->getOs()->getValue(),
                'image' => "/upload/{$object->getLogo()->getFile()->getSubdir()}/{$object->getLogo()->getFile()->getFileName()}",
                'lastVersions' => $lastVersionsArray
            ];
        }

       return $result;

    }

    protected function getDefaultPreFilters()
    {
        return [
            new HttpMethod(
                [HttpMethod::METHOD_GET, HttpMethod::METHOD_POST]
            ),
        ];
    }



}
