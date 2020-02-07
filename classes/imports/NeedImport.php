<?php

namespace Waka\Wcms\Classes\Imports;

use Waka\Wcms\Models\Need;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use System\Models\File;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NeedImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $need =  new Need();
            $need->name =  $row['name'];
            $need->slug =  str_slug($row['name']);
            $need->intro =  $row['intro'];
            // $need->catchline =  $row['catchline'];
            $need->description =  $row['description'];
            // $need->kpi =  $row['kpi'];
            // $need->icone =  $row['icone'];
            $image = new File();
            $image->is_public = true;
            $image->data = plugins_path('waka/wcms/updates/files/pictures/needs/'.$row['main_image']);
            $need->main_image = $image;
            $image->save();
            $need->save();
        }
    }
}

