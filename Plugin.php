<?php namespace Esroyo\UserProfile;

use Yaml;
use Schema;
use File;
use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use RainLab\User\Controllers\Users as UsersController;
use Esroyo\UserProfile\Models\Settings as Settings;

/**
 * UserProfile Plugin Information File
 */
class Plugin extends PluginBase
{

    public $require = ['RainLab.User', 'RainLab.Location'];

    static private $inputTypeMapping = [
        'number' => 'integer',
        'text' => 'string',
        'password' => 'string',
        'textarea' => 'text'
    ];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'esroyo.userprofile::lang.plugin.name',
            'description' => 'esroyo.userprofile::lang.plugin.description',
            'author'      => 'Carles Escrig Royo',
            'icon'        => 'icon-user-plus',
            'homepage'    => 'https://github.com/esroyo/octobercms-userprofile-plugin'
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'esroyo.userprofile::lang.settings.menu_label',
                'description' => 'esroyo.userprofile::lang.settings.menu_description',
                'category'    => 'rainlab.user::lang.settings.users',
                'icon'        => 'icon-user',
                'class'       => 'Esroyo\UserProfile\Models\Settings',
                'order'       => 500,
                'permissions' => ['rainlab.users.settings']
            ]
        ];
    }

    public function boot()
    {
        $profileFields = Settings::get('profile_field');
        $profileFieldsNames = array_column($profileFields, 'name');
        $profileFields = array_combine($profileFieldsNames, $profileFields);

        UserModel::extend(function($model) use ($profileFieldsNames) {
            $model->addFillable($profileFieldsNames);

            $model->implement[] = 'RainLab.Location.Behaviors.LocationModel';
        });

        UsersController::extendFormFields(function($widget) use ($profileFields) {
            // Prevent extending of related form instead of the intended User form
            if (!$widget->model instanceof UserModel) {
                return;
            }

            $widget->addTabFields($profileFields);
        });

        if (Schema::hasColumns('users', $profileFieldsNames)) {
            return;
        }

        Schema::table('users', function($table) use ($profileFields) {
            foreach($profileFields as $profileField) {
                if (!Schema::hasColumn('users', $profileField['name'])) {
                    $method = static::$inputTypeMapping[$profileField['type']];
                    $table->$method($profileField['name'])->nullable();
                }
            }
        });

    }

}
