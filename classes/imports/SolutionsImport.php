<?php namespace Waka\Wcms\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Waka\Wcms\Models\Solution;

class SolutionsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $solution = new Solution();
            $solution->id = $row['id'] ?? null;
            $solution->name = $row['name'] ?? null;
            $solution->slug = $row['slug'] ?? null;
            $solution->description = $row['description'] ?? null;
            $solution->state = $row['state'] ?? null;
            $solution->save();
        }
    }
}
