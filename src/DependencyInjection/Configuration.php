<?php

namespace PHPAlchemist\RulerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration
{

    public function getConfigTreeBuilder() : TreeBuilder
    {
        $treeBuilder = new TreeBuilder('php_alchemist_ruler');

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // BC for symfony/config < 4.2
            $rootNode = $treeBuilder->root('php_alchemist_ruler');
        }

        $rootNode
          ->children()
             ->stringNode('operators')
               ->defaultValue('')
             ->end()
          ->end()
        ;

        return $treeBuilder;
    }
}