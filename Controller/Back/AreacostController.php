<?php
/**
 * @author Informatique Prog (contact@informatiqueprog.net)
 * @copyright (c) 2008 - 2018 Informatique Prog
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace CarriersDelivery\Controller\Back;


use CarriersDelivery\CarriersDelivery;
use CarriersDelivery\Model\CarriersdeliveryAreascosts;
use CarriersDelivery\Model\CarriersdeliveryAreascostsQuery;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Translation\Translator;

class AreacostController extends BaseAdminController
{
    /**
     * @param int $id
     * @return null|\CarriersDelivery\Model\CarriersdeliveryAreascosts|mixed
     */
    protected function getExistingObject($id = 0)
    {
        $id = intval($id);

        if (!empty($id) && $id > 0) {
            $areacost = CarriersdeliveryAreascostsQuery::create()->findPk($id);

            return $areacost;
        }

        return false;
    }

    /**
     * @return mixed|\Thelia\Core\HttpFoundation\Response
     */
    public function createAction()
    {
        if (null !== $response = $this->checkAuth([], ['CarriersDelivery'], AccessManager::CREATE)) {
            return $response;
        }

        $form = $this->createForm('carriersdelivery_areacost_create');

        try {
            $dataForm = $this->validateForm($form, 'POST');

            $carrier_id = $dataForm->get('carrier_id')->getData();

            CarriersDelivery::checkCarrierId($carrier_id);

            $weight_max = (string)$dataForm->get('weight_max')->getData();

            $costsByWeight = CarriersdeliveryAreascostsQuery::getCostsByWeightForCarrier($carrier_id);

            foreach ($costsByWeight['carrier_areas'] as $carrier_area_id => $carrier_area_name) {
                if (array_key_exists($carrier_area_id, $costsByWeight['areasWeights'])) {
                    if (array_key_exists($weight_max, $costsByWeight['areasWeights'][$carrier_area_id])) {
                        // cost already exist for this carrier area and weight
                        continue;
                    }
                }
                $areacost = new CarriersdeliveryAreascosts();

                $areacost
                    ->setCarrierareaId($carrier_area_id)
                    ->setWeightMax($weight_max)
                    ->setCost(0)
                    ->save();
            }

            $this->getSession()->getFlashBag()->add('success', Translator::getInstance()->trans('Added!', [], 'carriersdelivery.bo.default'));
        } catch (\Exception $e) {
            $this->getSession()->getFlashBag()->add('danger', $e->getMessage());
        }

        return $this->generateSuccessRedirect($form);
    }

    /**
     * @return mixed|\Thelia\Core\HttpFoundation\Response
     */
    public function deleteAction()
    {
        if (null !== $response = $this->checkAuth([], ['CarriersDelivery'], AccessManager::DELETE)) {
            return $response;
        }

        $carrier_id = $this->getRequest()->request->getInt('carrier_id');

        try {
            $weight = $this->getRequest()->request->get('weight');

            if (CarriersDelivery::checkCarrierId($carrier_id)) {
                $toDelete = CarriersdeliveryAreascostsQuery::create()
                    ->filterByWeightMax($weight)
                    ->useCarriersdeliveryAreasQuery()
                        ->filterByCarrierId($carrier_id)
                    ->endUse()
                    ->find();

                if ($toDelete->count() >= 1) {
                    $toDelete->delete();
                }

                $this->getSession()->getFlashBag()->add('success', Translator::getInstance()->trans('%nbr Area cost deleted!', ['%nbr' => $toDelete->count()], 'carriersdelivery.bo.default'));
            } else {
                $this->getSession()->getFlashBag()->add('danger', Translator::getInstance()->trans('Carrier not found!', [], 'carriersdelivery.bo.default'));
            }
        } catch (\Exception $e) {
            $this->getSession()->getFlashBag()->add('danger', $e->getMessage());
        }

        $url = $this->getRouteFromRouter('router.carriersdelivery', 'carriersdelivery.admin.carrier.areas', ['carrier_id' => $carrier_id]);

        return $this->generateRedirect($url);
    }

    /**
     * @return mixed|\Thelia\Core\HttpFoundation\Response
     * @throws \Exception
     */
    public function updateAction()
    {
        if (null !== $response = $this->checkAuth([], ['CarriersDelivery'], AccessManager::UPDATE)) {
            return $response;
        }

        $carrier_id = $this->getRequest()->request->getInt('carrier_id');

        $areascostsJson = $this->getRequest()->request->get('areascosts');

        $areascosts = json_decode($areascostsJson);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('JSON DECODE ERROR!');
        }

        try {
            $count = 0;

            foreach ($areascosts as $areacost) {
                CarriersdeliveryAreascostsQuery::create()
                    ->filterById($areacost->id)
                    ->update([
                        'Cost' => CarriersDelivery::sanitizeNumber($areacost->cost),
                    ]);

                $count++;
            }

            $this->getSession()->getFlashBag()->add('success', Translator::getInstance()->trans('%nbr Area cost updated!', ['%nbr' => $count], 'carriersdelivery.bo.default'));
        } catch (\Exception $e) {
            $this->getSession()->getFlashBag()->add('danger', $e->getMessage());
        }

        $url = $this->getRouteFromRouter('router.carriersdelivery', 'carriersdelivery.admin.carrier.areas', ['carrier_id' => $carrier_id]);

        return $this->generateRedirect($url);
    }
}