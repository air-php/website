<?php

use Air\View\ViewFactoryInterface;
use Air\View\Mustache\ViewFactory;

return [
    ViewFactoryInterface::class => DI\object(ViewFactory::class)
        ->constructorParameter('partialsDir', __DIR__ . '/../View/')
        ->methodParameter(
            'addPath',
            'viewPath',
            __DIR__ . '/../View/'
        )
];
