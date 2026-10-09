<?php

use FriendsOfTwig\Twigcs;

return Twigcs\Config\Config::create()
    ->setFinder(
        Twigcs\Finder\TemplateFinder::create()
            ->in(__DIR__)
            ->exclude(['node_modules', 'var', 'vendor'])
    );
