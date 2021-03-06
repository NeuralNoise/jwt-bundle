<?php

declare(strict_types=1);

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2018 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Jose\Bundle\JoseFramework\DependencyInjection;

use Jose\Bundle\JoseFramework\DependencyInjection\Source\Source;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @var Source[]
     */
    private $sources;

    /**
     * @var string
     */
    private $alias;

    /**
     * Configuration constructor.
     *
     * @param Source[] $sources
     */
    public function __construct(string $alias, array $sources)
    {
        $this->alias = $alias;
        $this->sources = $sources;
    }

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root($this->alias);
        $rootNode->setDeprecated('The child node "%node%" at path "%path%" is deprecated and will be removed on v2.x. It has no effect anymore. Please refer to https://github.com/symfony/symfony/pull/25699');

        foreach ($this->sources as $source) {
            $source->getNodeDefinition($rootNode);
        }

        return $treeBuilder;
    }
}
