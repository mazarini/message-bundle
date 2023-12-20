<?php

declare(strict_types=1);

use FriendsOfTwig\Twigcs;

$finderA = Twigcs\Finder\TemplateFinder::create()->in(__DIR__ . '/templates');
$finderB = Twigcs\Finder\TemplateFinder::create()->in(__DIR__ . '/tests/templates');

return Twigcs\Config\Config::create()
    ->setName('message-bundle')
    ->setSeverity('ignore')
    ->setReporter('console')
    ->setRuleSet(Twigcs\Ruleset\Official::class)
    ->addFinder($finderA)
    ->addFinder($finderB)
;

