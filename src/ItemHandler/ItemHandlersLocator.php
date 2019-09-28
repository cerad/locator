<?php declare(strict_types=1);

namespace App\ItemHandler;

use Symfony\Component\DependencyInjection\ServiceLocator;

/* ======================================================
 * Simple IDE friendly autowire injectable wrapper for a generic locator
 * Needs a bit of configuration in services.yaml
 */
class ItemHandlersLocator
{
    private $locator;

    public function __construct(ServiceLocator $locator)
    {
        $this->locator = $locator;
    }
    public function get(string $id) : ItemHandlerInterface
    {
        return $this->locator->get($id);
    }
}