<?php

namespace Waka\Wcms\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use System\Models\File;
use Waka\Wcms\Models\Need;
use Waka\Wcms\Models\Solution;

class NeedImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $modelSolutions = Solution::lists('id', 'slug');
        foreach ($rows as $row) {

            $need = new Need();

            $need->name = $row['name'];
            $need->slug = str_slug($row['name']);
            $need->intro = $row['intro'];
            $need->description = $row['description'];
            $need->content = json_decode($row['content']);
            $image = new File();
            $image->is_public = true;
            $image->data = plugins_path('waka/wcms/updates/files/pictures/needs/' . $row['main_image']);
            $need->main_image = $image;
            $image->save();
            $need->save();
            //traitement des liaison
            $row_solutions = explode(',', $row['solutions']);
            trace_log('modelSolutions');
            trace_log($modelSolutions);
            foreach ($row_solutions as $slug) {
                trace_log('slug : ' . $slug);
                $solution_id = $modelSolutions[trim($slug)] ?? null;
                if ($solution_id) {
                    $need->solutions()->attach(Solution::find($solution_id));
                } else {
                    trace_log("ce slug : " . $slug . " n'a pas été trouvé");
                }
            }
            //fin du traitement des liaisons
        }
    }
}
