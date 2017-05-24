<?php

namespace ZfMetal\Commons\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use \DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;

class ExportToExcel extends AbstractPlugin {

    /**
     *
     * @var array
     */
    private $config;

    function __construct($config = array()) {
        $this->config = $config;
    }

    function getConfig() {
        return $this->config;
    }

    public function __invoke(\Doctrine\ORM\EntityManager $em, $entity, \Doctrine\ORM\QueryBuilder $queryBuilder = null, $configKey) {
        if (!$queryBuilder) {
            /** @var $queryBuilder \Doctrine\ORM\QueryBuilder  */
            $queryBuilder = $this->getQueryBuilder($em, $entity);
        }

        $records = $queryBuilder
                ->getQuery()
                ->getResult();
        
        $writter = new \XLSXWriter();
        
        $properties = $em->getClassMetadata($entity);
        
    }

    private function getQueryBuilder(\Doctrine\ORM\EntityManager $em, $entity) {
        return $em->createQueryBuilder()->select('u')->from($entity, 'u');
    }

    private function getProperties($entity){
       
    }

    public function export() {
        
    }

}
