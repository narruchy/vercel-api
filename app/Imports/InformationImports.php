<?php

namespace App\Imports;

use App\Models\Information;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class InformationImports implements ToCollection
{

  use Importable;
      
    public function collection($rows)
    {
      foreach ($rows as $row) 
        {
          Information::create(
            [
              'name' => $row[0],
              'gender' => 'Hello',
              'phone' => 'Hello',
              'email' => 'Hello',
              'address' => 'Hello',
              'nationality' => 'Hello',
              'dob' => '2021/03/02',
              'education_background' => 'Hello',
              'contact_via' => 'Hello',
              ]
            );
      }
    }
}