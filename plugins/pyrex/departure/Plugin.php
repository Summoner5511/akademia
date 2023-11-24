<?php namespace Pyrex\Departure;

use Backend;
use System\Classes\PluginBase;

/**
 * Departure Plugin Information File
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
            'name'        => 'Departure',
            'description' => 'No description provided yet...',
            'author'      => 'Pyrex',
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
            'Pyrex\Departure\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'pyrex.departure.some_permission' => [
                'tab' => 'Departure',
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
            'departure' => [
                'label'       => 'Departure',
                'url'         => Backend::url('pyrex/departure/departures'),
                'icon'        => 'icon-leaf',
                'permissions' => ['pyrex.departure.*'],
                'order'       => 500,
            ],
        ];
    }
}
