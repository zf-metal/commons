# FormProcess [PluginsControllers](../PluginsController.md)


This Plugin allows us process a form that bind a Doctrine entity. If form is valid, Entity will be persist, else you will get form errors 

### Parameters:
* @param \Doctrine\ORM\EntityManager $em  Doctrine EntityManager
* @param \Zend\Form\Form $form Form to process
* @param boolean $flash (Optional) Defines if errors will be added to flashmessenger

### Return:
* @return A instance of this pluginController (FormProcess)

### Invoke:
* formProcess

### Example:

Process form and send form to view
```
$em = $this->getEm();
$form = new \Module\Form\SomeEntityForm();
form->bind($entity);
$flash = true;

$this->formProcess($em,$form,$flash);

//Send form to view
$view = new ViewModel(array('form' => $form));
return $view;
```

##Alternative
Process form, get result in array and return a json

```
$em = $this->getEm();
$form = new \Module\Form\SomeEntityForm();
form->bind($entity);
$flash = true;

$aResult = $this->formProcess($em,$form,$flash)->getResult();
return new \Zend\View\Model\JsonModel($aResult);
```