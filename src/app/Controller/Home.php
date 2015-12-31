<?php

namespace Air\Website\Controller;

use Air\View\ViewFactoryInterface;
use Air\View\ViewInterface;

class Home extends GUI
{
    /**
     * The home page.
     *
     * @param ViewFactoryInterface $viewFactory A view factory.
     * @return ViewInterface A view.
     */
    public function actionHome(ViewFactoryInterface $viewFactory)
    {
        $view = $viewFactory->get('home');

        $this->template->content = $view;

        return $this->template;
    }
}
