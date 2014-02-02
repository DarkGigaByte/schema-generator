<?php

/*
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SchemaOrgModel\Config;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Entities Generator Configuration
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class EntitiesGeneratorConfiguration implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('config');
        $rootNode
            ->children()
                ->booleanNode('debug')->defaultFalse()->info('Debug mode')->end()
                ->booleanNode('check_is_goodrelations')->defaultFalse()->info('Emit a warning if a property is not derived from GoodRelations')->end()
                ->scalarNode('header')->defaultFalse()->info('A license or any text to use as header of generated files')->example('// (c) Kévin Dunglas <dunglas@gmail.com>')->end()
                ->scalarNode('namespace')->defaultValue('SchemaOrg')->info('The namespace of the generated files')->example('SchemaOrgModel')->end()
                ->scalarNode('author')->defaultFalse()->info('The value of the phpDoc\'s @author annotation')->example('Kévin Dunglas <dunglas@gmail.com>')->end()
                ->enumNode('field_visibility')->values(['private', 'protected', 'public'])->defaultValue('protected')->cannotBeEmpty()->info('Visibility of entities fields')->end()
                ->arrayNode('types')
                    ->info('Schema.org\'s types to use')
                    ->useAttributeAsKey('id')
                    ->prototype('array')
                        ->children()
                            ->arrayNode('properties')
                                ->info('Properties of this type to use')
                                ->prototype('scalar')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
            ;

        return $treeBuilder;
    }
}