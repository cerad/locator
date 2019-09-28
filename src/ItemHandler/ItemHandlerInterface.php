<?php declare(strict_types=1);

namespace App\ItemHandler;

interface ItemHandlerInterface
{
    static public function getDefaultIndexName() : string;

    public function hello() : string ;
}