<?php

namespace Air\Website\Controller;

use Air\View\ViewFactoryInterface;
use Air\View\ViewInterface;

class GUI
{
    /**
     * @var ViewInterface $template A template view.
     */
    protected $template;


    /**
     * @param ViewFactoryInterface $viewFactory A view factory.
     */
    public function before(ViewFactoryInterface $viewFactory)
    {
        $this->template = $viewFactory->get('template');
    }
}
