<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->getData() as $companyData) {
            $company = Company::create([
                'name' => $companyData['name'],
                'zh_name' => $companyData['zh_name'],
            ]);

            foreach ($companyData['members'] as $member) {
                $user = User::create([
                    'name' => Arr::get($member,'name'),
                    'email' => Arr::get($member,'email'),
                    'mobile' => Arr::get($member,'mobile'),
                    'password' => Hash::make('password'),
                    'company_id' => $company->id,
                ]);
            }
        }

    }

    private function getData(): array
    {
        return [
            [
                'name' => 'Diamond Territory',
                'zh_name' => '御宴',
                'members' => [
                    [
                        'name' => 'Ryan Zeng',
                        'email' => 'zengruijiang@gmail.com',
                        'mobile' => '0438001663',
                    ],
                    [
                        'name' => 'Andrew',
                        'email' => 'Andrew@gmail.com',
                        'mobile' => '0400000000',
                    ],
                ]
            ]
        ];
    }
}
