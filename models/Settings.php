<?php namespace Esroyo\UserProfile\Models;

use Lang;
use Model;
use System\Models\MailTemplate;
use RainLab\User\Models\User as UserModel;

class Settings extends Model 
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'user_profile_settings';
    public $settingsFields = 'fields.yaml';
}
