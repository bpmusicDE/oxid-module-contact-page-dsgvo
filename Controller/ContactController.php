<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 *
 * edits from BPMusic under MIT license
 */

namespace BPMusic\ContactPageModule\Controller;

use oxRegistry;


class ContactController extends \OxidEsales\Eshop\Application\Controller\ContactController
{
    /**
     * module template
     */
    protected $_sThisTemplate = 'contact.tpl';


    /**
     * module settings to view parameter
     */
    public function __construct() {
      parent::__construct();

      $this->gmaps = \OxidEsales\Eshop\Core\Registry::getConfig()->getConfigParam('blBPMContactPageGMaps');
    }


    /**
     * Composes and sends user written message, returns false if some parameters
     * are missing.
     *
     * edits:
     * Only email field is required for DSGVO and maybe for GDPR too.
     * Salution & new human field is taken for spam bot defence and the value have to be empty
     *
     * @return bool
     */
    public function send()
    {
        $aParams = \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter('editval');

        // checking email address
        if (!oxNew(\OxidEsales\Eshop\Core\MailValidator::class)->isValidEmail($aParams['oxuser__oxusername'])) {
            \OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay('ERROR_MESSAGE_INPUT_NOVALIDEMAIL');

            return false;
        }

        $sSubject = \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter('c_subject');
        if (!$aParams['oxuser__oxusername'] || !$sSubject || !empty($aParams['oxuser__oxsal']) || !empty($aParams['human'])) {
            // even if there is no exception, use this as a default display method
            \OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay('ERROR_MESSAGE_INPUT_NOTALLFIELDS');

            return false;
        }

        $oLang = \OxidEsales\Eshop\Core\Registry::getLang();
        $sMessage = $oLang->translateString('MESSAGE_FROM') . " " .
                    $aParams['oxuser__oxfname'] . " " .
                    $aParams['oxuser__oxlname'] . " " .
                    "(" . $aParams['oxuser__oxusername'] . ")<br /><br />" .
                    nl2br(\OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter('c_message'));

        $oEmail = oxNew(\OxidEsales\Eshop\Core\Email::class);
        if ($oEmail->sendContactMail($aParams['oxuser__oxusername'], $sSubject, $sMessage)) {
            $this->_blContactSendStatus = 1;
        } else {
            \OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay('ERROR_MESSAGE_CHECK_EMAIL');
        }
    }

}
