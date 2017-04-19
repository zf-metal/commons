# Form Builder

### Descripcion:

Este Plugin permite generar un Form a partir de una entidad de Doctrine.

### Parameters:
* @param \Doctrine\ORM\EntityManager $em  EntityManager de Doctrine
* @param string $entityName Nombre de la entidad para la cual se genera el Form
* @param boolean $addSubmit (Opcional)Define si se agrega un submit button al form

### Return:
* @return \Zend\Form\Form

### Invoke:
* formBuilder

### Example:

$em = $this->getEm();
$entityName = "Module\Entity\SomeEntity";
$addSubmit = true;

$form = $this->formBuilder($em,$entityName,$addSubmit);