<?php declare(strict_types=1);

namespace App\Controller;

use App\ItemHandler\ItemHandlerInterface;
use App\ItemHandler\ItemHandlersLocator;
use App\ItemHandler\ItemHandlersLocator2;
use App\ItemHandler\ThreeItemHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ServiceLocator;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    private $itemHandlersIterable;
    private $itemHandlersLocatorByKey;
    private $itemHandlersLocatorByClass;
    private $itemHandlersLocator;
    private $itemHandlersLocator2;

    public function __construct(
        iterable $itemHandlersIterable,
        ServiceLocator $itemHandlersLocatorByClass,
        ServiceLocator $itemHandlersLocatorByKey,
        ItemHandlersLocator $itemHandlersLocator,
        ItemHandlersLocator2 $itemHandlersLocator2
    )
    {
        $this->itemHandlersIterable = $itemHandlersIterable;
        $this->itemHandlersLocatorByClass = $itemHandlersLocatorByClass;
        $this->itemHandlersLocatorByKey = $itemHandlersLocatorByKey;
        $this->itemHandlersLocator = $itemHandlersLocator;
        $this->itemHandlersLocator2 = $itemHandlersLocator2;
    }

    public function index() : Response
    {
        //dump($this->itemHandlersLocator);

        $itemHandlerClasses = 'Classes ';
        foreach($this->itemHandlersIterable as $itemHandler) {
            $itemHandlerClasses .= get_class($itemHandler) . ' ';
        }

        $oneClass = get_class($this->itemHandlersLocatorByClass->get('App\ItemHandler\OneItemHandler'));

        /** @var ItemHandlerInterface $two */
        $two = $this->itemHandlersLocatorByKey->get('two');
        $twoHello = $two->hello();

        $three = $this->itemHandlersLocator2->get(ThreeItemHandler::class);
        $threeHello = $three->hello();

        $html = <<<EOT
<!DOCTYPE html>
<html lang="en">
<head><title>Locator</title></head>
<body>
  <h1>Locator</h1>
  <p>{$itemHandlerClasses}</p>
  <p>{$oneClass}</p>
  <p>{$twoHello}</p>
  <p>{$threeHello}</p>
</body>
</html>
EOT;
        return new Response($html);
    }
}