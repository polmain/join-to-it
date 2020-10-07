<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Company::factory()
			->times(10000)
			->create()
			->each(function ($company) {
				$company
					->employees()
					->save(Employee::factory()
					->make());
			});
    }
}
