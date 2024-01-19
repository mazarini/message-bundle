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

namespace Mazarini\MessageBundle\Config;

trait ConfigTrait
{
    public function getDefault(): string
    {
        return (string) $this->getConfig()->getValue('default');
    }

    public function getClosable(): bool
    {
        return (bool) $this->getConfig()->getValue('closable');
    }

    /**
     * getTypes.
     *
     * @return array<string,string>
     */
    public function getTypes(): array
    {
        return $this->getConfig()->getArray('types');
    }
}
