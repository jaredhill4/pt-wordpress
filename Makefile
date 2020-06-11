# Variables
DONE_MESSAGE = " \033[1;32mDone\n\033[0m"

# Include environment variables
-include .env

# Name our phony targets
.PHONY: default dev refresh rebuild clean env build up up-d start restart stop kill down clean-docker clean-directories ssh-web ssh-node ssh-database export-database import-database

# Default
default:
	@printf " \033[1;31mPlease supply an environment argument (dev) or command\n\033[0m";

# Top-level commands
dev: up
refresh: down clean-directories up-d
rebuild: clean build
clean: clean-docker clean-directories

env:
	@echo Creating .env file...;
	@cp .stubs/dev.env .env;
	@printf $(DONE_MESSAGE);

build:
	@echo "Building docker images..."; \
	docker-compose build; \
	printf $(DONE_MESSAGE);

up:
	@echo "Building and running docker services..."; \
	docker-compose up; \
	printf $(DONE_MESSAGE);

up-d:
	@echo "Building and running docker services in detached (daemon) mode..."; \
	docker-compose up -d; \
	printf $(DONE_MESSAGE);

start:
	@echo "Starting docker services..."; \
	docker-compose start; \
	printf $(DONE_MESSAGE);

restart:
	@echo "Restarting docker services..."; \
	docker-compose restart; \
	printf $(DONE_MESSAGE);

stop:
	@echo "Stopping docker services..."; \
	docker-compose stop; \
	printf $(DONE_MESSAGE);

kill:
	@echo "Killing docker services..."; \
	docker-compose kill; \
	printf $(DONE_MESSAGE);

down:
	@echo "Stopping and removing docker services..."; \
	docker-compose down; \
	printf $(DONE_MESSAGE);

clean-docker:
	@echo "Stopping and removing docker services, volumes and images..."; \
	docker-compose down --volumes --remove-orphans --rmi 'all'; \
	printf $(DONE_MESSAGE); \

clean-directories:
	@echo "Cleaning up generated directories and files on the host..."; \
	rm -r {.storage,$(HOST_THEME_DIR)/node_modules,$(HOST_THEME_DIR)/build}; \
	printf $(DONE_MESSAGE);

ssh-web:
	@echo "Starting interactive shell in \`web\` container ..."; \
	docker-compose exec web bash;

ssh-node:
	@echo "Starting interactive shell in \`node\` container ..."; \
	docker-compose exec node bash;

ssh-database:
	@echo "Starting interactive shell in \`database\` container ..."; \
	docker-compose exec database bash;

export-database:
	@echo "Exporting database..."; \
	docker-compose exec -T database /usr/bin/mysqldump -u root --password=$(DB_ROOT_PASSWORD) --skip-extended-insert $(DB_NAME) | gzip --best > $(DB_DUMP_DIR)/db_dump.sql.gz; \
	printf $(DONE_MESSAGE);

import-database:
	@echo "Importing database..."; \
	gunzip < $(DB_DUMP_DIR)/db_dump.sql.gz | docker-compose exec -T database /usr/bin/mysql -u root --password=$(DB_ROOT_PASSWORD) $(DB_NAME); \
	printf $(DONE_MESSAGE);

# TODO: Need to figure out how we should handle these in the Docker environment
#
# permissions-directories:
# 	@echo "Updating directory permissions...";
# 	@find ./ -type d -exec chmod 0755 {} \;
# 	@printf $(DONE_MESSAGE);

# permissions-files:
# 	@echo "Updating file permissions...";
# 	@find ./ -type f -exec chmod 0644 {} \;
# 	@printf $(DONE_MESSAGE);

# permissions-uploads:
# 	@if test -d $(UPLOADS_DIR); \
# 	then echo "Updating uploads directory permissions..."; \
# 	chmod -R 0777 $(UPLOADS_DIR); \
# 	printf $(DONE_MESSAGE); \
# 	fi;
