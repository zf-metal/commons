Back to .. [PluginsControllers](../PluginsController.md)
# FormProcess

This Plugin allows us process a form that bind a Doctrine entity. If form is valid, Entity will be persist, else you will get form errors 

### Parameters:
* @param \Doctrine\ORM\EntityManager $em  Doctrine EntityManager
* @param \Zend\Form\Form $form Form to process
* @param boolean $flash (Optional) Defines if errors will be added to flashmessenger

### Return:
* @return $this A instance of this pluginController (FormProcess)

### Invoke:
* formProcess

### Example 1:

Process form and send form to view
```
$em = $this->getEm();
$form = new \Module\Form\SomeEntityForm();
$form->setHydrator(new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($this->getEm()));
$form->bind($entity);
$flash = true;

$this->formProcess($em,$form,$flash);

//Send form to view
$view = new ViewModel(array('form' => $form));
return $view;
```

### Example 2 (Combine with FormBuilder):

Generate Form with FormBuilder, Process form and send form to view
```
$em = $this->getEm();
$form = $this->formBuilder($em,$entityName);
$flash = true;

$this->formProcess($em,$form,$flash);

//Send form to view
$view = new ViewModel(array('form' => $form));
return $view;
```

### Example 3 (Return a Json):
Process form, get result in array and return a json

```
$em = $this->getEm();
$form = $this->formBuilder($em,$entityName);
$flash = true;

$aResult = $this->formProcess($em,$form,$flash)->getResult();

/*
$aResult looks like:
[
    "status" => true|false
    "errors" => ["error1","error2"]
]
*/


return new \Zend\View\Model\JsonModel($aResult);
```