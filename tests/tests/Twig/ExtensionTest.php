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

namespace App\Tests\Twig;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExtensionTest extends WebTestCase
{
    public function testNoNessage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '');

        // Test page OK with div alert-group
        $this->assertResponseIsSuccessful();
        $this->assertcount(1, $crawler->filter('div.alert-group'));

        // Test no message
        $this->assertsame('', $crawler->filter('div.alert-group')->text());
        $this->assertcount(0, $crawler->filter('div.alert'));
    }

    /**
     * @dataProvider ErrorProvider
     */
    public function testErrorMessage(string $error, string $alert = null): void
    {
        $alert = (null === $alert) ? 'div.alert-'.$error : $alert;

        $client = static::createClient();
        $crawler = $client->request('GET', '/'.$error);

        // Test page OK with div alert-group
        $this->assertResponseIsSuccessful();
        $groupDiv = $crawler->filter('div.alert-group');
        $this->assertcount(1, $groupDiv);

        // Test content of div alert-group ok
        $alertDiv = $groupDiv->filter($alert);
        $this->assertcount(1, $alertDiv);
        $this->assertsame('Message', $alertDiv->text());
    }

    /**
     * ErrorProvider.
     *
     * @return \Traversable<array<string>>
     */
    public function ErrorProvider(): \Traversable
    {
        yield ['default', 'div.alert-danger'];
        yield ['primary'];
        yield ['secondary'];
        yield ['success'];
        yield ['danger'];
        yield ['error', 'div.alert-danger'];
        yield ['warning'];
        yield ['info'];
        yield ['light'];
        yield ['dark'];
    }
}
