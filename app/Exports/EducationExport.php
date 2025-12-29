<?php

namespace App\Exports;

use App\Models\Education;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EducationExport implements FromCollection, WithHeadings, WithMapping, WithCustomCsvSettings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Education::where('user_id', auth()->user()->id)->select('educational_level', 'school_name', 'entry_year', 'graduation_year', 'choice')->get();
    }

    public function headings(): array {
        return [
            'No', 
            'Educational Level', 
            'School Name', 
            'Entry Year', 
            'Graduation Year', 
            'Choice',
        ];
    }

    public function map($row): array{
        static $no = 1;
        return [
            $no++,
            $row->educational_level,
            $row->school_name,
            $row->entry_year,
            $row->graduation_year,
            $row->choice == 1 ?
            'Formal' : 'Non-Formal',
        ];
    }

    public function getCsvSettings(): array {
        return[
            'delimiter' => ';',
            'use_bom' => true,
        ];
    }
}

