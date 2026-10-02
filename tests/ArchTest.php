<?php

arch('debugging functions are not used')
    ->expect(['dd', 'dump', 'ray'])
    ->not->toBeUsed();
