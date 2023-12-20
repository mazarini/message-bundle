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

namespace Mazarini\MessageBundle\Controller;

trait MessageControllerTrait
{
    private int $errorCount = 0;

    protected function addFlash(string $type, mixed $message): void
    {
        if ('error' === $type) {
            ++$this->errorCount;
        }
        parent::addFlash('msg', ['type' => $type, 'text' => $message]);
    }

    protected function hasError(): bool
    {
        return $this->errorCount > 0;
    }
}
