<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 19/04/2017
 * Time: 03:50
 */

namespace dmsysop\MikrotikApi\Support;

use dmsysop\MikrotikApi\Core\Collection;
use dmsysop\MikrotikApi\Entity\Entity;
use PEAR2\Net\RouterOS\Response;
use PEAR2\Net\RouterOS\ResponseCollection;

/**
 * Class EntityUtils
 * @package dmsysop\MikrotikApi\Support
 */
trait EntityUtils
{

    /**
     * @param $items
     * @return Collection
     */
    private function convertArrayToEntities($items)
    {
        if (!is_array($items)) {
            // TODO: throw exception
        }

        $collection = new Collection();

        foreach ($items as $item) {
            if ($item->getType() == Response::TYPE_DATA) {
                $collection->add(
                    $this->entity->setAttributes($this->getEntityProperties($item))
                );
            }
        }

        return $collection;
    }

    /**
     * @param $array
     * @return array
     */
    private function getEntityProperties($array)
    {
        $attributes = [];

        foreach ($array as $property => $value) {
            $attributes[$property] = $value;
        }

        return $attributes;
    }
}