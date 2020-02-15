<?php namespace Waka\Wcms\Updates\Seeders;

use DB;
use Excel;
use Seeder;

class SeedWcms extends Seeder
{
    public function run()
    {

        echo '--Need Import' . PHP_EOL;
        Db::table('waka_wcms_needs')->truncate();
        Excel::import(new \Waka\Wcms\Classes\Imports\NeedImport, plugins_path('waka/wcms/updates/excels/start_needs.xlsx'));

        echo '--Solution Import' . PHP_EOL;
        Db::table('waka_wcms_solutions')->truncate();
        Excel::import(new \Waka\Wcms\Classes\Imports\SolutionImport, plugins_path('waka/wcms/updates/excels/start_solutions.xlsx'));

    }

}
