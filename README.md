# WordPress Starter Theme - DesignHammer

The DesignHammer WordPress Starter theme is a _hybrid_ theme based on [Underscores](https://underscores.me/), that has been reconfigured to our workflow.

<img src="STARTER/screenshot.png" alt="[DesignHammer WordPress Theme Screen Shot" style="width:75%;" />

## What is a hybrid theme?

A **hybrid WordPress theme** uses theme.json to define styles and customize the block editor while also using traditional PHP template files.

Hybrid themes leverage the block editor for content but not for building the theme itself. **Block themes** use the new Site Editor for building and customizing the theme directly in the block editor.

_— [Bill Erickson](https://www.billerickson.net/)._


## Getting Started

1. Search and replace every instenace of the following three word instances with the new theme name. "STARTER", "Starter", and "starter".
2. Move `.editorconfig` and `composer.json` files to the root of the new websites repo. Composer will install the [PHP CodeSniffer](https://github.com/PHPCSStandards/PHP_CodeSniffer/) tools used for PHP linting. It also installs [deployer](https://deployer.org/), but if you don't need it, remove it from the composer file before running `composer install`.
3. Use our [Theme Task Runner](https://github.com/designhammer/theme-task-runner) setup for compiling Sass, JavaScript and Linting our code.

## Theme error

Be sure to add the "Primary Menu" and "Footer Menu" under Appearence > Menus. This will fix the error from file `STARTER/inc/class-button-sublevel-walker.php`.
