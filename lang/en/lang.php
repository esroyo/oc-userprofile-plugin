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
        'field_name_comment' => 'Used as the identifier of the field .',
        'field_type_label' => 'Type',
        'field_label_label' => 'Label',
        'field_label_comment' => 'Displayed as the label of the field.',
        'field_tab_label' => 'Tab',
        'field_tab_comment' => 'The user account tab where the field belongs to (just visual).',
        'field_tab_default' => 'Misc',
        'field_span_label' => 'Span',
        'field_comment_label' => 'Comment'
    ],
    'account' => [
        'account' => 'Account (with profile)',
        'menu_user_widget' => 'Menu user widget',
        'menu_user_widget_desc' => 'Sign in/out widget'
    ]
];
