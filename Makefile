####################
# Run from web root:
# $ make
####################
# Name our phony targets
.PHONY: all import-dev export-dev

# Default
all: default
dev: valet-link env-dev install-composer-packages install-node-packages build-assets permissions-uploads import-dev done

UPLOADS_DIR = "./app/uploads"
THEME_DIR = "app/themes/wlion"

default:
	@printf "\033[1;31mPlease supply an environment argument (dev) or command\n\033[0m";

valet-link:
	@echo Creating valet link...;
	@valet link;
	@printf " \033[1;32mDone\n\033[0m";

import-dev:
	@echo Importing database...;
	@gunzip < db_dump.sql.gz | mysql -u root pt-wordpress-composer;
	@printf " \033[1;32mDone\n\033[0m";

export-dev:
	@echo Exporting database...;
	@mysqldump -u root --skip-extended-insert pt-wordpress-composer | gzip --best > db_dump.sql.gz;
	@printf " \033[1;32mDone\n\033[0m";

env-dev:
	@echo Creating .env file...;
	@cp stubs/dev.env .env;
	@printf " \033[1;32mDone\n\033[0m";

permissions-directories:
	@echo Updating directory permissions...;
	@find ./ -type d -exec chmod 0755 {} \;
	@printf " \033[1;32mDone\n\033[0m";

permissions-files:
	@echo Updating file permissions...;
	@find ./ -type f -exec chmod 0644 {} \;
	@printf " \033[1;32mDone\n\033[0m";

permissions-uploads:
	@if test -d $(UPLOADS_DIR); \
	then echo "Updating uploads directory permissions..."; \
	chmod -R 0777 $(UPLOADS_DIR); \
	printf " \033[1;32mDone\n\033[0m"; \
	fi;

install-composer-packages:
	@echo Installing composer packages...;
	@composer install;
	@printf " \033[1;32mDone\n\033[0m";

install-node-packages:
	@echo Installing node packages...;
	@cd $(THEME_DIR); \
	source $(HOME)/.nvm/nvm.sh; \
	nvm install; \
	nvm use; \
	npm install;
	@printf " \033[1;32mDone\n\033[0m";

build-assets:
	@echo Building assets...;
	@cd $(THEME_DIR); \
	source $(HOME)/.nvm/nvm.sh; \
	nvm install; \
	nvm use; \
	npm run build;
	@printf " \033[1;32mDone\n\033[0m";

done:
	@printf "\033[1;36mReady to go!\n\033[0m"
