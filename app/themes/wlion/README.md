# Project Template (WordPress)

## Setup Locally (Valet)

1. Clone the project into your local directory (~/Code).

    ```
    $ git clone git@github.com:wlion/pt-wordpress.git
    ```

2. Link the project to Valet.

    ```
    $ cd pt-wordpress
    $ valet link
    ```
    
3. Create a local database with the following credentials.

    ```
    dbname: pt-wordpress
    username: root
    password:
    ```

4. Generate the wp-config.php file and import the database.

    ```
    $ make dev-valet
    ```

5. Secure the project with Valet (optional)

    ```
    $ valet secure pt-wordpress
    ```

## Setup Locally (Vagrant)

1. Clone Scotch Box into your local directory (~/Code).

    ```
    $ git clone https://github.com/scotch-io/scotch-box.git pt-wordpress
    ```

2. Remove index.php from the public directory (~/Code/pt-wordpress/public/index.php).

    ```
    $ rm index.php
    ```

3. Clone the project into the public directory (~/Code/pt-wordpress/public).

    ```
    $ git clone git@github.com:wlion/pt-wordpress.git .
    ```

4. Update the Vagrantfile in the project root (~/Code/pt-wordpress/Vagrantfile).

    ```
    # Replace lines 16-19 with the following
    config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }
    config.vm.provision "shell", inline: <<-SHELL
        cd /var/www/public
        make dev-vagrant
    SHELL
    ```

5. Run ```vagrant up```
6. Add ```wordpress.wldev``` to your hosts file.

    ```
    $ sudo vi /etc/hosts

    # Add the following line to the bottom of the hosts file
    192.168.33.10 wordpress.wldev
    ```

7. Replace all instances of the old site domain in the database with your local dev domain. You will do this using the WP-CLI which is pre-installed with Scotch Box. To use it, you will need to shell into vagrant and change to the project directory.

    ```
    $ vagrant ssh
    $ cd /var/www/public

    # You may first need to open the database in a SQL client such as Sequel Pro to see what the "OLD_SITE_DOMAIN" is.
    $ wp search-replace 'OLD_SITE_DOMAIN' 'wordpress.wldev'
    ```

8. (optional) Connect to the shared DB hosted on wlreview3.

    In a new shell window forward to port 3306 on web6.
    ```
    ssh wlion@web6.wlion.com -L 43306:127.0.0.1:3306
    ```

    In the original shell window where vagrant was run.
    ```
    vagrant ssh -- -R 43306:localhost:43306
    ```

    > By default, running `vagrant up` sets up up your local project with the database configuration for your local environment.

    > To connect to the remote database, you will need to make sure you have the proper database configuration. To do so you will need to update `/stubs/wp-config.php.dev-shared` with the correct database name for your project, and then run `make env-dev-shared` from the project root.

9. You are now ready to go! You may view your local dev site at `wordpress.wldev`.

> For more information about our WordPress/Vagrant environment setup visit [https://whitelion.atlassian.net/wiki/display/DEV/Local+Dev+Environment](https://whitelion.atlassian.net/wiki/display/DEV/Local+Dev+Environment)

## Front-end Scripts

These are the scripts to build and watch for changes to our front-end assets, like SCSS, JS and image files in the `assets` directory.

To run these scripts, you will first need to change directories to the `wlion` theme directory (/wp-content/themes/wlion).

* `$ npm run build` => compile assets
* `$ npm run watch` => watch for changes and compile assets

## WP CLI

We use [WP CLI](http://wp-cli.org/) to perform common tasks in WordPress. Here are a few commands that will be helpful for you as you work on your project:

* `$ wp core update` => update the WordPress core to the latest version
* `$ wp plugin search "__PLUGIN_NAME__"` => search for a plugin by name
* `$ wp plugin install "__PLUGIN_NAME__"` => install a plugin by name
* `$ wp plugin update "__PLUGIN_NAME__"` => update plugin by name
* `$ wp plugin update --all` => update all plugins
* `$ wp search-replace "old string" "new string"` => search and replace a specific string everywhere it appears in the database

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
