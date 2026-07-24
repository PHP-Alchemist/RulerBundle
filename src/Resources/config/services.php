<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use PHPAlchemist\RulerBundle\Factory\RuleBuilderFactory;
use Ruler\RuleBuilder;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set('php_alchemist_ruler.factory.rule_builder', RuleBuilderFactory::class);

    $services->alias(RuleBuilderFactory::class, 'php_alchemist_ruler.factory.rule_builder');

    $services->set(RuleBuilder::class)
        ->factory(service('php_alchemist_ruler.factory.rule_builder'));
};
