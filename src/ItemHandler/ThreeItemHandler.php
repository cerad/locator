<?php declare(strict_types=1);

namespace App\ItemHandler;

class ThreeItemHandler implements ItemHandlerInterface
{
    public function __construct()
    {
        dump('three');
    }
    public static function getDefaultIndexName(): string
    {
        return 'three';
    }
    public function hello() : string { return 'hello three'; }
}