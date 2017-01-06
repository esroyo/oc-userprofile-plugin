<?php

return [
    'plugin' => [
        'name' => 'Benutzerprofil',
        'description' => 'Fügen Sie Benuterprofilfelder für Frontend-Benutzer hinzu.',
    ],
    'settings' => [
        'menu_label' => 'Benutzerprofil',
        'menu_description' => 'Benutzerprofilfelder verwalten.',
        'form_label' => 'Benuterprofilfelder',
        'form_comment' => 'Verwenden Sie diesen Abschnitt um zusätzliche Benutzerfelder hinzuzufügen.',
        'form_prompt' => 'Ein neues Profilfeld hinzufügen',
        'field_name_label' => 'Name',
        'field_name_comment' => 'Wird als Bezeichnung für das Feld verwendet.',
        'field_name_unique' => 'Der Name des Profilfelds muss eindeutig sein.',
        'field_type_label' => 'Typ',
        'field_label_label' => 'Beschriftung',
        'field_label_comment' => 'Wird als Beschriftung des Felds dargestellt.',
        'field_tab_label' => 'Tab',
        'field_tab_comment' => 'Der Benutzerkonto-Tab zu wessen das Feld gehört (nur visuell).',
        'field_tab_default' => 'Versch.',
        'field_span_label' => 'Orientierung',
        'field_comment_label' => 'Kommentar',
        'field_required_label' => 'Erforderlich',
        'field_required_comment' => 'Dieses Feld muss ausgefüllt werden.',
        'field_span_auto' => 'Auto',
        'field_span_left' => 'Links',
        'field_span_right' => 'Rechts',
        'field_span_full' => 'Voll',
    ],
    'account' => [
        'account' => 'Benutzerkonto (mit Profil)'
    ],
    'menu_user_widget' => [
        'menu_user_widget' => 'Benutzer Menü Widget',
        'menu_user_widget_desc' => 'Login In/Out Widget',
        'account_page' => 'Benutzerkonto Seite',
        'account_page_desc' => 'Seitenname für das Frontend Benutzerkonto',
        'forgot_password_page' => 'Passwort vergessen Seite',
        'forgot_password_page_desc' => 'Seitenname für das Zurücksetzte des Frontend Benutzers',
    ],
    'messages' => [
        'sign_out' => 'Logout',
        'deactivate_account' => 'Benutzerkonto deaktivieren',
        'deactivate_account_title' => 'Wollen Sie wirklich Ihr Benutzerkonto deaktivieren?',
        'deactivate_account_description' => "Ihr Benuterkonto wird deaktiviert und Ihre Angaben von der Webseite entfernt.\nSie können das Benutzerkonto jederzeit durch einloggen wieder aktivieren.",
        'deactivate_account_password' => 'Um weiterzufahren, geben Sie bitte Ihr Passwort ein:',
        'deactivate_account_button' => 'Benutzerkonto Deaktivierung Bestätigen',
        'deactivate_account_regret' => 'Ich hab es mir anders überlegt.'
    ]
];
