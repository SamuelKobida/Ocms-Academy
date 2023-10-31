<?php namespace App\ArrivalHook;

use Backend;
use System\Classes\PluginBase;
use App\Arrival\Controllers\Arrivals as ArrivalController;
use App\Arrival\Models\Arrival as ArrivalModel;

/**
 * ArrivalHook Plugin Information File
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
            'name'        => 'ArrivalHook',
            'description' => 'No description provided yet...',
            'author'      => 'App',
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
        ArrivalController::extendFormFields(function($form) {
        
            $form->addFields([

                'dog' => [
                    'label'   => 'dog',
                    'type' => 'checkbox',
                    'default' => 'false',
                ],
            ]);
        
        });

        ArrivalModel::extend(function ($arrival)
        {
            $arrival->bindEvent('model.afterCreate', function () use ( $arrival) {
                if ($arrival->dog) {
                    \Log::info("{$arrival->name} arrived to work at {$arrival->arrival} with his dog!");
                } else {
                    \Log::info("{$arrival->name} arrived to work at {$arrival->arrival}!");
                }
            });
        });
         
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
            'App\ArrivalHook\Components\MyComponent' => 'myComponent',
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
            'app.arrivalhook.some_permission' => [
                'tab' => 'ArrivalHook',
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
        return []; // Remove this line to activate

        return [
            'arrivalhook' => [
                'label'       => 'ArrivalHook',
                'url'         => Backend::url('app/arrivalhook/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['app.arrivalhook.*'],
                'order'       => 500,
            ],
        ];
    }
}
