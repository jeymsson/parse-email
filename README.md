# parse-email

This project will create a server with five routes, namely: GetAll, GetById, Create, Update and Delete, which must be executed with the informed token. In addition, every hour it executes a command to check emails that have not filled in the body column. The application runs with Docker, Docker Compose and contains a container for nginx.

## Installing

Run

```sh {"id":"01J5VBFFC445JCBYXA3FH3GWTP"}
apt update -y
apt install -y docker.io docker-compose make
docker-compose up -d
make install
sleep 30
make remigrate
make schedule
```

## Token

JQvL6A0rZMuc2DBpDJg3jU9ABWSj6vfi2YSdJwtbjlbY8Ei0u68H7WKyt3malsjH

## Rotas

### GetAll

/GetAll

```sh {"id":"01J5XATAS5FD2595PXP65B0GRG"}
curl -X GET 'http://localhost/api/GetAll?token=JQvL6A0rZMuc2DBpDJg3jU9ABWSj6vfi2YSdJwtbjlbY8Ei0u68H7WKyt3malsjH'
```

## GetByID

### /GetByID/{id}

```sh {"id":"01J5XB70922P9B7MPY7NF2V49S"}
curl -X GET 'http://localhost/api/GetByID/1?token=JQvL6A0rZMuc2DBpDJg3jU9ABWSj6vfi2YSdJwtbjlbY8Ei0u68H7WKyt3malsjH'
```

## Update

### /Update/{id}

```sh {"id":"01J5XB8GKGAJERFHYYA7T5PQTG"}
curl  -X PUT \
  'http://localhost/api/Update/1?token=JQvL6A0rZMuc2DBpDJg3jU9ABWSj6vfi2YSdJwtbjlbY8Ei0u68H7WKyt3malsjH' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "affiliate_id": 123,
  "envelope": "{\"to\":[\"recipient1@example.com \"]}",
  "from": "sender1@example.com",
  "subject": "Subject 1",
  "dkim": "pass",
  "SPF": "pass",
  "spam_score": 0.1,
  "email": "From: sender1@example.com\nTo: recipient1@example.com\nSubject: Subject 1\nDate: Mon, 1 Jan 2023 12:00:00 +0000\nMessage-ID: <message1@example.com>\n\nThis is the body of the email 1.",
  "raw_text": "",
  "sender_ip": "192.168.1.1",
  "to": "recipient1@example.com"
}'
```

## Store

### /Store

```sh {"id":"01J5XB8VWSG7406DSB3RYMKY83"}
curl  -X POST \
  'http://localhost/api/Store?token=JQvL6A0rZMuc2DBpDJg3jU9ABWSj6vfi2YSdJwtbjlbY8Ei0u68H7WKyt3malsjH' \
  --header 'Content-Type: application/json' \
  --data-raw '{
  "affiliate_id": 123,
  "envelope": "{\"to\":[\"recipient1@example.com\"]}",
  "from": "sender1@example.com",
  "subject": "Subject 1",
  "dkim": "pass",
  "SPF": "pass",
  "spam_score": 0.1,
  "email": "From: sender1@example.com\nTo: recipient1@example.com\nSubject: Subject 1\nDate: Mon, 1 Jan 2023 12:00:00 +0000\nMessage-ID: <message1@example.com>\n\nThis is the body of the email 1.",
  "raw_text": "",
  "sender_ip": "192.168.1.1",
  "to": "recipient1@example.com"
}'
```

## DeleteByID

### /DeleteByID/{id}

```sh {"id":"01J5XB7KYV2D3SKZ57AM02PFM7"}
curl -X GET 'http://localhost/api/DeleteByID/6?token=JQvL6A0rZMuc2DBpDJg3jU9ABWSj6vfi2YSdJwtbjlbY8Ei0u68H7WKyt3malsjH'
```