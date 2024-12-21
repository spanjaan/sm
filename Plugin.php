<?php

namespace SpAnjaan\Sm;

use Backend;
use System\Classes\PluginBase;

/**
 * SM Plugin Information File
 */
class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'spanjaan.sm::lang.plugin.name',
            'description' => 'spanjaan.sm::lang.plugin.description',
            'author' => 'John Gerome Baldonado',
            'icon' => 'icon-rss-square',
        ];
    }

    public function registerComponents()
    {
        return [
            \SpAnjaan\Sm\Components\Subscriber::class => 'subscribeForm',
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'spanjaan.sm::mail.confirmed_opt_in' => 'Sent after subscription confirmation.',
        ];
    }

    public function registerNavigation()
    {
        return [
            'sm' => [
                'label' => 'spanjaan.sm::lang.plugin.name',
                'icon' => 'icon-rss-square',
                'url' => Backend::url('spanjaan/sm/projects'),
                'permissions' => ['spanjaan.sm.*'],
                'order' => 500,
                'sideMenu' => [
                    'projects' => [
                        'label' => 'spanjaan.sm::lang.models.project.label_plural',
                        'icon' => 'icon-folder',
                        'url' => Backend::url('spanjaan/sm/projects'),
                        'permissions' => ['spanjaan.sm.manage_projects'],
                        'description' => 'spanjaan.sm::lang.models.project.menu_description',
                    ],
                    'contacts' => [
                        'label' => 'spanjaan.sm::lang.models.contact.label_plural',
                        'icon' => 'icon-users',
                        'url' => Backend::url('spanjaan/sm/contacts'),
                        'permissions' => ['spanjaan.sm.manage_contacts'],
                        'description' => 'spanjaan.sm::lang.models.contact.menu_description',
                    ],
                ],
            ],
        ];
    }

    public function registerPermissions()
    {
        return [
            'spanjaan.sm.manage_projects' => [
                'label' => 'spanjaan.sm::lang.permissions.manage_projects',
                'tab' => 'spanjaan.sm::lang.plugin.name',
            ],
            'spanjaan.sm.manage_contacts' => [
                'label' => 'spanjaan.sm::lang.permissions.manage_contacts',
                'tab' => 'spanjaan.sm::lang.plugin.name',
            ],
        ];
    }
}
