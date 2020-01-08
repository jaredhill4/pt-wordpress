####################
# Run from web root:
# $ make
####################
# Name our phony targets
.PHONY: all import-dev export-dev import-review export-review

# Default
all: default
dev-valet: env-dev-valet install-composer-packages install-node-packages build-assets permissions-uploads import-dev-valet done
dev-vagrant: env-dev-vagrant install-composer-packages install-node-packages build-assets permissions-uploads import-dev-vagrant update-wp-cli-dev done
review: env-review install-composer-packages install-node-packages-and-build-assets permissions-directories permissions-files permissions-uploads done
production: env-production install-composer-packages install-node-packages-and-build-assets permissions-directories permissions-files permissions-uploads done

UPLOADS_DIR = "./app/uploads"
THEME_DIR = "app/themes/wlion"

default:
	@printf "\033[1;31mPlease supply an environment argument (dev, review) or command\n\033[0m"

import-dev-valet:
	@echo -n Importing database...
	@gunzip < db_dump.sql.gz | mysql -u root pt-wordpress
	@printf " \033[1;32mDone\n\033[0m"

export-dev-valet:
	@echo -n Exporting database...
	@mysqldump -u root --skip-extended-insert pt-wordpress | gzip --best > db_dump.sql.gz
	@printf " \033[1;32mDone\n\033[0m"

import-dev-vagrant:
	@echo -n Importing database...
	@gunzip < db_dump.sql.gz | mysql -u root -p'root' scotchbox
	@printf " \033[1;32mDone\n\033[0m"

export-dev-vagrant:
	@echo -n Exporting database...
	@mysqldump -u root -p'root' --skip-extended-insert scotchbox | gzip --best > db_dump.sql.gz
	@printf " \033[1;32mDone\n\033[0m"

import-review:
	@echo -n Importing database...
	@gunzip < db_dump.sql.gz | mysql -u root -p'JunkF00d' pt-wordpress
	@printf " \033[1;32mDone\n\033[0m"

export-review:
	@echo -n Exporting database...
	@mysqldump -u root -p'JunkF00d' --skip-extended-insert pt-wordpress | gzip --best > db_dump.sql.gz
	@printf " \033[1;32mDone\n\033[0m"

import-production:
	@echo -n Importing database...
	@gunzip < db_dump.sql.gz | mysql -h __HOST__ -u __USERNAME__ -p'__PASSWORD__' __DATABASE__
	@printf " \033[1;32mDone\n\033[0m"

export-production:
	@echo -n Exporting database...
	@mysqldump -h __HOST__ -u __USERNAME__ -p'__PASSWORD__' --skip-extended-insert __DATABASE__ | gzip --best > db_dump.sql.gz
	@printf " \033[1;32mDone\n\033[0m"

env-dev-valet:
	@echo -n Creating .env file...
	@cp stubs/dev-valet.env .env
	@printf " \033[1;32mDone\n\033[0m"

env-dev-vagrant:
	@echo -n Creating .env file...
	@cp stubs/dev-vagrant.env .env
	@printf " \033[1;32mDone\n\033[0m"

env-review:
	@echo -n Creating .env file...
	@cp stubs/review.env .env
	@printf " \033[1;32mDone\n\033[0m"

env-production:
	@echo -n Creating .env file...
	@cp stubs/production.env .env
	@printf " \033[1;32mDone\n\033[0m"

permissions-directories:
	@echo -n Updating directory permissions...
	@find ./ -type d -exec chmod 0755 {} \;
	@printf " \033[1;32mDone\n\033[0m"

permissions-files:
	@echo -n Updating file permissions...
	@find ./ -type f -exec chmod 0644 {} \;
	@printf " \033[1;32mDone\n\033[0m"

permissions-uploads:
	@if test -d $(UPLOADS_DIR); \
	then echo "Updating uploads directory permissions..."; \
	chmod -R 0777 $(UPLOADS_DIR); \
	printf " \033[1;32mDone\n\033[0m"; \
	fi;

install-composer-packages:
	@echo -n Installing composer packages...
	@composer install;
	@printf " \033[1;32mDone\n\033[0m";

install-node-packages:
	@echo -n Installing node packages...
	@cd $(THEME_DIR); \
	nvm install; \
	nvm use; \
	npm install;
	@printf " \033[1;32mDone\n\033[0m";

build-assets:
	@echo -n Building assets...
	@cd $(THEME_DIR); \
	nvm install; \
	nvm use; \
	npm run build;
	@printf " \033[1;32mDone\n\033[0m"

install-node-packages-and-build-assets:
	@echo -n Installing node packages and building assets...
	@cd $(THEME_DIR); \
	source $(HOME)/.bashrc; \
	nvm install; \
	nvm use; \
	npm install; \
	npm run build;
	@printf " \033[1;32mDone\n\033[0m";

update-wp-cli-dev:
	@echo -n Updating WP-CLI...
	@curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar; \
	chmod +x wp-cli.phar; \
	sudo mv wp-cli.phar /usr/local/bin/wp; \
	@printf " \033[1;32mDone\n\033[0m"

update-wordpress:
	@echo -n Updating WordPress core...
	@wp core update
	@printf " \033[1;32mDone\n\033[0m"

update-plugins:
	@echo -n Updating WordPress plugins...
	@wp plugin update --all
	@printf " \033[1;32mDone\n\033[0m"

done:
	@printf "\033[1;36mReady to go!\n\033[0m"
