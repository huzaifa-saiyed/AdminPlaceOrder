<?php

namespace Kitchen365\AdminOrder\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class OrderPlaceByAdmin implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        /** @var \Magento\Sales\Model\Order $order */
        $order = $observer->getEvent()->getOrder();

        if ($order->getRemoteIp() === null) {
            $order->setData('order_placed_by_admin', 1);
        } else {
            $order->setData('order_placed_by_admin', NULL);
        }

        $order->save();
    }
}
