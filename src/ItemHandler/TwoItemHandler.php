<?php declare(strict_types=1);

namespace App\ItemHandler;

class TwoItemHandler implements ItemHandlerInterface
{
    public static function getDefaultIndexName(): string
    {
        return 'two';
    }
    public function hello() : string { return 'hello two'; }
}