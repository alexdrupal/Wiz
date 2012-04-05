<?php

class Wiz_Plugin_Quote extends Wiz_Plugin_Abstract {

    public static function removeaddressesAction($quoteIds) {
        if (!count($quoteIds)) {
            echo "Please, provide at least one quoteId" . PHP_EOL;
            return true;
        }
        Wiz::getMagento();
        foreach ($quoteIds as $quoteId) {
            $quote = Mage::getModel('sales/quote')->loadByIdWithoutStore($quoteId);
            $quote->removeAllAddresses();
            $quote->save();	
            echo "Removed Addresses from Quote#: " . $quote->getId() . PHP_EOL;
        }
        return true;
    }
}
