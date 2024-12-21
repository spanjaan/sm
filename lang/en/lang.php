<?php

return [
    'plugin' => [
        'name' => 'SM',
        'description' => 'A plugin for managing projects and contacts effectively.',
    ],
    'permissions' => [
        'manage_projects' => 'Manage Projects',
        'manage_contacts' => 'Manage Contacts',
    ],
    'models' => [
        'general' => [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ],
        'project' => [
            'label' => 'Project',
            'label_plural' => 'Projects',
            'menu_description' => 'Manage Projects',
            'project_color' => 'Chart Bar Color',
        ],
        'contact' => [
            'label' => 'Contact',
            'label_plural' => 'Contacts',
            'menu_description' => 'Manage Contacts',
            'contact_id' => 'Contact ID',
            'email_address' => 'Email Address',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'project' => 'Project',
            'attributes' => 'Attributes',
        ],
    ],
    'subscribe' => [
        'com_name' => 'Subscriber Component',
        'com_description' => 'Handles user subscriptions and email notifications.',
        'display_firstname' => 'Display First Name',
        'display_lastname' => 'Display Last Name',
        'thank_you_message' => 'Thank you for subscribing.',
        'invalid_email_error' => 'The provided email address is invalid.',
        'project_not_found' => 'The selected project was not found.',
        'email_exists_error' => 'The email address is already subscribed.',
        'error_generic' => 'An unexpected error occurred. Please try again later.',
        'error_sending_email' => 'An error occurred while sending the email. Please try again.',
    ],
];
