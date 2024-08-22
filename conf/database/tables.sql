use mydatabase;

CREATE TABLE `successful_emails` (
    `id` int NOT NULL AUTO_INCREMENT,
    `affiliate_id` mediumint NOT NULL, # the list's affiliate ID, ignore
    `envelope` text NOT NULL, # field from the Sendgrid webook, ignore
    `from` varchar(255) NOT NULL, # field from the Sendgrid webook, ignore
    `subject` text NOT NULL, # field from the Sendgrid webook, ignore
    `dkim` varchar(255) DEFAULT NULL, # field from the Sendgrid webook, ignore
    `SPF` varchar(255) DEFAULT NULL, # field from the Sendgrid webook, ignore
    `spam_score` float DEFAULT NULL, # field from the Sendgrid webook, ignore
    `email` longtext NOT NULL, # the raw email payload, including headers. parse this
    `raw_text` longtext NOT NULL, # save the plain text content in this column
    `sender_ip` varchar(50) DEFAULT NULL, # field from the Sendgrid webook, ignore
    `to` text NOT NULL, # field from the Sendgrid webook, ignore
    `timestamp` int NOT NULL, # incoming timestamp of the email, ignore
    PRIMARY KEY (`id`),
    KEY `affiliate_index` (`affiliate_id`)
);

INSERT INTO mydatabase.successful_emails (affiliate_id,envelope,`from`,subject,dkim,SPF,spam_score,email,raw_text,sender_ip,`to`,`timestamp`) VALUES
	 (123,'{"to":["recipient1@example.com"]}
','sender1@example.com
','Subject 1
','pass
','pass
',1.0,'"From: sender1@example.com
To: recipient1@example.com
Subject: Subject 1
Date: Mon, 1 Jan 2023 12:00:00 +0000
Message-ID: <message1@example.com>

This is the body of the email 1."
','
','192.168.1.1
','recipient1@example.com
',1672531199),
	 (124,'{"to":["recipient2@example.com"]}
','sender2@example.com
','Subject 2
','pass
','pass
',2.0,'"From: sender2@example.com
To: recipient2@example.com
Subject: Subject 2
Date: Mon, 1 Jan 2023 12:01:00 +0000
Message-ID: <message2@example.com>

This is the body of the email 2."
','
','192.168.1.2
','recipient2@example.com
',1672531200),
	 (125,'{"to":["recipient3@example.com"]}
','sender3@example.com
','Subject 3
','fail
','pass
',3.0,'"From: sender3@example.com
To: recipient3@example.com
Subject: Subject 3
Date: Mon, 1 Jan 2023 12:02:00 +0000
Message-ID: <message3@example.com>

This is the body of the email 3."
','
','192.168.1.3
','recipient3@example.com
',1672531201),
	 (126,'{"to":["recipient4@example.com"]}
','sender4@example.com
','Subject 4
','pass
','fail
',4.0,'"From: sender4@example.com
To: recipient4@example.com
Subject: Subject 4
Date: Mon, 1 Jan 2023 12:03:00 +0000
Message-ID: <message4@example.com>

This is the body of the email 4."
','
','192.168.1.4
','recipient4@example.com
',1672531202),
	 (127,'{"to":["recipient5@example.com"]}
','sender5@example.com
','Subject 5
','fail
','fail
',5.0,'"From: sender5@example.com
To: recipient5@example.com
Subject: Subject 5
Date: Mon, 1 Jan 2023 12:04:00 +0000
Message-ID: <message5@example.com>

This is the body of the email 5."
','
','192.168.1.5
','recipient5@example.com
',1672531203);
