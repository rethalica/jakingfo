<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    private $rowNo = 0;

    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Email',
            'Bergabung pada'
        ];
    }

    public function map($user): array
    {
        $this->rowNo++;  // Increment row number
        return [
            $this->rowNo,
            $user->name,
            $user->email,
            $user->created_at,
        ];
    }
}
