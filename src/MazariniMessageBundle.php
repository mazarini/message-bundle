<?php

/*
 * Copyright (C) 2023 Mazarini <mazarini@protonmail.com>.
 * This file is part of mazarini/message-bundle.
 *
 * mazarini/message-bundle is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.
 *
 * mazarini/message-bundle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License
 */

namespace Mazarini\MessageBundle;

use Mazarini\Config\Config\ConfigInterface;
use Mazarini\Config\MazariniConfigBundle;
use Mazarini\MessageBundle\Config\Config;
use Mazarini\MessageBundle\Config\ConfigTrait;
use Mazarini\MessageBundle\Twig\Extension\MessageExtension;
use Mazarini\MessageBundle\Twig\Runtime\MessageRuntime;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\Loader\Configurator\ServicesConfigurator;

class MazariniMessageBundle extends MazariniConfigBundle
{
    use ConfigTrait;

    protected function loadServices(ServicesConfigurator $services): void
    {
        //        $services->set(self::class)
        //            ->public();
        $services->set(MessageExtension::class)
            ->tag('twig.extension')
            ->public()
        ;
        $services->set(MessageRuntime::class)
            ->tag('twig.runtime')
            ->public()
        ;
    }

    public function configure(DefinitionConfigurator $definition): void
    {
        // if the configuration is short, consider adding it in this class
        $definition->rootNode()
            ->children()
            ->booleanNode('closable')->defaultValue(true)->end()
            ->scalarNode('default')->defaultValue('alert-danger')->end()
            ->arrayNode('types')
            ->useAttributeAsKey('name')
            ->defaultValue([
                'primary' => 'alert-primary',
                'secondary' => 'alert-secondary',
                'success' => 'alert-success',
                'danger' => 'alert-danger',
                'error' => 'alert-danger',
                'warning' => 'alert-warning',
                'info' => 'alert-info',
                'light' => 'alert-light',
                'dark' => 'alert-dark',
            ])
            ->arrayPrototype()
            ->children()->scalarNode('value')->end()
            ->end()
            ->end()
        ;
    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    protected function CreateConfig(array $configArray): ConfigInterface
    {
        return new Config($configArray);
    }
}
