<?php

return [
    'plugin' => [
        'name' => 'Perfil d\'Usuària',
        'description' => 'Afegiu camps de perfil a les usuàries públiques.',
    ],
    'settings' => [
        'menu_label' => 'Perfil d\'Usuària',
        'menu_description' => 'Gestioneu els camps del perfil.',
        'form_label' => 'Camps del perfil de la usuària',
        'form_comment' => 'Useu aquesta secció per afegir camps d\'usuària addicionals.',
        'form_prompt' => 'Afegeix un camp de perfil',
        'field_name_label' => 'Nom',
        'field_name_comment' => 'S\'usa com a identificador del camp.',
        'field_name_unique' => 'El nom del camp ha de ser únic.',
        'field_type_label' => 'Tipus',
        'field_label_label' => 'Etiqueta',
        'field_label_comment' => 'Es mostra com a etiqueta del camp.',
        'field_tab_label' => 'Pestanya',
        'field_tab_comment' => 'A quina pestanya del compte de la usuària s\'ha de mostrar el camp.',
        'field_tab_default' => 'Misc',
        'field_span_label' => 'Span',
        'field_comment_label' => 'Comentari',
        'field_required_label' => 'Obligatori',
        'field_required_comment' => 'El camp s\'ha d\'emplenar.',
        'field_span_auto' => 'Automàtic',
        'field_span_left' => 'Esquerra',
        'field_span_right' => 'Dreta',
        'field_span_full' => 'Tot',
    ],
    'account' => [
        'account' => 'Compte (amb perfil)'
    ],
    'menu_user_widget' => [
        'menu_user_widget' => 'Giny d\'usuària per al menú',
        'menu_user_widget_desc' => 'Giny per a Entrar/Sortir',
        'account_page' => 'Compte d\'usuària',
        'account_page_desc' => 'La pàgina del compte de les usuàries',
        'forgot_password_page' => 'Recuperació de contrasenya',
        'forgot_password_page_desc' => 'La pàgina on les usuàries poden reiniciar la contrasenya',
    ],
    'messages' => [
        'sign_out' =>  'Surt',
        'deactivate_account' => 'Desactiva el compte',
        'deactivate_account_title' => 'Esteu segura que voleu desactivar el compte?',
        'deactivate_account_description' => "El vostre compte es desactivarà i els vostres detalls s'esborraràn de la pàgina.\nPodreu reactivar el compte en qualsevol moment tornant a Entrar.",
        'deactivate_account_password' => 'Per a continuar, per favor introduïu la vostra contrasenya:',
        'deactivate_account_button' => 'Confirma la Desactivació del Compte',
        'deactivate_account_regret' => 'M\'ho he repensat'
    ]
];
