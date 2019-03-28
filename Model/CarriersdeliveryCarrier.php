<?php

namespace CarriersDelivery\Model;

use CarriersDelivery\Model\Base\CarriersdeliveryCarrier as BaseCarriersdeliveryCarrier;

class CarriersdeliveryCarrier extends BaseCarriersdeliveryCarrier
{
    /**
     * @param $cost
     * @param $feesCost
     * @param $dieselTaxPercent
     * @return float
     */
    public static function calculatePrice($cost, $feesCost, $dieselTaxPercent)
    {
        $fee_cost = floatval($feesCost);

        $price = $fee_cost;

        $cost = floatval($cost);

        $price += $cost;

        $diesel_tax_percent = floatval($dieselTaxPercent);

        if (!empty($diesel_tax_percent)) {
            $price += $cost*$diesel_tax_percent/100;
        }

        return $price;
    }
}
