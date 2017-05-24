<?php

namespace ZfMetal\Commons\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use \DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;

class ExportToExcel extends AbstractPlugin {



    function __construct() {

    }

    public function __invoke(\Doctrine\ORM\EntityManager $em, $entity,\Doctrine\ORM\QueryBuilder $queryBuilder = null, $configKey) {
        
    }
    
    public function export(){
        
    }

}
