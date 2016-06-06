<?php namespace Esroyo\UserProfile\Models;

use Lang;
use Model;
use Validator;
use ValidationException;
use System\Models\MailTemplate;
use RainLab\User\Models\User as UserModel;

class Settings extends Model 
{
    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'user_profile_settings';
    public $settingsFields = 'fields.yaml';
    public $rules = [
        'name' => ['required', 'regex:/^[a-zA-Z_]+$/', 'not_in:id,name,email,password,activation_code,persist_code,reset_password_code,permissions,is_activated,activated_at,last_login,created_at,updated_at,username,surname,deleted_at'],
        'type' => 'required|in:text,number,password,textarea',
        'label' => 'required|regex:/\w+/'
    ];

	public function __construct()
	{
		parent::__construct();

        $this->bindEvent('model.beforeSave', [$this, 'beforeModelSave']);
	}

    public function beforeModelSave()
    {
        /*
         * Validate configuration
         */
		$value = json_decode($this->attributes['value'], true);

		if ($value === null) {
			return;
		}

		$profileFields = $value['profile_field'];

		$uniqueNames = array_unique(array_pluck($profileFields, 'name'));
		if (count($uniqueNames) !== count($profileFields)) {
			throw new ValidationException(
                // fake validator for message shake
				Validator::make(
                    [],
                    $this->rules,
					['name.required' => Lang::get('esroyo.userprofile::lang.settings.field_name_unique')]
				)
			);
		}

        foreach ($value['profile_field'] as $idx => $profileField) {
			$validator =  Validator::make($profileField, $this->rules);
            if ($validator->fails()) {
				throw new ValidationException($validator);
            }
        }
    }
}
