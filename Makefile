# Copyright The OpenTelemetry Authors
# SPDX-License-Identifier: Apache-2.0


# All documents to be used in spell check.
PWD := $(shell pwd)
TOOLS_DIR := ./internal/tools

# TODO: add `yamllint` step to `all` after making sure it works on Mac.
.PHONY: all
all: install-tools markdownlint misspell

.PHONY: build-env-file
install:
	docker exec -it ct_application_php composer install
	docker exec -it ct_application_php cp .env.example .env
	docker exec -it ct_application_php php artisan key:generate

.PHONY: remigrate
remigrate:
	docker exec -it ct_application_php php artisan migrate:fresh
	docker exec -it ct_application_php php artisan cache:clear
	docker exec -it ct_application_php php artisan db:seed
	echo ""
	echo "Banco recriado"

.PHONY: schedule
schedule:
	docker exec -it ct_application_php nohup php artisan schedule:work > /dev/null 2>&1 &


.PHONY: start
start:
	docker-compose up --detach
	@echo ""
	@echo "Application running."
	@echo "Go to http://localhost application."

