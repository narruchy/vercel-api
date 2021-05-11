<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InformationExport implements FromArray, WithHeadingRow
{
    protected $informations;

    public function __construct($informations)
    {
        $this->informations = $informations;
    }

    public function array(): array
    {
        return $this->informations;
    }
}