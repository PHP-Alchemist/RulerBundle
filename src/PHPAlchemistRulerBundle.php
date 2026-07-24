<?php

namespace PHPAlchemist\RulerBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class PHPAlchemistRulerBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder) : void
    {
        $container->import(__DIR__.'/Resources/config/services.php');
    }

    public function configure(DefinitionConfigurator $definition) : void
    {
        $definition->rootNode()
                    ->children()
                        ->arrayNode('ruler')->children()
                            ->stringNode('operators')->end()
                            ->end()
                        ->end() // ruler
                    ->end();
    }
}
