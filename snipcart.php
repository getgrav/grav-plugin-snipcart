<?php
namespace Grav\Plugin;

use \Grav\Common\Plugin;
use \Grav\Common\Registry;
use \Grav\Common\Grav;
use \Grav\Common\Page\Page;
use \Grav\Common\Page\Pages;

class SnipcartPlugin extends Plugin
{

    protected $active = false;

     /**
     * Activate snipcart plugin
     *
     * Also disables debugger.
     */
    public function onAfterInitPlugins()
    {
        $this->active = true;
    }

    /**
     * Initialize configuration
     */
    public function onAfterGetPage()
    {
        if (!$this->active) {
            return;
        }

        $defaults = (array) $this->config->get('plugins.snipcart');

        /** @var Page $page */
        $page = Registry::get('Grav')->page;
        if (isset($page->header()->snipcart)) {
            $page->header()->snipcart = array_merge($defaults, $page->header()->snipcart);
        } else {
            $page->header()->snipcart = $defaults;
        }
    }

    /**
     * Add current directory to twig lookup paths.
     */
    public function onAfterTwigTemplatesPaths()
    {
        if (!$this->active) {
            return;
        }

        Registry::get('Twig')->twig_paths[] = __DIR__ . '/templates';
    }

    /**
     * Set needed variables to display cart.
     */
    public function onAfterTwigSiteVars()
    {


        if (!$this->active) {
            return;
        }


        if ($this->config->get('plugins.snipcart.built_in_css')) {

            $twig = Registry::get('Twig');

            $twig->twig_vars['stylesheets'][] = 'user/plugins/snipcart/css/snipcart.css';
            // $twig->twig_vars['stylesheets'][] = 'https://app.snipcart.com/themes/base/snipcart.css';
        }
    }
}
