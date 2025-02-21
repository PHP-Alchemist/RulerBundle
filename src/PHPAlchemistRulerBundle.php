<?php

namespace PHPAlchemist\RulerBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class PHPAlchemistRulerBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder) : void
    {
        $loader = new XmlFileLoader($builder, new FileLocator(__DIR__.'/Resources/config'));
        $loader->load('services.xml');
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
