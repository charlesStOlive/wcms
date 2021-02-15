<?php namespace Waka\Wcms\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Waka\Wcms\Models\Need;

class NeedsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $need = new Need();
            $need->id = $row['id'] ?? null;
            $need->name = $row['name'] ?? null;
            $need->slug = $row['slug'] ?? null;
            $need->description = $row['description'] ?? null;
            $need->state = $row['state'] ?? null;
            $need->save();
        }
    }
}
