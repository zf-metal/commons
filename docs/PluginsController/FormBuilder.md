Back to ..[PluginsControllers](../PluginsController.md)
# FormBuilder 

This Plugin allows us to generate a form from a Doctrine entity.

### Parameters:
* @param \Doctrine\ORM\EntityManager $em  Doctrine EntityManager
* @param string $entityName Name of Entity
* @param boolean $addSubmit (Optional) Defines if a submit button is added to the form

### Return:
* @return \Zend\Form\Form

### Invoke:
* formBuilder

### Example:
```
$em = $this->getEm();
$entityName = "Module\Entity\SomeEntity";
$addSubmit = true;

$form = $this->formBuilder($em,$entityName,$addSubmit);
```