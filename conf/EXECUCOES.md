---
runme:
  id: 01HH8CWZS0KBEHJMVYCRR6VRAD
  version: v3
---

## Application base

Base to PHP applications

## Instalação local

Inicie o projeto com comando abaixo:

```bash {"id":"01HH8CWZS0KBEHJMVYCBE9HTMN"}
  docker-compose up -d
```

Instale as suas bibliotecas:

```bash {"id":"01HH8CWZS0KBEHJMVYCC95ERPC"}
  docker exec -it ct_application_php composer install
  docker exec -it ct_application_node npm install
```

Crie o env:

```bash {"id":"01HH8CWZS0KBEHJMVYCEWZVSPQ"}
docker exec -it ct_application_php composer install
docker exec -it ct_application_php cp .env.example .env
docker exec -it ct_application_php php artisan key:generate
docker exec -it ct_application_php php artisan cache:clear
```

Adicionar autenticacao:

```bash {"id":"01HH8CWZS0KBEHJMVYCG7C6B7H"}
  docker exec -it ct_application_php composer require laravel/breeze --dev
  docker exec -it ct_application_php php artisan breeze:install
  docker exec -it ct_application_php php artisan migrate
```

### Dev

```bash {"id":"01HH8CWZS0KBEHJMVYCJ0QMXGP"}
docker exec -it ct_application_php composer require barryvdh/laravel-debugbar --dev
```

## Pint

```bash {"id":"01HH8CZFMBS9885Q73D10X6CT0"}
docker exec -it ct_application_php ./vendor/bin/pint -v --preset psr12
```

#### Nova entidade

```bash {"id":"01HH8CWZS0KBEHJMVYCJY09S1Z"}
docker exec -it ct_application_php php artisan make:model PlanoAcao/PlanoAcaoModelo -m
# docker exec -it ct_application_php php artisan make:seeder PlanoAcao/PlanoAcaoModeloSeed
# docker exec -it ct_application_php php artisan make:controller PlanoAcao/PlanoAcaoModeloController -r
# docker exec -it ct_application_php php artisan make:test PlanoAcao/PlanoAcaoModeloTest
# docker exec -it ct_application_php php artisan make:repository --dir Repositories --model PlanoAcaoModelo PlanoAcao/PlanoAcaoModelo
# docker exec -it ct_application_php php artisan make:service PlanoAcao/PlanoAcaoModeloGrupoItemService
```

# Limpa banco

```bash {"id":"01HH8CWZS0KBEHJMVYCPA7X9DJ"}
docker exec -it ct_application_php php artisan migrate:fresh
docker exec -it ct_application_php php artisan db:seed && echo "" && echo "Fim"

```

