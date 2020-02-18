<?php namespace Waka\Wcms;

use Backend;
use Lang;
use System\Classes\PluginBase;

/**
 * Wcms Plugin Information File
 */
class Plugin extends PluginBase
{

    public $require = [
        'Rainlab.User',
        'Toughdeveloper.Imageresizer',
        'Waka.Utils',
        'Waka.ImportExport',
        'Waka.Cloudis',
        'Waka.Informer',
    ];
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Wcms',
            'description' => 'No description provided yet....',
            'author' => 'Waka',
            'icon' => 'icon-leaf',
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
        // \Waka\Publisher\Controllers\Documents::extend(function ($controller) {
        //     $controller->implement[] = 'Waka.Wcms.Contents.ContentListNeed';
        // });

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
            'Waka\Wcms\Components\MyComponent' => 'myComponent',
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
            'waka.wcms.some_permission' => [
                'tab' => 'Wcms',
                'label' => 'Some permission',
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
            'wcms' => [
                'label' => 'waka.wcms::lang.menu.wcms',
                'url' => Backend::url('waka/wcms/needs'),
                'icon' => 'icon-newspaper-o',
                'permissions' => ['waka.wcms.*'],
                'order' => 2,
                'sideMenu' => [
                    'side-menu-needs' => [
                        'label' => Lang::get('waka.wcms::lang.menu.needs'),
                        'icon' => 'icon-university',
                        'url' => Backend::url('waka/wcms/needs'),
                    ],
                    'side-menu-solutions' => [
                        'label' => Lang::get('waka.wcms::lang.menu.solutions'),
                        'icon' => 'icon-crosshairs',
                        'url' => Backend::url('waka/wcms/solutions'),
                    ],
                ],
            ],
        ];
    }
}
