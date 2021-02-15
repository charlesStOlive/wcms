<?php namespace Waka\Wcms\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Need Back-end Controller
 */
class Needs extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Waka.ImportExport.Behaviors.ExcelImport',
        'Waka.ImportExport.Behaviors.ExcelExport',
        'Backend.Behaviors.ReorderController',
        
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Waka.Wcms', 'wcms', 'side-menu-needs');
    }

}

