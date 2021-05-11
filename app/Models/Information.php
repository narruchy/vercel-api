<?php

namespace App\Models;

use App\Exports\InformationExport;
use App\Imports\InformationImports;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Information extends Model
{
    const FILE_NAME = 'information.xlsx';
    use HasFactory;

    protected $table        = 'information';
    protected $dates        = ['created_at', 'updated_at', 'dob'];
    protected $fillable     = ['name', 'gender', 'phone', 'email', 'address', 'nationality', 'dob', 'education_background', 'contact_via'];

    public static function getExcelData()
    {
        if (!file_exists(Storage::path(self::FILE_NAME))) {
            return;
        }
        $arr = [];
        $information = Excel::toCollection(new InformationImports, 'information.xlsx')[0];
        unset($information[0]);


        foreach ($information as $value) {
            $arr[] = [
                'name'                  => $value[0],
                'gender'                => $value[1],
                'email'                 => $value[2],
                'phone'                 => $value[3],
                'address'               => $value[4],
                'dob'                   => $value[5],
                'nationality'           => $value[6],
                'contact_via'           => $value[7],
                'education_background'  => $value[8]
            ];
        }
        // $data = self::paginate($arr);

        return $arr;
    }

    public static function saveToExcel($req)
    {
        $file  = 'information.xlsx';
        $row   = ['Name', 'Gender', 'Email', 'Phone', 'Address', 'DOB', 'Nationality', 'Contact Via', 'Educational Background'];
        $data = [
            $req['name'],
            $req['gender'],
            $req['email'],
            $req['phone'],
            $req['address'],
            $req['dob'],
            $req['nationality'],
            $req['contact_via'],
            $req['education_background']
        ];

        if (!file_exists(Storage::path($file))) {
            Excel::store(new InformationExport([$row]), 'information.xlsx');
        }

        $info = Excel::toArray(new InformationImports, 'information.xlsx');

        array_push($info, [$data]);

        Excel::store(new InformationExport($info), 'information.xlsx');

        return true;
    }

    public static function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
