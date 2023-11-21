<?php namespace Pyrex\Prichod;

use Backend;
use System\Classes\PluginBase;

/**
 * prichod Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'prichod',
            'description' => 'No description provided yet...',
            'author'      => 'pyrex',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Pyrex\Prichod\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
       

        return [
            'pyrex.prichod.some_permission' => [
                'tab' => 'prichod',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        

        return [
            'prichod' => [
                'label'       => 'prichod',
                'url'         => Backend::url('pyrex/prichod/prichoy'),
                'icon'        => 'icon-leaf',
                'permissions' => ['pyrex.prichod.*'],
                'order'       => 500,
            ],
        ];
    }
}
