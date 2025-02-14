<?php

namespace PHPAlchemist\RulerBundle\Factory;

use Ruler\RuleBuilder;
use Symfony\Component\DependencyInjection\Attribute\Autoconfigure;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;

#[Autoconfigure]
#[AsAlias(id: 'php_alchemist_ruler.factory.rule_builder', public: true)]
class RuleBuilderFactory
{
    public function __construct(protected ContainerInterface $container)
    {
    }

    public function __invoke() : RuleBuilder
    {
        $builder = new RuleBuilder();

        if ($this->container->hasParameter('php_alchemist_ruler.operators_namespace')) {
            $builder->registerOperatorNamespace($this->container->getParameter('php_alchemist_ruler.operators_namespace'));
        }

        return $builder;
    }

}