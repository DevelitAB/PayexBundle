<?php

namespace Bsadnu\PayexBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('payex');

        $rootNode
            ->children()
                ->scalarNode('account_number')
                    ->cannotBeEmpty()
                    ->info('Merchant account number')
                ->end()
                ->scalarNode('encryption_key')
                    ->cannotBeEmpty()
                    ->info('Encryption key')
                ->end()
                ->scalarNode('test_mode')
                    ->cannotBeEmpty()
                    ->info('If payments is in test mode')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}