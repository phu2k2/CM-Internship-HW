<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'company_id' => 'DAF',
                'company_name' => 'Nội Thất Đài Loan Dafuco',
                'transaction_name' => 'DAFUCO',
                'address' => 'Quy Nhơn',
                'phone' => '056-888111',
                'fax' => null,
                'email' => 'dafuco@vietnam.com',
            ],
            [
                'company_id' => 'DQV',
                'company_name' => 'Công ty máy tính Quang Vũ',
                'transaction_name' => 'QUANGVU',
                'address' => 'Quy Nhơn',
                'phone' => '056-888777',
                'fax' => null,
                'email' => 'quangvu@vietnam.com',
            ],
            [
                'company_id' => 'GOL',
                'company_name' => 'Công ty sản xuất dụng cụ học sinh Golden',
                'transaction_name' => 'GOLDEN',
                'address' => 'Quy Nhơn',
                'phone' => '056-891135',
                'fax' => null,
                'email' => 'golden@vietnam.com',
            ],
            [
                'company_id' => 'MVT',
                'company_name' => 'Công ty may mặc Việt Tiến',
                'transaction_name' => 'VIETTIEN',
                'address' => 'Sài Gòn',
                'phone' => '08-808803',
                'fax' => null,
                'email' => 'vietien@vietnam.com',
            ],
            [
                'company_id' => 'SCM',
                'company_name' => 'Siêu thị Coop-mart',
                'transaction_name' => 'COOPMART',
                'address' => 'Quy Nhơn',
                'phone' => '056-888666',
                'fax' => null,
                'email' => 'coopmart@vietnam.com',
            ],
            [
                'company_id' => 'VNM',
                'company_name' => 'Công ty sữa Việt Nam',
                'transaction_name' => 'VINAMILK',
                'address' => 'Hà Nội',
                'phone' => '04-891135',
                'fax' => null,
                'email' => 'vinamilk@vietnam.com',
            ],
        ];

        foreach ($suppliers as $supplier) {
            $supplier['created_at'] = Carbon::now();
            $supplier['updated_at'] = Carbon::now();
            DB::table('suppliers')->insert($supplier);
        }
    }
}
