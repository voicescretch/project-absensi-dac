<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\{
    ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnFailure,
    SkipsFailures
};

class EmployeeImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    public function model(array $row)
    {
        return new Employee([
            'division_id' => $row['division_id'],
            'id_number'   => $row['id_number'],
            'name'        => $row['name'],
            'shift'       => $row['shift'],
            'contact'     => $row['contact'],
            'location'    => $row['location'],
        ]);
    }

    public function rules(): array
    {
        return [
            'division_id' => ['required', 'exists:divisions,id'],
            'id_number'   => ['required'],
            'name'        => ['required'],
            'shift'       => ['required', Rule::in(['pagi', 'malam'])],
            'contact'     => ['required'],
            'location'    => ['required'],
        ];
    }
}