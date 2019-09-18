<?php

use Illuminate\Database\Seeder;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Humanities Journal of Language and Cultural Research',
            'description' => 'The articles published in this Journal is Specially made for Humanities and Language.',
            
        ]);
        DB::table('categories')->insert([
            'name' => 'International Journal of Humanities and Communication Studies.',
            'description' => 'These Journal relates to people in Faculty of Humanities and Linguistics.',
            
        ]);
        DB::table('categories')->insert([
            'name' => 'International Journal of Biological Research Advancement',
            'description' => 'All about advanced biology',
            
        ]);
        DB::table('categories')->insert([
            'name' => 'International Journal of Applied Scientific Research and Development',
            'description' => 'Contains articles related to Applied sciences.',
            
        ]);
        DB::table('categories')->insert([
            'name' => 'Engineering International Journal of Engineering',
            'description' => 'Containers Articles related to Engineering Society.',
            
        ]);
        DB::table('categories')->insert([
            'name' => 'Engineering International Journal of Engineering',
            'description' => 'Containers Articles related to Engineering Society.',
            
        ]);
        DB::table('categories')->insert([
            'name' => 'Social Science International Journal Of Political and Social Research',
            'description' => 'Contains articles and research work related to Social Sciences..',
            
        ]);
        DB::table('categories')->insert([
            'name' => 'International Journal of Legal and Judicial Research',
            'description' => 'Contains articles and research work related to Law.',
            
        ]);
        DB::table('categories')->insert([
            'name' => 'Management Science International Journal of Business, Economic and Financial Research.',
            'description' => 'Articles related to Management,business and Financial Issues.',
            
        ]);
        DB::table('categories')->insert([
            'name' => 'Journal of Hospitality and Tourism Management.',
            'description' => 'All articles relating to Hospitality and Tourism Management.',
            
        ]);
        DB::table('categories')->insert([
            'name' => 'Educational International Journal of Innovative Education Practice.',
            'description' => 'Articles on Educational Practice and Innovation..',
            
        ]);
        DB::table('categories')->insert([
            'name' => 'International Journal of Educational Policy and Practice',
            'description' => 'Contains Articles and Research work on Educational Policies and Practices.',
            
        ]);
    
    }
}
