<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use Grav\Common\Grav;
use Grav\Common\Page\Page;
use Grav\Common\Page\Types;
use RocketTheme\Toolbox\Event\Event;

class SnipcartPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents() {
        return [
            'onPageInitialized' => ['onPageInitialized', 0],
            'onGetPageTemplates' => ['onGetPageTemplates', 0],
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
        ];
    }

    /**
     * Initialize configuration
     */
    public function onPageInitialized()
    {
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $defaults = (array) $this->config->get('plugins.snipcart');

        /** @var Page $page */
        $page = $this->grav['page'];
        if (isset($page->header()->snipcart)) {
            $page->header()->snipcart = array_merge($defaults, $page->header()->snipcart);
        } else {
            $page->header()->snipcart = $defaults;
        }
    }

    /**
     * Add page template types.
     */
    public function onGetPageTemplates(Event $event)
    {
        if (!$this->active) return;

        /** @var Types $types */
        $types = $event->types;
        $types->scanTemplates('plugins://snipcart/templates');
    }

    /**
     * Add current directory to twig lookup paths.
     */
    public function onTwigTemplatePaths()
    {
        if (!$this->active) return;

        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    /**
     * Set needed variables to display cart.
     */
    public function onTwigSiteVariables()
    {
        if (!$this->active) return;

        if ($this->config->get('plugins.snipcart.built_in_css')) {

            $this->grav['assets']
                ->add('https://app.snipcart.com/themes/base/snipcart.css', 10, false) // priority 10, no-pipeline
                ->add('plugin://snipcart/css/snipcart.css');

        }
    }
}
