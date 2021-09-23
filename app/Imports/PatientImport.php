<?php

namespace App\Imports;

use App\patient;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class PatientImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return patient|null
     */
    public function model(array $row)
    {
        return new patient([
            'patient_id'     => $row[0],
            'name'     => $row[1],
            'address'     => $row[2],
            'email'     => $row[3],
           'phone'     => $row[4],
           'age'     => $row[5],
           'weight'     => $row[6],
           'height'     => $row[7],
           'bmi'     => $row[8],
           'diabetes'     => $row[9],
           'cholesterol'     => $row[10],
           'pressure'     => $row[11],
           'diseases'     => $row[12],
           'others'     => $row[13],
           'textarea_issues'     => $row[14],
           'allergies'     => $row[15],
           'smoking'     => $row[16],
           'alcohol'     => $row[17],
        ]);
    }
}