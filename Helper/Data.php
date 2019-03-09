<?php

namespace Sevenstar\Menufacture\Helper;


//use Magento\Framework\Serialize\SerializerInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

   public function someMethod()
     {

        $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
        $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION'); 
        $attrcollections = $connection->fetchAll("SELECT * FROM `catalog_eav_attribute` WHERE attribute_id = '83'");
        foreach ($attrcollections as $attrcollection) {

        $menufacture = $attrcollection['used_in_custom'];
       
        }
        return $menufacture;
     }

   public function frontattrshow()
   {

        $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
        $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION'); 
        $item_attr_collects = $connection->fetchAll("SELECT * FROM `catalog_eav_attribute` WHERE attribute_id = '83'");
        foreach ($item_attr_collects as $item_attr_collect) {
        $item_attr_collect_val[] = $item_attr_collect['used_in_custom'];
               }
       $item_attr_collect_imp = implode(",",$item_attr_collect_val); // Alpinestars,ARS,DellOrto
       $item_attr_collect_exp = explode(',', $item_attr_collect_imp);
   	   return $item_attr_collect_exp;
   }  




}
