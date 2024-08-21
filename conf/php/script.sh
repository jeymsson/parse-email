#!/bin/bash

# # Ativa saida no erro
# set -e

# Inicia o PHP-FPM
echo "Iniciando o PHP-FPM..."
/usr/local/bin/docker-php-entrypoint php-fpm --nodaemonize --force-stderr &

# Aguarda o PHP-FPM iniciar
sleep 5

# Executa as migrações com o Artisan
echo "Executando deploy..."
composer install
php artisan migrate
php artisan db:seed


# Mantém o contêiner em execução
echo "Contêiner em execução."

# Mantém o script em execução para manter o contêiner ativo
# tail -f /dev/null
tail -f /dev/stderr
