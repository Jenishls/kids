<?php

use Illuminate\Database\Seeder;

class CmsPagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('set foreign_key_checks = 0');

        \DB::table('cms_pages')->delete();
        \DB::statement('set foreign_key_checks = 1');
        \DB::table('cms_pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'template_id' => 3,
                'page_name' => 'Home',
                'page_code' => NULL,
                'target' => '/netlifytemp',
                'site_title' => NULL,
                'site_keyword' => NULL,
                'site_description' => NULL,
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-20 14:56:56',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'template_id' => 3,
                'page_name' => 'Services',
                'page_code' => NULL,
                'target' => '/netlifytemp/services',
                'site_title' => 'Smudge-Services',
                'site_keyword' => 'smudge, services,cms,shubhu',
                'site_description' => 'Smudge services page',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-20 15:15:16',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'template_id' => 3,
                'page_name' => 'Portfolio',
                'page_code' => NULL,
                'target' => '/netlifytemp/portfolio',
                'site_title' => 'Smudge-Portfolio',
                'site_keyword' => 'smudge, portfolio, shubhu',
                'site_description' => 'Smudge Portfolio page',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-20 17:20:34',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'template_id' => 3,
                'page_name' => 'Blog',
                'page_code' => NULL,
                'target' => '/netlifytemp/blog',
                'site_title' => 'Smudge-Blogs',
                'site_keyword' => 'blog,smudge,shubhu',
                'site_description' => 'smudge blog page',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-20 17:22:39',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'template_id' => 3,
                'page_name' => 'About Us',
                'page_code' => NULL,
                'target' => '/netlifytemp/about',
                'site_title' => 'Smudge-About',
                'site_keyword' => 'about smudge,',
                'site_description' => 'Smudge about us page',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-20 17:24:13',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'template_id' => 3,
                'page_name' => 'Career',
                'page_code' => NULL,
                'target' => '/netlifytemp/career',
                'site_title' => 'Smudge-Career',
                'site_keyword' => 'career, smudge',
                'site_description' => 'Smudge Career page',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-20 17:26:40',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'template_id' => 3,
                'page_name' => 'Pricing',
                'page_code' => NULL,
                'target' => '/netlifytemp/pricing',
                'site_title' => 'Smudge-Pricing',
                'site_keyword' => 'pricing, smudge',
                'site_description' => 'Smudge Pricing plan',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-20 17:28:02',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'template_id' => 3,
                'page_name' => 'Single Career',
                'page_code' => NULL,
                'target' => '/netlifytemp/singlecareer',
                'site_title' => 'Smudge-Career',
                'site_keyword' => 'career,smudge',
                'site_description' => 'Smudge single career page',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-20 17:29:22',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'template_id' => 3,
                'page_name' => 'Single Team',
                'page_code' => NULL,
                'target' => '/netlifytemp/singleteam',
                'site_title' => 'Smudge-Team',
                'site_keyword' => 'team,smudge',
                'site_description' => 'Smudge Teams page',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-20 17:31:27',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'template_id' => 3,
                'page_name' => 'Contact',
                'page_code' => NULL,
                'target' => '/netlifytemp/contact',
                'site_title' => 'Smudge-Contact Us',
                'site_keyword' => 'contact, smudge,',
                'site_description' => 'smudge contact page',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-20 17:33:20',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'template_id' => 3,
                'page_name' => 'Error',
                'page_code' => NULL,
                'target' => '/netlifytemp/error',
                'site_title' => 'Smudge-404 page',
                'site_keyword' => 'error ,smudge',
                'site_description' => 'Smudge error page',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-20 17:35:21',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'template_id' => 4,
                'page_name' => 'home',
                'page_code' => NULL,
                'target' => '/cratesonskates',
                'site_title' => 'Crates On Skates',
                'site_keyword' => 'crates',
                'site_description' => 'crates',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-28 14:56:52',
                'updated_at' => '2019-11-29 17:10:49',
            ),
            12 => 
            array (
                'id' => 13,
                'template_id' => 4,
                'page_name' => 'Residential',
                'page_code' => NULL,
                'target' => '/cratesonskates/residential',
                'site_title' => 'crates',
                'site_keyword' => 'crates',
                'site_description' => 'crates',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-29 17:12:43',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'template_id' => 4,
                'page_name' => 'Office',
                'page_code' => NULL,
                'target' => '/cratesonskates/office',
                'site_title' => 'Office',
                'site_keyword' => 'office',
                'site_description' => NULL,
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-29 19:38:46',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'template_id' => 4,
                'page_name' => 'products',
                'page_code' => NULL,
                'target' => '/cratesonskates/products',
                'site_title' => 'Products',
                'site_keyword' => NULL,
                'site_description' => NULL,
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-29 19:39:02',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'template_id' => 4,
                'page_name' => 'About Us',
                'page_code' => NULL,
                'target' => '/cratesonskates/about',
                'site_title' => 'about',
                'site_keyword' => NULL,
                'site_description' => NULL,
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-29 19:39:12',
                'updated_at' => '2019-12-02 17:54:38',
            ),
            16 => 
            array (
                'id' => 17,
                'template_id' => 4,
                'page_name' => 'Contact',
                'page_code' => NULL,
                'target' => '/cratesonskates/contact',
                'site_title' => 'Contact',
                'site_keyword' => NULL,
                'site_description' => NULL,
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-29 19:39:26',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'template_id' => 4,
                'page_name' => 'faq',
                'page_code' => NULL,
                'target' => '/cratesonskates/faq',
                'site_title' => 'faq',
                'site_keyword' => NULL,
                'site_description' => NULL,
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-29 19:39:37',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'template_id' => 4,
                'page_name' => 'Buy Now',
                'page_code' => NULL,
                'target' => '/cratesonskates/buynow',
                'site_title' => 'Crates On Skates',
                'site_keyword' => 'crates',
                'site_description' => 'crates',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-12-03 18:44:54',
                'updated_at' => '2019-12-03 19:02:14',
            ),
            19 => 
            array (
                'id' => 21,
                'template_id' => 4,
                'page_name' => 'login',
                'page_code' => NULL,
                'target' => NULL,
                'site_title' => 'crate',
                'site_keyword' => NULL,
                'site_description' => NULL,
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-12-10 18:54:05',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 22,
                'template_id' => 4,
                'page_name' => 'Commercial',
                'page_code' => NULL,
                'target' => NULL,
                'site_title' => 'crates',
                'site_keyword' => 'crates',
                'site_description' => 'crates',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-12-13 16:37:12',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 23,
                'template_id' => 4,
                'page_name' => 'dashboard',
                'page_code' => NULL,
                'target' => NULL,
                'site_title' => NULL,
                'site_keyword' => NULL,
                'site_description' => NULL,
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-12-13 18:08:48',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 24,
                'template_id' => 4,
                'page_name' => 'Register',
                'page_code' => NULL,
                'target' => NULL,
                'site_title' => 'auth',
                'site_keyword' => 'auth',
                'site_description' => 'auth',
                'content' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-12-24 18:58:36',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}