<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmailTemplate;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         EmailTemplate::create([
            'type' => 'User forgot password email',
            'email_subject' => 'Your have requested to reset your password',
            'email_content' => '<p>Hi&nbsp; ###NAME###,</p><p style="padding: 0px; margin: 0px; font-family: verdana, geneva; font-size: 13px;">It is a great pleasure to have you on board at ###SITENAMECOM###!</p><p style="padding: 0px; margin: 0px; font-family: verdana, geneva; font-size: 13px;">I am confident that this site will become more and more useful as you build your teammate list and members increase in number. Please post your birdies as you achieve them so they can be recognized.&nbsp;</p><p style="padding: 0px; margin: 0px; font-family: verdana, geneva; font-size: 13px;">&nbsp;</p><p>Welcome and thank you for registering on ###SITENAMECOM###! .</p><p>The next step is to verify your account.</p><p>###ACTIVATIONURL###</p><p>May the golforce be with you....<br /><br />The team at <a href="###SITE_LINK###">###SITENAMECOM###</a></p>',
            'from_name' => '-',
            'from_email' => '-'
        ]);
    }
}
