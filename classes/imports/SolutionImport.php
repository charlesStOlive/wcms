<?php

namespace Waka\Wcms\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use System\Models\File;
use Waka\Wcms\Models\Solution;

class SolutionImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $solution = new Solution();
            $solution->name = $row['name'];
            $solution->slug = $row['slug'];

            $solution->description = $row['description'];
            $solution->content = json_decode($row['content']);
            // $solution->kpi =  $row['kpi'];
            // $solution->icone =  $row['icone'];
            $image = new File();
            $image->is_public = true;
            $image->data = plugins_path('waka/wcms/updates/files/pictures/solutions/' . $row['main_image']);
            $solution->main_image = $image;
            $image->save();
            $solution->save();
        }
    }
}
