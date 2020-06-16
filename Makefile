# Include environment variables
-include .env

# Variables
DONE_MESSAGE = " \033[1;32mDone\n\033[0m"

# Default
.PHONY: default
default:
	@printf " \033[1;31mPlease supply an environment argument (dev) or command\n\033[0m";

# Top-level commands
.PHONY: dev refresh rebuild rebuild-all clean
dev: env up
refresh: down clean-host
rebuild: clean build
rebuild-all: clean build-no-cache
clean: clean-docker clean-host

.PHONY: env
env:
	@if [ ! -f .env ]; then \
		echo "Creating \`.env\` file..."; \
		cp .stubs/dev.env .env; \
		printf $(DONE_MESSAGE); \
	else \
		echo "The \`.env\` file already exists."; \
	fi;

.PHONY: build
build:
	@echo "Building docker images..."; \
	docker-compose build; \
	printf $(DONE_MESSAGE);

.PHONY: build-no-cache
build-no-cache:
	@echo "Building docker images from scratch..."; \
	docker-compose build --no-cache; \
	printf $(DONE_MESSAGE);

.PHONY: up
up:
	@echo "Building and running docker services..."; \
	docker-compose up; \
	printf $(DONE_MESSAGE);

.PHONY: up-d
up-d:
	@echo "Building and running docker services in detached (daemon) mode..."; \
	docker-compose up -d; \
	printf $(DONE_MESSAGE);

.PHONY: start
start:
	@echo "Starting docker services..."; \
	docker-compose start; \
	printf $(DONE_MESSAGE);

.PHONY: restart
restart:
	@echo "Restarting docker services..."; \
	docker-compose restart; \
	printf $(DONE_MESSAGE);

.PHONY: stop
stop:
	@echo "Stopping docker services..."; \
	docker-compose stop; \
	printf $(DONE_MESSAGE);

.PHONY: kill
kill:
	@echo "Killing docker services..."; \
	docker-compose kill; \
	printf $(DONE_MESSAGE);

.PHONY: down
down:
	@echo "Stopping and removing docker services..."; \
	docker-compose down; \
	printf $(DONE_MESSAGE);

.PHONY: clean-docker
clean-docker:
	@echo "Stopping and removing docker services, volumes and images..."; \
	docker-compose down --volumes --remove-orphans --rmi 'all'; \
	printf $(DONE_MESSAGE); \

.PHONY: clean-host
clean-host:
	@echo "Cleaning up generated directories and files on the host..."; \
	rm -r {$(HOST_STORAGE_DIR),$(HOST_THEME_DIR)/node_modules,$(HOST_THEME_DIR)/build}; \
	printf $(DONE_MESSAGE);

.PHONY: ssh-web
ssh-web:
	@echo "Starting interactive shell in \`web\` container ..."; \
	docker-compose exec web bash;

.PHONY: ssh-node
ssh-node:
	@echo "Starting interactive shell in \`node\` container ..."; \
	docker-compose exec node bash;

.PHONY: ssh-database
ssh-database:
	@echo "Starting interactive shell in \`database\` container ..."; \
	docker-compose exec database bash;

.PHONY: export-database
export-database:
	@echo "Exporting database..."; \
	docker-compose exec -T database /usr/bin/mysqldump -u root --password=$(DB_ROOT_PASSWORD) --skip-extended-insert $(DB_NAME) | gzip --best > $(DB_DUMP_DIR)/db_dump.sql.gz; \
	printf $(DONE_MESSAGE);

.PHONY: import-database
import-database:
	@echo "Importing database..."; \
	gunzip < $(DB_DUMP_DIR)/db_dump.sql.gz | docker-compose exec -T database /usr/bin/mysql -u root --password=$(DB_ROOT_PASSWORD) $(DB_NAME); \
	printf $(DONE_MESSAGE);

.PHONY: composer-update
composer-update:
	@echo "Updating Composer packages..."; \
	docker-compose exec web composer update; \
	printf $(DONE_MESSAGE);

.PHONY: npm-update
npm-update:
	@echo "Updating NPM packages..."; \
	docker-compose exec web bash -c "cd app/themes/wlion && ncu -u && npm install"; \
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
