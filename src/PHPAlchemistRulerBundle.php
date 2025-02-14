<?php

namespace PHPAlchemist\RulerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;

class PHPAlchemistRulerBundle extends Bundle
{
    public function configure(DefinitionConfigurator $definition) : void
    {
        $definition->rootNode()
                    ->children()
                        ->arrayNode('ruler')->children()
                            ->stringNode('operators')->end()
                            ->end()
                        ->end() // ruler
                    ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder) : void
    {
        $container->import('../config/services.yaml');

        // If operators hasn't been set let's just ignore it
        if (isset($config['operators']) && $config['operators'] !== '') {
            $container->setParameter('php_alchemist_ruler.operators_namespace', $config['operators']);
        }
        // the "$config" variable is already merged and processed so you can
        // use it directly to configure the service container (when defining an
        // extension class, you also have to do this merging and processing)
//        $container->services()
//                  ->get('acme_social.twitter_client')
//                  ->arg(0, $config['twitter']['client_id'])
//                  ->arg(1, $config['twitter']['client_secret'])
//        ;
    }

}