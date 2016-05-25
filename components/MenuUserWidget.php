<?php namespace Esroyo\UserProfile\Components;

use Lang;
use RainLab\User\Components\Account as UserAccountComponent;
use Exception;

class MenuUserWidget extends UserAccountComponent
{
    public function componentDetails()
    {
        return [
            'name'        => 'esroyo.userprofile::lang.account.menu_user_widget',
            'description' => 'rainlab.user::lang.account.menu_user_widget_desc'
        ];
    }

    /**
     * Executed before AJAX handlers and before the page execution life cycle.
     */
    public function init()
    {
        $this->addComponent('RainLab\User\Components\Session', 'session', []);
    }
}
