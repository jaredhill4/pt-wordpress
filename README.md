# Project Template (WordPress)

## Table of Contents

1. [Overview](#overview)
2. [Local Development](#local-development)
   1. [Getting Started](#getting-started)
   2. [Accessing the Site](#accessing-the-site)
   3. [Connecting to the Database](#connecting-to-the-database)
   4. [Interacting with Docker and Containers](#interacting-with-docker-and-containers)
      1. [High-Level `make` Targets](#high-level-make-targets)
      2. [Low-Level `make` Targets](#low-level-make-targets)
   5. [Things to Remember](#things-to-remember)
3. [Advanced Custom Fields](#advanced-custom-fields)
   1. [Local JSON](#local-json)
   2. [Adding and Updating ACF Field Groups](#adding-and-updating-acf-field-groups)
   3. [Updating the ACF Pro Plugin](#updating-the-acf-pro-plugin)
   4. [Further ACF Reading](#further-acf-reading)
4. [WP Migrate DB Pro](#wp-migrate-db-pro)
5. [CircleCI](#circleci)
   1. [Branch Deployments](#branch-deployments)
   2. [Production Deployment](#production-deployment)
6. [Front-end Scripts](#front-end-scripts)
7. [WP-CLI](#wp-cli)

## Overview

This is our project template for WordPress sites. It is configured for use with [Docker Compose](https://docs.docker.com/compose/) for local development and [CircleCI](https://circleci.com/) for remote deployments. It uses [Composer](https://getcomposer.org/) to manage project dependencies, including the WordPress core, third-party plugins (like [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/) and [WP Migrate DB Pro](https://deliciousbrains.com/wp-migrate-db-pro/)) and other PHP dependencies we might need. It also includes a number of helpful `make` targets to perform common tasks and make local development simpler and more efficient.

## Local Development

We use [Docker](https://www.docker.com/) with [Docker Compose](https://docs.docker.com/compose/) for local development. Docker Compose allows us to run a multi-container Docker application simply using a Compose file and configuring our services.

In our case, we have three unique services. They are described briefly below.

| Service    | Description                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      |
| ---------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `database` | A simple MySQL server. It requires minimal configuration. It uses two volumes on the host machine: one to initially populate the database when the container is first created and another to persist subsequent database updates to the host.                                                                                                                                                                                                                                                                                                                                    |
| `node`     | A Node server which, once built and running, contains all our theme files. On start up, it runs `npm run watch` to watch for changes to our front-end assets                                                                                                                                                                                                                                                                                                                                                                                                                     |
| `web`      | A web server based on a PHP/Apache base image. This is where all our application files will reside, including WordPress core, plugins, and theme files. It uses a number of volumes to sync changes between the container and the host, but the most important is the `uploads` volume, which persists media library files (and other files added to the WordPress `uploads` directory) to the `.storage/uploads` on the host. It also has Composer, Node and WP-CLI installed, allowing us to update our website configuration and application dependencies quickly and easily. |

### Getting Started

Before running the project, you must have [Docker Desktop](https://www.docker.com/products/docker-desktop) installed on your machine. Once it is installed, just follow the two steps below to get the application running locally.

1. Clone the project into your local directory (`~/Code`).

   ```
   $ git clone git@github.com:wlion/pt-wordpress-composer.git
   ```

2. From within the project directory, run the following to generate the environment (`.env`) file and build and run our Docker services.

   ```
   $ make dev
   ```

### Accessing the Site

Once the Docker services are running, you will be able to visit the site in your browser at http://localhost:8080.

_Note: If you attempt to visit the site too early, you may see a "Connection refused" and "Error establishing a database connection" message. This usally means you just need to wait a bit longer for the database service to be ready. Once the database is ready, you will see the following line in the logs in your terminal. Once you see it, you should be good to go._

```
pt-wordpress_database | Version: '5.7.30'  socket: '/var/run/mysqld/mysqld.sock'  port: 3306  MySQL Community Server (GPL)
```

### Connecting to the Database

To connect to the database inside the `database` container, first ensure the `database` service is running. Once you have done so, you may add the following database credentials in [Sequel Pro](http://sequelpro.com/) and connect to the running database.

| Field    | Value     | Note                            |
| -------- | --------- | ------------------------------- |
| Host     | 127.0.0.1 |                                 |
| Username | root      |                                 |
| Password | root      | _Must match `DB_ROOT_PASSWORD`_ |
| Database | wordpress | _Must match `DB_NAME`_          |
| Port     | 4036      | _Must match `DB_EXTERNAL_PORT`_ |

### Interacting with Docker and Containers

We have a number of `make` targets that allow us to interact with Docker and our containers more easily. Most of the targets are simply aliases for more verbose `docker-compose` commands, but others are more particular to our preferred workflow. All targets are listed and described briefly below.

#### High-Level `make` Targets

| Target        | Description                    |
| ------------- | ------------------------------ |
| `dev`         | Runs `env up`                  |
| `refresh`     | Runs `down clean-host up`      |
| `rebuild`     | Runs `clean build up`          |
| `rebuild-all` | Runs `clean build-no-cache up` |
| `clean`       | Runs `clean-docker clean-host` |

#### Low-Level `make` Targets

| Target                | Description                                                                                                                      |
| --------------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| `env`                 | Generates the `.env` file.                                                                                                       |
| `build`               | Builds the Docker images for the Dockerfiles used by Docker Compose.                                                             |
| `build-no-cache`      | Builds the Docker images for the Dockerfiles used by Docker Compose but prevents Docker from using the layer cache.              |
| `up`                  | Builds the Docker images, creates the Docker containers and runs Docker the services.                                            |
| `up-d`                | Builds the Docker images, creates the Docker containers and runs Docker the services in detached (daemon) mode.                  |
| `start`               | Starts the stopped Docker services.                                                                                              |
| `restart`             | Retarts the running Docker services.                                                                                             |
| `stop`                | Stops the running Docker services.                                                                                               |
| `kill`                | Immediately stops the running Docker services.                                                                                   |
| `down`                | Stops and removes the Docker services.                                                                                           |
| `clean-docker`        | Stops and removes the Docker services, as well as all volumes, images and orphan containers.                                     |
| `clean-host`          | Removes all Docker-generated files and directories from the host machine.                                                        |
| `ssh-web`             | Starts and interactive shell within the `web` container.                                                                         |
| `ssh-node`            | Starts and interactive shell within the `node` container.                                                                        |
| `ssh-database`        | Starts and interactive shell within the `database` container.                                                                    |
| `export-database`     | Exports the database (as a gzipped sql dump file) from the `database` container to the `DB_DUMP_DIR`.                            |
| `import-database`     | Imports the the gzipped sql dump file from the `DB_DUMP_DIR` to the database in the `database` container.                        |
| `composer-update`     | Updates all Composer packages and generates a new `composer.lock` file.                                                          |
| `npm-update`          | Updates all NPM packages to their latest versions, updates the `package.json` file and generates a new `package-lock.json` file. |
| `permissions-uploads` | Updates permissions for the WordPress uploads (`app/uploads`) directory within the `web` container.                              |

### Things to Remember

Below are a few additional items to keep in mind when running your projects in Docker locally:

1. **Only one project can be running at a time.**

   This is because we use the same external ports for each project. If you try to start on project while another is already running, you will receive an error message that another container is already using the same port. If you would like to run multiple projects at the same time, you would need to change the external `web` and `database` ports to do so.

2. **The database is only populated from the SQL dump file during the initial build.**

   After the initial build, the `database` container will use the data from the `data` volume locate at `.storage/data`. To repopulate the database, you could either delete the `.storage/data` directory and then run `make restart`, or you could simply run `make refresh`.

3. **Be cautious when running `make refresh`, `make build`, `make rebuild` or `make clean`.**

   All these commands will remove the `.storage` directory on your host machine, which means you would lose any changes you have made to the database or uploads. So be careful and make sure you know what you are doing when using these commands.

4. **To use the `make ssh-node` command, you will need to change the `node` container's startup command.**

   As defined in the `node` service's ([`.docker/node/Dockerfile`](.docker/node/Dockerfile)), the container will run `npm start` by default, which blocks any efforts to shell into the running container. To enable `make ssh-node`, you may override the default command by adding a `command` setting to the `node` service in the [docker-compose.yml](docker-compose.yml) file.

## Front-end Scripts

These are the scripts to build and watch for changes to our front-end assets, like SCSS, JS and image files in the `assets` directory. You likely won't need to run these manually, because our `node` Docker container runs `npm start` as its startup command. But just in case, they are all documented below. To run these scripts, you will first need to change directories to the `wlion` theme directory (`/app/themes/wlion`).

| Command          | Description                                                                               |
| ---------------- | ----------------------------------------------------------------------------------------- |
| `npm start`      | Alias for `npm run watch`                                                                 |
| `npm run watch`  | Watches for changes and compile assets                                                    |
| `npm run build`  | Compiles assets                                                                           |
| `npm run format` | Runs Prettier to format all of the projects javascript/scss files (run before committing) |

## Advanced Custom Fields

We use the [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/) (ACF) plugin to add custom fields to templates, build navigation menus, and manage global options and settings.

### Local JSON

Because of the potential for having many developers (both internal and third party) working on a project at any given time and the need to frequently migrate field groups between a number of environments, we use a feature of ACF called [Local JSON](https://www.advancedcustomfields.com/resources/local-json/). This provides us with the most seamless development workflow and circumvents many of the conflicts that arise from the complexities mentioned above.

### Adding and Updating ACF Field Groups

When developing, we follow a particular workflow to add or update ACF field groups. The goal is to maintain all field groups in version control in the form of JSON files representing each field group. To avoid any changes that could get lost by editing field groups in production or other environments, we have manually disabled the "Custom Fields" menu item (and other links to the ACF settings pages) in the admin on all environments except the `local` environment. Please follow the workflow below closely for best results.

1. **Sync all field groups.**

   This is a key step to ensure we don't lose any changes that other developers may have made since we last synced. To do this, go to the "Custom Fields" settings in the WordPress admin and click on "Sync available" link at the top of the "Field Groups" page. (It is recommended to sync the field groups just a few at a time to avoid "504 gateway timeout" errors.)

2. **Add or edit a field group in the "Custom Fields" settings.**

   Once you have synced all fields, you may begin adding and editing fields and fields groups via the WordPress admin under the "Custom Fields" menu item.

3. **Assign field groups to page templates.**

   If you are working on a new field group for a particular page, _DO NOT_ assign the field group to that specific page. This is because ACF will store a post ID as the location. Since post IDs are subject to change from environment to environment and because you will not be able to edit the field group in other environments, it is required to assign field groups to page templates.

4. **Commit your changes.**

   Upon saving your field groups in the admin, all changes will be reflected in JSON files in the `acf-json` directory in the `wlion` theme. Be sure to commit these changes along with the rest of your work.

5. **Review and resolve conflicts.**

   As with other code changes, your updates to the ACF field groups may come into conflict with those of another developer. Be sure to work closely with other developers who have recently worked on the same field groups to make sure you don't remove any fields they've added (or keep any fields they've removed).

6. **Deploy and test.**

   Once deployed to other environments, test your updates thoroughly and make sure everything is working as expected. Remember, if you need to make further changes to field groups, you will need to make them in your `local` environment and re-deploy them. Since we are using ACF Local JSON, field groups in higher environments need not (and should not) be "synced" in the admin. Rather, ACF will load the field groups directly from the JSON files in the `acf-json` directory.

### Updating the ACF Pro Plugin

We have a developer license for ACF Pro, which allows us to use the plugin on as many sites as we want. To do so, we need to make sure the license key is present in `.env` file as `ACF_PRO_KEY`, as this is what Composer will use to authenticate the account when updating. You may find the license key in the [White Lion passport](https://whitelion.atlassian.net/wiki/spaces/WL/pages/100536883/White+Lion+-+Passport) in Confluence.

### Further ACF Reading

You can view the [documention for ACF here](https://www.advancedcustomfields.com/resources/). In addition, the following links provide more information about ACF Local JSON, as well as context for our workflow:

- [How to avoid conflicts when using the ACF Local JSON feature](https://www.awesomeacf.com/how-to-avoid-conflicts-when-using-the-acf-local-json-feature/)
- [Understanding where your ACF field group settings are coming from](https://www.awesomeacf.com/understanding-where-your-acf-field-group-settings-are-coming-from/)

## WP Migrate DB Pro

We use [WP Migrate DB Pro](https://deliciousbrains.com/wp-migrate-db-pro/) to migrate data between environments. Typically, this means pulling data from the production environment to make sure we have a current version of the site data to work with. We should _NEVER_ **push** data to production using the plugin. Rather, we should only **pull** from production into other environments (i.e., local, development, staging).

To update the plugin, similar to ACF, we must ensure the lisence keys are available for use by Composer. To do so, make sure the `DELICIOUS_BRAINS_COMPOSER_API_USERNAME` and `DELICIOUS_BRAINS_COMPOSER_API_PASSWORD` variables are present and correct in your `.env` file. You may find the license keys in the [White Lion passport](https://whitelion.atlassian.net/wiki/spaces/WL/pages/100536883/White+Lion+-+Passport) in Confluence.

## CircleCI

We use [CircleCI](https://circleci.com/) to build, test and deploy our application to remote environments.

The [White Lion CircleCI dashboard](https://app.circleci.com/projects/project-dashboard/github/wlion) may be accessed by logging in with your personal GitHub account. However, only lead/senior developers should make changes to the CircleCI configuration. Additionally, It is recommended for senior/lead developers to enable [notifications](https://app.circleci.com/settings/user/notifications) for White Lion projects, so you can be notifed when builds fail.

### Branch Deployments

We have branch deployment support built-in to our [CircleCI configuration](.circleci/config.yml) (found in the project at [`.circleci/config.yml`](.circleci/config.yml)). Currently, the configuration supports three branches: `review`, `development`, and `staging`.

By default, the [CircleCI configuration](.circleci/config.yml) is set to watch for changes to the `review` branch and build and deploy the site automatically to the `review` server (`web8.wlion.com`).

The `development` and `staging` branches/environments require some additional configuration, but the default configuration assumes we will be using WP Engine for those environments. This may be changed as needed to meet the project requirements.

### Production Deployment

To trigger a deployment to `production`, rather than simply pushing or merging to the `master` branch in GitHub, an additional step is required: You must create a new tag/release using the following specific format: `20XX.XX.XX.XX`. Each "X" in the template above represents and integer. So, similar to our traditional tagged release workflow, a typical tag might be: `2020.06.24.01`. Only tags in this format will trigger the production deployment. (To see how this is working, take a look at the `deploy-production` in the [CircleCI configuration](.circleci/config.yml).)

## WP-CLIg

We use [WP-CLI](http://wp-cli.org/) to perform common tasks in WordPress. Here are a few commands that will be helpful for you as you work on your project:

| Command                                               | Description                                                                |
| ----------------------------------------------------- | -------------------------------------------------------------------------- |
| `wp core update`                                      | Update the WordPress core to the latest version                            |
| `wp plugin search "__PLUGIN_NAME__"`                  | Search for a plugin by name                                                |
| `wp plugin install "__PLUGIN_NAME__"`                 | Install a plugin by name                                                   |
| `wp plugin update "__PLUGIN_NAME__"`                  | Update plugin by name                                                      |
| `wp plugin update --all`                              | Update all plugins                                                         |
| `wp search-replace "__OLD_STRING__" "__NEW_STRING__"` | Search and replace a specific string everywhere it appears in the database |

There are many other commands that you can find in the [documentation for WP-CLI](https://developer.wordpress.org/cli/commands/).
