<?php namespace Esroyo\UserProfile;

use Yaml;
use Schema;
use Lang;
use File;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;
use RainLab\User\Models\User as UserModel;
use RainLab\User\Controllers\Users as UsersController;
use Esroyo\UserProfile\Models\Settings;

/**
 * UserProfile Plugin Information File
 */
class Plugin extends PluginBase
{

    public $require = ['RainLab.User'];

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
            'homepage'    => 'https://github.com/esroyo/oc-userprofile-plugin'
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'esroyo.userprofile::lang.settings.menu_label',
                'description' => 'esroyo.userprofile::lang.settings.menu_description',
                'category'    => SettingsManager::CATEGORY_USERS,
                'icon'        => 'icon-user-plus',
                'class'       => 'Esroyo\UserProfile\Models\Settings',
                'order'       => 500,
                'permissions' => ['rainlab.users.settings']
            ]
        ];
    }

    public function registerComponents()
    {
        return [
            'Esroyo\UserProfile\Components\Account'       => 'account',
            'Esroyo\UserProfile\Components\MenuUserWidget'       => 'menuUserWidget'
        ];
    }

    /**
     * Register new Twig variables
     * @return array
     */
    public function registerMarkupTags()
    {
        return [
            'functions' => [
                '_' => function($messageId, $domain = 'esroyo.userprofile::lang.messages') {
                    return Lang::get("$domain.$messageId");
                }
            ]
        ];
    }

    public function boot()
    {
        $profileFields = Settings::get('profile_field');

        if (!$profileFields) {
            return;
        }

        $profileFieldsNames = array_pluck($profileFields, 'name');
        $profileFields = array_combine($profileFieldsNames, $profileFields);

        UserModel::extend(function($model) use ($profileFieldsNames) {
            $model->addFillable($profileFieldsNames);
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
            foreach ($profileFields as $profileField) {
                // Security check
                if (!preg_match('/^[a-zA-Z_]+$/', $profileField['name'])) {
                    continue;
                } 
                if (!Schema::hasColumn('users', $profileField['name'])) {
                    $method = static::$inputTypeMapping[$profileField['type']];
                    $table->$method($profileField['name'])->nullable();
                }
            }
        });

    }

}
