<?php
/**
 * Zend Framework Application.
 */

namespace ZfMetal\Commons\Factory\Validator;

use DoctrineModule\Validator\NoObjectExists;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * UniqueObjectFactory factory.
 *
 * Creates an instance of UniqueObject.
 *
 * @package Blog\Repository\Factory
 * @link    https://github.com/doctrine/DoctrineModule/blob/master/docs/validator.md
 * @link    https://github.com/doctrine/DoctrineModule/blob/master/src/DoctrineModule/Validator/UniqueObject.php
 */
class NoObjectExistsFactory implements FactoryInterface
{

    /**
     * Factory for UniqueObject.
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  array $options
     * @return UniqueObject
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Get services.
        $entityManager = $container->get("doctrine.entitymanager.orm_default");

        // If 'object_repository' string, try find repository in EntityManager.
        // Sets ObjectManager.
        if (is_string($options['object_repository'])) {
            $options['object_manager']    = $entityManager;
            $options['object_repository'] = $entityManager->getRepository($options['object_repository']);
        }

        return new NoObjectExists($options);
    }

}