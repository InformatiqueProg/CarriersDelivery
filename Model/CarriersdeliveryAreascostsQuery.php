<?php

namespace CarriersDelivery\Model;

use CarriersDelivery\Model\Base\CarriersdeliveryAreascostsQuery as BaseCarriersdeliveryAreascostsQuery;


/**
 * Skeleton subclass for performing query and update operations on the 'carriersdelivery_areascosts' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class CarriersdeliveryAreascostsQuery extends BaseCarriersdeliveryAreascostsQuery
{
    /**
     * @param $carrier_id
     * @return array
     */
    public static function getCostsByWeightForCarrier($carrier_id)
    {
        $areasWeights = $distinctWeights = [];

        $carrier_areas = CarriersdeliveryAreasQuery::create()
            ->filterByCarrierId($carrier_id)
            ->find()
            ->toKeyValue('Id', 'Name');

        $result = CarriersdeliveryAreascostsQuery::create()
            ->filterByCarrierareaId(array_keys($carrier_areas))
            ->find()
            ->toArray();

        foreach ($result as $row) {
            $weight_max = floatval($row['WeightMax']);

            $carrierarea_id = intval($row['CarrierareaId']);

            if (!in_array($weight_max, $distinctWeights)) {
                $distinctWeights[] = $weight_max;
            }

            if (!array_key_exists($carrierarea_id, $areasWeights)) {
                $areasWeights[$carrierarea_id] = [];
            }

            $areasWeights[$carrierarea_id][(string)$weight_max] = [
                'id'    => intval($row['Id']),
                'cost'  => floatval($row['Cost']),
            ];
        }

        sort($distinctWeights, SORT_NUMERIC );

        $costsByWeight = [
            'areasWeights'      => $areasWeights,
            'carrier_areas'     => $carrier_areas,
            'distinctWeights'   => $distinctWeights,
        ];

        return $costsByWeight;
    }
} // CarriersdeliveryAreascostsQuery
