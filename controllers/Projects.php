<?php namespace SpAnjaan\Sm\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Projects Backend Controller
 */
class Projects extends Controller
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
        'spanjaan.sm.projects.manage_all',
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('SpAnjaan.Sm', 'sm', 'projects');
    }
}
