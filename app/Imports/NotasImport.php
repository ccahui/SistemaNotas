<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use App\Models\Nota;

class NotasImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas 
{
    /**
    * @param Collection $collection
    */
    public function collection (Collection $collection)
    {
       //$string = "";
        foreach ($collection as $row) 
        {
            $idNota = $row['id'];
            $nota1 = $row['nota_1'];
            $nota2 = $row['nota_2'];
            $nota3 = $row['nota_3'];

            Nota::where('id',$idNota)->update(
                ['notas1'=>$nota1,
                'notas2'=>$nota2,
                'notas3'=>$nota3 ]);
        }

    }
    public function headingRow(): int
    {
        return 4;
    }

}
