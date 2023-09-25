<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'company_name' => 'Công ty sữa Việt Nam',
                'transaction_name' => 'VINAMILK',
                'address' => 'Hà Nội',
                'email' => 'vinamilk@vietnam.com',
                'phone' => '04-891135',
                'fax' => '',
            ],
            [
                'company_name' => 'Công ty may mặc Việt Tiên',
                'transaction_name' => 'VIETTIEN',
                'address' => 'Sài Gòn',
                'email' => 'viettien@vietnam.com',
                'phone' => '08-808803',
                'fax' => '',
            ],
            [
                'company_name' => 'Tổng Công ty thực phẩm dinh dưỡng NUTRIFOOD',
                'transaction_name' => 'NUTRIFOOD',
                'address' => 'Sài Gòn',
                'email' => 'nutrifood@vietnam.com',
                'phone' => '08-809890',
                'fax' => '',
            ],
            [
                'company_name' => 'Công ty điện máy Hà Nội',
                'transaction_name' => 'MACHANOI',
                'address' => 'Hà Nội',
                'email' => 'machanoi@vietnam.com',
                'phone' => '04-898399',
                'fax' => '',
            ],
            [
                'company_name' => 'Hãng hàng không Việt...',
                'transaction_name' => 'VIETNAMAIRLINES',
                'address' => 'Sài...',
                'email' => 'vietnamairlines@vietnam.com',
                'phone' => '08-888888',
                'fax' => '',
            ],
            [
                'company_name' => 'Công ty dụng cụ học sinh MIC',
                'transaction_name' => 'MIC',
                'address' => 'Hà Nội',
                'email' => 'mic@vietnam.com',
                'phone' => '04-804408',
                'fax' => '',
            ],
        ];

        foreach ($data as $item) {
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
            DB::table('customers')->insert($item);
        }
    }
}
