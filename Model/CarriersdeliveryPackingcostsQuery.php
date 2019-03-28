<?php

namespace CarriersDelivery\Model;

use CarriersDelivery\Model\Base\CarriersdeliveryPackingcostsQuery as BaseCarriersdeliveryPackingcostsQuery;


/**
 * Skeleton subclass for performing query and update operations on the 'carriersdelivery_packingcosts' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class CarriersdeliveryPackingcostsQuery extends BaseCarriersdeliveryPackingcostsQuery
{
    /**
     * @param $weight
     * @return float
     */
    public static function getCostForWeight($weight)
    {
        if (is_numeric($weight)) {
            $result = CarriersdeliveryPackingcostsQuery::create()
                ->filterByWeightMax(['min' => $weight])
                ->orderByWeightMax()
                ->findOne();

            if (!empty($result)) {
                $costResult = $result->toArray();

                return floatval($costResult['Cost']);
            }
        }

        return 0;
    }

} // CarriersdeliveryPackingcostsQuery
