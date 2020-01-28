# Project Template (WordPress - Composer)

## Setup Locally (Valet)

1. Clone the project into your local directory (~/Code).

   ```
   $ git clone git@github.com:wlion/pt-wordpress-composer.git
   ```

2. Link the project to Valet.

   ```
   $ cd pt-wordpress-composer
   $ valet link
   ```

3. Create a local database with the following credentials.

   ```
   dbname: pt-wordpress-composer
   username: root
   password:
   ```

4. Generate the environment file and import the database.

   ```
   $ make dev
   ```

5. Secure the project with Valet (optional)

   ```
   $ valet secure pt-wordpress-composer
   ```

## Front-end Scripts

These are the scripts to build and watch for changes to our front-end assets, like SCSS, JS and image files in the `assets` directory.

To run these scripts, you will first need to change directories to the `wlion` theme directory (`/app/themes/wlion`).

- `$ npm run build` => compile assets
- `$ npm run watch` => watch for changes and compile assets

## WP CLI

We use [WP CLI](http://wp-cli.org/) to perform common tasks in WordPress. Here are a few commands that will be helpful for you as you work on your project:

- `$ wp core update` => update the WordPress core to the latest version
- `$ wp plugin search "__PLUGIN_NAME__"` => search for a plugin by name
- `$ wp plugin install "__PLUGIN_NAME__"` => install a plugin by name
- `$ wp plugin update "__PLUGIN_NAME__"` => update plugin by name
- `$ wp plugin update --all` => update all plugins
- `$ wp search-replace "old string" "new string"` => search and replace a specific string everywhere it appears in the database

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
