<?php namespace Esroyo\UserProfile\Components;

use Lang;
use RainLab\User\Components\Account as UserAccountComponent;
use Esroyo\UserProfile\Models\Settings;
use Exception;

class Account extends UserAccountComponent
{
    public function componentDetails()
    {
        return [
            'name'        => 'esroyo.userprofile::lang.account.account',
            'description' => 'rainlab.user::lang.account.account_desc'
        ];
    }

    /**
     * Executed before AJAX handlers and before the page execution life cycle.
     */
    public function init()
    {
        $this->addComponent('RainLab\User\Components\Account', '_account', []);
    }

    /**
     * Executed when this component is bound to a page or layout.
     */
    public function onRun()
    {

        $this->page['__PARENT__'] = '_account';
        $this->page['__PREFIX__'] = 'user_profile_';
        $this->page['user_profile_fields'] = $this->getProfileFieldsByIndex();

        return parent::onRun();
    }

    private function getProfileFieldsByIndex($index = 'tab')
    {
        $profileFields = Settings::get('profile_field');
        $default = $index === 'tab' ?
            Lang::get('esroyo.userprofile::lang.settings.field_tab_default') : 'undefined';

        if (!$profileFields || !array_key_exists($index, reset($profileFields))) {
            return [];
        }

        $profileFieldsByIndex = array_fill_keys(
            array_unique(array_filter(array_pluck($profileFields, $index))) + [$default],
            []
        );

        foreach ($profileFields as $profileField) {
            $fieldIndex = $profileField[$index] ? $profileField[$index] : $default;
            $profileFieldsByIndex[$fieldIndex][] = $profileField;
        }

        return $profileFieldsByIndex;
    }
}
