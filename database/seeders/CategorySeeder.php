<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Accounting / Finance',
            'Architecture / Interior Designing',
            'Banking / Insurance /Financial Services',
            'Commercial / Logistics / Supply Chain',
            'Construction / Engineering / Architects',
            'Creative / Graphics / Designing',
            'Education Counseling / Career Counseling',
            'Fashion / Textile Designing',
            'General Mgmt. / Administration / Operation',
            'Healthcare / Pharma / Biotech / Medical',
            'Hospitality',
            'Human Resource /Org. Development',
            'IT & Telecommunication',
            'Legal Services',
            'Marketing / Advertising / Customer Service',
            'NGO / INGO / Social work',
            'Others',
            'Production / Maintenance / Quality',
            'Research and Development',
            'Sales / Public Relations',
            'Secretarial / Front Office / Data Entry',
            'Teaching / Education'
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name)
            ]);
        }
    }
}
