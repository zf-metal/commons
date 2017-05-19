[HOME](index.md) > [Services](../service.md) > FormProcess 

# FormProcess

This Service allows us process a form that bind a Doctrine entity. If form is valid, Entity will be persist, else you will get form errors 

### Parameters on Invoke:
* @param \Doctrine\ORM\EntityManager $em  Doctrine EntityManager
* @param \Zend\Form\Form $form Form to process
* @param boolean $flash (Optional) Defines if errors will be added to flashmessenger

### Return:
* @return \ZfMetal\Commons\Service\FormProcess

### Get Service:
* $container->get('zf-metal-form-process'); // \ZfMetal\Commons\Service\FormProcess
