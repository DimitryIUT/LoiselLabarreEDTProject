<?php

namespace ContainerG3ZItm3;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProfesseurControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\Api\ProfesseurController' shared autowired service.
     *
     * @return \App\Controller\Api\ProfesseurController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'AbstractController.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'Api'.\DIRECTORY_SEPARATOR.'ProfesseurController.php';

        $container->services['App\\Controller\\Api\\ProfesseurController'] = $instance = new \App\Controller\Api\ProfesseurController();

        $instance->setContainer(($container->privates['.service_locator.mx0UMmY'] ?? $container->load('get_ServiceLocator_Mx0UMmYService'))->withContext('App\\Controller\\Api\\ProfesseurController', $container));

        return $instance;
    }
}
