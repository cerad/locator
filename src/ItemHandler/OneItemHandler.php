<?php declare(strict_types=1);

namespace App\ItemHandler;

class OneItemHandler implements ItemHandlerInterface
{
    public static function getDefaultIndexName(): string
    {
        return 'one';
    }
}