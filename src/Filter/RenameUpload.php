<?php
namespace ZfMetal\Commons\Filter;

class RenameUpload extends \Zend\Filter\File\RenameUpload
{

    public function filter($value)
    {

        if (!file_exists($this->getTarget())) {
            $result = mkdir($this->getTarget(), 0755, true);
            if (!$result) {
                throw new \Exception('Permission denied to create the folder: '. $this->getTarget());
            }
        }

        try{
            $result = parent::filter($value);
        }catch (\Zend\Filter\Exception\RuntimeException $exception){
            throw new \Exception('Permission denied to move Picture to folder: '. $this->getTarget());
        }

        return basename($result['tmp_name']);
    }
}
