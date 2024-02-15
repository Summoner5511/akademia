<?php namespace App\User;

use Backend;
use System\Classes\PluginBase;
use App\Arrival\Models\Arrival;
use App\User\Models\User;
/**
 * user Plugin Information File
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
            'name'        => 'user',
            'description' => 'No description provided yet...',
            'author'      => 'app',
            'icon'        => 'icon-leaf'
        ];
    }




    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Arrival::extend(function ($model) {
            $model->hasOne['user'] = 'App\User\Models\User';
            $model->bindEvent('model.afterUpdate', function ($model) {
                if($model->user){
                    $model->user->save();
                }
            });
        });
    
    }

}
