<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class successful_emails extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		// DB::beginTransaction();
        DB::statement('DROP TABLE IF EXISTS `successful_emails`;');

        // Criar a tabela
        DB::statement('
            CREATE TABLE `successful_emails` (
                `id` int NOT NULL AUTO_INCREMENT,
                `affiliate_id` mediumint NOT NULL,
                `envelope` text NOT NULL,
                `from` varchar(255) NOT NULL,
                `subject` text NOT NULL,
                `dkim` varchar(255) DEFAULT NULL,
                `SPF` varchar(255) DEFAULT NULL,
                `spam_score` float DEFAULT NULL,
                `email` longtext NOT NULL,
                `raw_text` longtext NOT NULL,
                `sender_ip` varchar(50) DEFAULT NULL,
                `to` text NOT NULL,
                `timestamp` int NOT NULL,
                PRIMARY KEY (`id`),
                KEY `affiliate_index` (`affiliate_id`)
            );
        ');

        // Inserir os registros
        DB::table('successful_emails')->insert([
            [
                'affiliate_id' => 123,
                'envelope' => '{"to":["recipient1@example.com"]}',
                'from' => 'sender1@example.com',
                'subject' => 'Subject 1',
                'dkim' => 'pass',
                'SPF' => 'pass',
                'spam_score' => 0.1,
                'email' => "From: sender1@example.com\nTo: recipient1@example.com\nSubject: Subject 1\nDate: Mon, 1 Jan 2023 12:00:00 +0000\nMessage-ID: <message1@example.com>\n\nThis is the body of the email 1.",
                'raw_text' => '',
                'sender_ip' => '192.168.1.1',
                'to' => 'recipient1@example.com',
                'timestamp' => 1672531199,
            ],
            [
                'affiliate_id' => 124,
                'envelope' => '{"to":["recipient2@example.com"]}',
                'from' => 'sender2@example.com',
                'subject' => 'Subject 2',
                'dkim' => 'pass',
                'SPF' => 'pass',
                'spam_score' => 0.2,
                'email' => "From: sender2@example.com\nTo: recipient2@example.com\nSubject: Subject 2\nDate: Mon, 1 Jan 2023 12:01:00 +0000\nMessage-ID: <message2@example.com>\n\nThis is the body of the email 2.",
                'raw_text' => '',
                'sender_ip' => '192.168.1.2',
                'to' => 'recipient2@example.com',
                'timestamp' => 1672531200,
            ],
            [
                'affiliate_id' => 125,
                'envelope' => '{"to":["recipient3@example.com"]}',
                'from' => 'sender3@example.com',
                'subject' => 'Subject 3',
                'dkim' => 'fail',
                'SPF' => 'pass',
                'spam_score' => 0.3,
                'email' => "From: sender3@example.com\nTo: recipient3@example.com\nSubject: Subject 3\nDate: Mon, 1 Jan 2023 12:02:00 +0000\nMessage-ID: <message3@example.com>\n\nThis is the body of the email 3.",
                'raw_text' => '',
                'sender_ip' => '192.168.1.3',
                'to' => 'recipient3@example.com',
                'timestamp' => 1672531201,
            ],
            [
                'affiliate_id' => 126,
                'envelope' => '{"to":["recipient4@example.com"]}',
                'from' => 'sender4@example.com',
                'subject' => 'Subject 4',
                'dkim' => 'pass',
                'SPF' => 'fail',
                'spam_score' => 0.4,
                'email' => "From: sender4@example.com\nTo: recipient4@example.com\nSubject: Subject 4\nDate: Mon, 1 Jan 2023 12:03:00 +0000\nMessage-ID: <message4@example.com>\n\nThis is the body of the email 4.",
                'raw_text' => '',
                'sender_ip' => '192.168.1.4',
                'to' => 'recipient4@example.com',
                'timestamp' => 1672531202,
            ],
            [
                'affiliate_id' => 127,
                'envelope' => '{"to":["recipient5@example.com"]}',
                'from' => 'sender5@example.com',
                'subject' => 'Subject 5',
                'dkim' => 'fail',
                'SPF' => 'fail',
                'spam_score' => 0.5,
                'email' => "From: sender5@example.com\nTo: recipient5@example.com\nSubject: Subject 5\nDate: Mon, 1 Jan 2023 12:04:00 +0000\nMessage-ID: <message5@example.com>\n\nThis is the body of the email 5.",
                'raw_text' => '',
                'sender_ip' => '192.168.1.5',
                'to' => 'recipient5@example.com',
                'timestamp' => 1672531203,
            ]
        ]);
		// DB::commit();
    }
}
