<?php

use Illuminate\Database\Seeder;

class FaqRepliesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('faq_replies')->delete();
        
        \DB::table('faq_replies')->insert(array (
            0 => 
            array (
                'id' => 7,
                'faq_id' => 9,
                'answer' => 'No, the moving is up to you! However we do have relationships with some local authorized moving companies that we can recommend.',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:24:58',
                'updated_at' => '2020-01-17 17:59:20',
            ),
            1 => 
            array (
                'id' => 8,
                'faq_id' => 10,
                'answer' => 'Yes. During delivery, we will need you to sign the Crates on Skates rental agreement. During pickup, we will need you to be present while we count and inspect your crates.',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:32:39',
                'updated_at' => '2020-01-17 17:32:39',
            ),
            2 => 
            array (
                'id' => 9,
                'faq_id' => 11,
                'answer' => 'Pickup and delivery is included in the Crates on Skates rental price for most zip codes in the greater Austin area. Some zip codes a little farther away from central Austin will include additional delivery/pickup fees but you will be notified of these during the ordering process.',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:33:24',
                'updated_at' => '2020-01-17 17:33:24',
            ),
            3 => 
            array (
                'id' => 10,
                'faq_id' => 12,
                'answer' => 'Our Crates on Skates truck and driver will deliver your crates to your front door or garage. They stack neatly inside each other 20 crates high and don’t take up much room. Our driver will even deliver the crates right inside your house or business, whatever you prefer!',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:33:56',
                'updated_at' => '2020-01-17 17:33:56',
            ),
            4 => 
            array (
                'id' => 11,
                'faq_id' => 13,
                'answer' => 'We accept all major credit cards. For residential and office orders, full payment is required prior to delivery of your Crates on Skates.',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:34:34',
                'updated_at' => '2020-01-17 17:34:34',
            ),
            5 => 
            array (
                'id' => 12,
                'faq_id' => 14,
                'answer' => 'Absolutely! When you first place your order, we will send you a confirmation email. Then, we will call to confirm delivery details the day before. Plus, we’ll call you the day prior to your scheduled pickup to confirm those details. If you need to make any modifications to your order, delivery or pickup, don’t hesitate to call!',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:34:57',
                'updated_at' => '2020-01-17 17:34:57',
            ),
            6 => 
            array (
                'id' => 13,
                'faq_id' => 15,
                'answer' => 'Yes, call if you need them longer than your initial rental period and we can extend the rental.',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:35:23',
                'updated_at' => '2020-01-17 17:35:23',
            ),
            7 => 
            array (
                'id' => 14,
                'faq_id' => 16,
                'answer' => 'We will do our best to help you select the correct amount of crates. However, you are the best judge of how much stuff you have. When in doubt, order a few more crates than you think you’ll need. If you do need additional crates, there will be a $25 delivery fee added to the order. You can add additional crates and moving supplies a la carte after your initial delivery. You will need to call us to order a la carte. Additional crates will be delivered within 24 hours after the call.',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:35:47',
                'updated_at' => '2020-01-17 17:35:47',
            ),
            8 => 
            array (
                'id' => 15,
                'faq_id' => 17,
                'answer' => 'Yes! Between each rental the crates are cleaned in a two-step process. First, we remove any loose debris by blowing the boxes out with high pressure compressed air. Next, the crates are thoroughly hand cleaned and sanitized after each use using eco-friendly biodegradable cleaners.',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:36:14',
                'updated_at' => '2020-01-17 17:36:14',
            ),
            9 => 
            array (
                'id' => 16,
                'faq_id' => 18,
                'answer' => 'For delivery up flights of stairs, there will be an additional charge at checkout.',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:36:34',
                'updated_at' => '2020-01-17 17:36:34',
            ),
            10 => 
            array (
                'id' => 17,
                'faq_id' => 19,
                'answer' => 'Yes we can deliver outside the Austin area for a custom delivery charge. Please contact us at 512-298-1111 or sales@cratesonskates.com for a quote.',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:36:56',
                'updated_at' => '2020-01-17 17:36:56',
            ),
            11 => 
            array (
                'id' => 18,
                'faq_id' => 20,
                'answer' => 'They are a convenient way to move your clothing from closet to closet without taking each article on and off the hanger.',
                'parent_id' => NULL,
                'is_child' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-17 17:37:14',
                'updated_at' => '2020-01-17 17:37:14',
            ),
        ));
        
        
    }
}