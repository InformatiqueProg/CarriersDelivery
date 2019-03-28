<?php
/**
 * @author Informatique Prog (contact@informatiqueprog.net)
 * @copyright (c) 2008 - 2018 Informatique Prog
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace CarriersDelivery\Hook;


use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;

class BackHook extends BaseHook
{
    /**
     * @param HookRenderEvent $event
     */
    public function onProductModificationFormRightBottom(HookRenderEvent $event)
    {
        $event->add(
            $this->render(
                'carriersdelivery-product.modification.form-right.bottom.html',
                [
                    'form'          => $event->getArgument('form'),
                    'product_id'    => $event->getArgument('product_id')
                ]
            )
        );
    }
    /**
     * @param HookRenderEvent $event
     */
    public function onOrderEditDeliveryModuleBottom(HookRenderEvent $event)
    {
        $event->add(
            $this->render(
                'carriersdelivery-order-edit.delivery-module-bottom.html',
                [
                    'order_id' => $event->getArgument('order_id')
                ]
            )
        );
    }
}