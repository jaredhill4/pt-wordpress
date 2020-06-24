# Project Template (WordPress - Composer)

## Table of Contents

1. [Local Development](#local-development)
   1. [Getting Started](#getting-started)
   2. [Connecting to the Database](#connecting-to-the-database)
   3. [Interacting with Docker and Containers](#interacting-with-docker-and-containers)
      1. [High-Level `make` Targets](#high-level-make-targets)
      1. [Low-Level `make` Targets](#low-level-make-targets)
2. [Front-end Scripts](#front-end-scripts)
3. [WP-CLI](#wp-cli)

## Local Development

We use [Docker](https://www.docker.com/) with [Docker Compose](https://docs.docker.com/compose/) for local development. Docker Compose allows us to run a multi-container Docker application simply using a Compose file and configuring our services.

In our case, we have three unique services. They are described briefly below.

| Service    | Description                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      | Image             |
| ---------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------- |
| `database` | A simple MySQL server. It requires minimal configuration. It uses two volumes on the host machine: one to initially populate the database when the container is first created and another to persist subsequent database updates to the host.                                                                                                                                                                                                                                                                                                                                    | MySQL             |
| `node`     | A Node server which, once built and running, contains all our theme files. On start up, it runs `npm run watch` to watch for changes to our front-end assets                                                                                                                                                                                                                                                                                                                                                                                                                     | Custom Dockerfile |
| `web`      | A web server based on a PHP/Apache base image. This is where all our application files will reside, including WordPress core, plugins, and theme files. It uses a number of volumes to sync changes between the container and the host, but the most important is the `uploads` volume, which persists media library files (and other files added to the WordPress `uploads` directory) to the `.storage/uploads` on the host. It also has Composer, Node and WP-CLI installed, allowing us to update our website configuration and application dependencies quickly and easily. | Custom Dockerfile |

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

Once the Docker services are running, you will be able to visit the site in your browser at http://localhost:8080.

_Note: If you attempt to visit the site too early, you may see a "Connection refused" and "Error establishing a database connection" message. This usally means you just need to wait a bit longer for the database service to be ready. Once the database is ready, you will see the following line in the logs in your terminal. Once you see it, you should be good to go._

```
pt-wordpress_database | Version: '5.7.30'  socket: '/var/run/mysqld/mysqld.sock'  port: 3306  MySQL Community Server (GPL)
```

### Connecting to the Database

This is some information about connecting to the databse.

### Interacting with Docker and Containers

We have a number of `make` targets that allow us to interact with Docker and our containers more easily. They are listed and described briefly below.

#### High-Level `make` Targets

| Target    | Description                    |
| --------- | ------------------------------ |
| `dev`     | Runs the `env up`              |
| `refresh` | Runs the `down clean-host up`  |
| `rebuild` | Runs `down build up`           |
| `clean`   | Runs `clean build-no-cache up` |

#### Low-Level `make` Targets

| Target            | Description                                                                                                         |
| ----------------- | ------------------------------------------------------------------------------------------------------------------- |
| `env`             | Generates the `.env` file.                                                                                          |
| `build`           | Builds the Docker images for the Dockerfiles used by Docker Compose.                                                |
| `build-no-cache`  | Builds the Docker images for the Dockerfiles used by Docker Compose but prevents Docker from using the layer cache. |
| `up`              | Builds the Docker images, creates the Docker containers and runs Docker the services.                               |
| `up-d`            | Builds the Docker images, creates the Docker containers and runs Docker the services in detached (daemon) mode.     |
| `start`           | Starts the stopped Docker services.                                                                                 |
| `restart`         | Retarts the running Docker services.                                                                                |
| `stop`            | Stops the running Docker services.                                                                                  |
| `kill`            | Immediately stops the running Docker services.                                                                      |
| `down`            | Stops and removes the Docker services.                                                                              |
| `clean-docker`    | Stops and removes the Docker services, as well as all volumes, images and orphan containers.                        |
| `clean-host`      | Removes all Docker-generated files and directories from the host machine.                                           |
| `ssh-web`         | Starts and interactive shell within the `web` container.                                                            |
| `ssh-node`        | Starts and interactive shell within the `node` container.                                                           |
| `ssh-database`    | Starts and interactive shell within the `database` container.                                                       |
| `export-database` | Exports the database (as a gzipped sql dump file) from the `database` container to the `DB_DUMP_DIR`.               |
| `import-database` | Imports the the gzipped sql dump file from the `DB_DUMP_DIR` to the database in the `database` container.           |
| `composer-update` | Updates all Composer packages and generates a new `composer.lock` file.                                             |
| `npm-update`      | Updates all NPM packages to their latest versions and generates new `package.json` and `package-lock.json` files.   |

## Front-end Scripts

These are the scripts to build and watch for changes to our front-end assets, like SCSS, JS and image files in the `assets` directory.

To run these scripts, you will first need to change directories to the `wlion` theme directory (`/app/themes/wlion`).

| Command         | Description                          |
| --------------- | ------------------------------------ |
| `npm run build` | compile assets                       |
| `npm run watch` | watch for changes and compile assets |

## WP-CLI

We use [WP CLI](http://wp-cli.org/) to perform common tasks in WordPress. Here are a few commands that will be helpful for you as you work on your project:

| Command                                       | Description                                                                |
| --------------------------------------------- | -------------------------------------------------------------------------- |
| `wp core update`                              | Update the WordPress core to the latest version                            |
| `wp plugin search "__PLUGIN_NAME__"`          | Search for a plugin by name                                                |
| `wp plugin install "__PLUGIN_NAME__"`         | Install a plugin by name                                                   |
| `wp plugin update "__PLUGIN_NAME__"`          | Update plugin by name                                                      |
| `wp plugin update --all`                      | Update all plugins                                                         |
| `wp search-replace "old string" "new string"` | Search and replace a specific string everywhere it appears in the database |

There are many other commands that you can find in the [documentation for WP CLI](https://developer.wordpress.org/cli/commands/).

## Advanced Custom Fields

To create custom fields, we use the [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/) plugin.

### Documentation

You can view the [documention for ACF here](https://www.advancedcustomfields.com/resources/).

### Updating ACF Pro

We have a developer license, which allows us to use the plugin on as many sites as we want. To do so, we need to make sure the license key is present in the site admin. Our license key is:

```
b3JkZXJfaWQ9OTE3MTh8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE2LTEwLTE0IDE5OjE5OjA2
```
