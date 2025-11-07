# WordPress Starter Theme - DesignHammer

The DesignHammer WordPress Starter theme is a _hybrid_ theme based on [Underscores](https://underscores.me/), that has been reconfigured to our workflow.

<img src="STARTER/screenshot.png" alt="[DesignHammer WordPress Theme Screen Shot" style="width:75%;" />

## What is a hybrid theme?

A **hybrid WordPress theme** uses theme.json to define styles and customize the block editor while also using traditional PHP template files.

Hybrid themes leverage the block editor for content but not for building the theme itself. **Block themes** use the new Site Editor for building and customizing the theme directly in the block editor.

_— [Bill Erickson](https://www.billerickson.net/)._


## Getting Started

1. Search and replace every instenace of the following three words with the new theme name. "STARTER", "Starter", and "starter".
2. Move `.editorconfig` and `composer.json` files to the root of the new websites repo. Composer will install the [PHP CodeSniffer](https://github.com/PHPCSStandards/PHP_CodeSniffer/) tools used for PHP linting. It also installs [deployer](https://deployer.org/), but if you don't need it, remove it from the composer file before running `composer install`.

### Using the theme task runner

#### Install

Install the following node modules (npm), in the same directory as this readme file, for compiling and linting our code.

We use **bun.sh** for JavaScript runtime. See how to [install bun](https://bun.sh/docs/installation).

```bash
bun add -D @eslint/js autoprefixer eslint globals postcss-pxtorem sass stylelint stylelint-config-standard-scss stylelint-order svgo vite
```

#### Config

wp-content/themes/STARTER/vite.local.sample.mjs

- Duplicate `vite.local.sample.js` file and rename it `vite.local.js`.
- Change values in file as needed.
- ⚠️ Do not commit this file to the repo. It's for your local dev env only.

wp-config.local.php
```php
/**
 * Main switch to get frontend assets from a Vite dev server.
 * Change to 'false' for production.
 */
define( 'IS_VITE_DEVELOPMENT', true );
```

Additional files used for theme building:

- wp-content/themes/STARTER/.stylelintrc.json
- wp-content/themes/STARTER/eslint.config.mjs
- wp-content/themes/STARTER/inc/vite-inc.php
- wp-content/themes/STARTER/package.json
- wp-content/themes/STARTER/svgo.config.js
- wp-content/themes/STARTER/src/main.js
- wp-content/themes/STARTER/vite.config.mjs

#### Initial Build

Once setup, run `bun run build` to build the dist/manifest.json and asset files. Then open in browser using local URL: e.g. https://local.EXAMPLE.test

---

### Editor

**VS Code:** install the following extensions:

- [ESLint](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint)
- [stylelint](https://marketplace.visualstudio.com/items?itemName=stylelint.vscode-stylelint)

Workspace setting should be located at the root of this project's repo: `/.vscode/settings.json`

```json
{
  "files.trimTrailingWhitespace": true,
  "eslint.workingDirectories": [
    "htdocs/themes/STARTER"
  ],
  "stylelint.configBasedir": "htdocs/themes/STARTER",
  "stylelint.configFile": "htdocs/themes/STARTER/.stylelintrc.json",
  "stylelint.snippet": [
    "sass",
    "scss"
  ],
  "stylelint.validate": [
    "sass",
    "scss"
  ],
  "phpsab.fixerEnable": true,
  "phpsab.snifferEnable": true,
  "phpsab.standard": "WordPress",
  "phpsab.executablePathCS": "./vendor/bin/phpcs",
  "phpsab.executablePathCBF": "./vendor/bin/phpcbf"
}
```

### Installing [PHP Code Sniffer](https://docs.designhammer.net/guides/coding-standards/) for WordPress

Run the following command from the root directory of this repo.

```bash
$ composer require --dev squizlabs/php_codesniffer wp-coding-standards/wpcs
# required plugin
$ composer require --dev dealerdirect/phpcodesniffer-composer-installer
# set phpcs paths to WordPress PHP Coding Standards
$ vendor/bin/phpcs --config-set installed_paths vendor/wp-coding-standards/wpcs
```


## Theme error

Be sure to add the "Primary Menu" and "Footer Menu" under Appearence > Menus. This will fix the error from file `STARTER/inc/class-button-sublevel-walker.php`.
