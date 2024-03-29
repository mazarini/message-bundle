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

namespace Mazarini\MessageBundle\Twig\Runtime;

use Mazarini\Config\Config\ConfigInterface;
use Mazarini\MessageBundle\Config\Config;
use Mazarini\MessageBundle\Config\ConfigTrait;
use Twig\Extension\RuntimeExtensionInterface;

class MessageRuntime implements RuntimeExtensionInterface
{
    use ConfigTrait;

    /**
     * __construct.
     */
    public function __construct(
        private Config $config
    ) {
    }

    /**
     * alertClass.
     */
    public function alertClass(string $type): string
    {
        return $this->getTypes()[$type] ?? $this->getDefault();
    }

    public function isClosable(): bool
    {
        return $this->getClosable();
    }

    private function getConfig(): ConfigInterface
    {
        return $this->config;
    }
}
