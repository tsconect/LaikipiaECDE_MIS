<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    public function run()
    {
        FAQ::create([
            'question' => 'How do I apply for bursary assistance?',
            'answer' => 'To apply for bursary assistance, visit our Bursary Application page and fill in the required information. Submit your application and track its status using your reference number.',
            'order' => 1,
            'status' => 'published'
        ]);

        FAQ::create([
            'question' => 'What documents are required for bursary application?',
            'answer' => 'Required documents include: valid national ID, birth certificate, school fees invoice, and proof of parental/guardian income.',
            'order' => 2,
            'status' => 'published'
        ]);

        FAQ::create([
            'question' => 'When will I know if my application is approved?',
            'answer' => 'Approval decisions are typically made within 30 days of application submission. You can check the status using our Bursary Status Query tool.',
            'order' => 3,
            'status' => 'published'
        ]);

        FAQ::create([
            'question' => 'What ECDE programs are available?',
            'answer' => 'We offer comprehensive ECDE programs including pre-primary, nursery, and kindergarten levels with qualified teachers and modern facilities.',
            'order' => 1,
            'status' => 'published'
        ]);

        FAQ::create([
            'question' => 'How can I enroll my child in an ECDE school?',
            'answer' => 'Contact the nearest ECDE school directly or use our online system to find schools near you and submit enrollment inquiries.',
            'order' => 2,
            'status' => 'published'
        ]);

        FAQ::create([
            'question' => 'How do I access the management portal?',
            'answer' => 'Log in with your username and password at /login. If you do not have credentials, contact your administrator.',
            'order' => 1,
            'status' => 'published'
        ]);

        FAQ::create([
            'question' => 'Is there a user manual for the system?',
            'answer' => 'Yes, comprehensive user guides are available in the Help section of the admin dashboard.',
            'order' => 2,
            'status' => 'published'
        ]);
    }
}
