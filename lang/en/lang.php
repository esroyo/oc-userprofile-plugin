<?php

return [
    'plugin' => [
        'name' => 'User Profile',
        'description' => 'Add user profile fields to front-end users.',
    ],
    'settings' => [
        'menu_label' => 'User profile',
        'menu_description' => 'Manage user profile fields.',
        'form_label' => 'User profile fields',
        'form_comment' => 'Use this section to add extra user fields.',
        'form_prompt' => 'Add a new profile field',
        'field_name_label' => 'Name',
        'field_name_comment' => 'Used as the identifier of the field.',
        'field_name_unique' => 'The name of the profile field must be unique.',
        'field_type_label' => 'Type',
        'field_label_label' => 'Label',
        'field_label_comment' => 'Displayed as the label of the field.',
        'field_tab_label' => 'Tab',
        'field_tab_comment' => 'The user account tab where the field belongs to (just visual).',
        'field_tab_default' => 'Misc',
        'field_span_label' => 'Span',
        'field_comment_label' => 'Comment',
        'field_required_label' => 'Required',
        'field_required_comment' => 'The field must be filled.',
        'field_span_auto' => 'Auto',
        'field_span_left' => 'Left',
        'field_span_right' => 'Right',
        'field_span_full' => 'Full',
    ],
    'account' => [
        'account' => 'Account (with profile)'
    ],
    'menu_user_widget' => [
        'menu_user_widget' => 'Menu User Widget',
        'menu_user_widget_desc' => 'Sign in/out widget',
        'account_page' => 'Account page',
        'account_page_desc' => 'Page name for front-end users account',
        'forgot_password_page' => 'Forgot password page',
        'forgot_password_page_desc' => 'Page name to reset the front-end users password',
    ],
    'messages' => [
        'sign_out' =>  'Sign out',
        'deactivate_account' => 'Deactivate account',
        'deactivate_account_title' => 'Deactivate your account?',
        'deactivate_account_description' => "Your account will be disabled and your details removed from the site.\nYou can reactivate your account any time by signing back in.",
        'deactivate_account_password' => 'To continue, please enter your password:',
        'deactivate_account_button' => 'Confirm Deactivate Account',
        'deactivate_account_regret' => 'I changed my mind'
    ]
];
