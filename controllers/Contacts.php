<?php namespace SpAnjaan\Sm\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Contacts Backend Controller
 */
class Contacts extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    /**
     * @var array Permissions required to view this page.
     */
    protected $requiredPermissions = [
        'spanjaan.sm.contacts.manage_all',
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('SpAnjaan.Sm', 'sm', 'contacts');
    }
}
