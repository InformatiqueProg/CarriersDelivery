<?php
/**
 * @author Informatique Prog (contact@informatiqueprog.net)
 * @copyright (c) 2008 - 2018 Informatique Prog
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace CarriersDelivery\Controller\Back;


use CarriersDelivery\CarriersDelivery;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Translation\Translator;

class ConfigController extends BaseAdminController
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response|\Thelia\Core\HttpFoundation\Response
     */
    public function configAction()
    {
        if (null !== $response = $this->checkAuth([], ['CarriersDelivery'], AccessManager::UPDATE)) {
            return $response;
        }

        $form = $this->createForm('carriersdelivery_config', 'form');

        try {
            if ($this->getRequest()->isMethod('POST')) {
                $dataForm = $this->validateForm($form, 'POST');

                CarriersDelivery::setConfigValue(CarriersDelivery::CONFIG_TAX_RULE_ID, $dataForm->get('tax')->getData());

                $this->getSession()->getFlashBag()->add(
                    'success',
                    Translator::getInstance()->trans('Configuration updated!', [], 'carriersdelivery.bo.default')
                );

                return $this->generateSuccessRedirect($form);
            }
        } catch (\Exception $e) {
            $this->setupFormErrorContext(get_class($form), $e->getMessage(), $form, $e);
        }

        return $this->render('carriersdelivery-config');
    }

}