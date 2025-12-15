<?php

declare(strict_types=1);
/**
 * This file is part of MineAdmin.
 *
 * @link     https://www.mineadmin.com
 * @document https://doc.mineadmin.com
 * @contact  root@imoi.cn
 * @license  https://github.com/mineadmin/MineAdmin/blob/master/LICENSE
 */

namespace Media\Api\Tools;

use Mtownsend\XmlToArray\XmlToArray;
use Spatie\ArrayToXml\ArrayToXml;

class Xml
{
    public static function arrayToXml($array): string
    {
        foreach ($array as $key => $value) {
            $value = (string) $value;
            $array[$key] = ['_cdata' => $value];
        }
        $arrayToXml = new ArrayToXml($array, 'xml', true, 'UTF-8');
        $arrayToXml->dropXmlDeclaration()->prettify();

        return $arrayToXml->toXml();
    }

    public static function xmlToArray($xml): array
    {
        return XmlToArray::convert($xml);
    }
}
