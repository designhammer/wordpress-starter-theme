# Theme Readme

Replace every instenace of the following three word instances with the new theme name. "STARTER", "Starter", and "starter".


## Linting

### Install

Install the following node modules (npm), in the same directory as this readme file, for compiling and linting the code.

We use **bun.sh** for JavaScript runtime. See how to [install bun](https://bun.sh/docs/installation).

```bash
bun add -D standard stylelint stylelint-config-sass-guidelines stylelint-order
```

We'll also be linting our sass and Javascript in order to produce well written and consistent code.

Required lint files (should be included in this repo):

- .eslintrc.json
- .stylelint.json

To do a global lint on the SCSS files run: `npx stylelint "scss/**/*.scss"`. To fix found errors add the `--fix` flag.


### Installing [PHP Code Sniffer](https://docs.designhammer.net/guides/coding-standards/) for WordPress

Run the following command from the root directory of this repo.

```bash
$ composer require --dev squizlabs/php_codesniffer wp-coding-standards/wpcs
# required plugin
$ composer require --dev dealerdirect/phpcodesniffer-composer-installer
# set phpcs paths to WordPress PHP Coding Standards
$ vendor/bin/phpcs --config-set installed_paths vendor/wp-coding-standards/wpcs
```


## Editor

**Sublime:** install the following packages using package control:

- SublimeLinter
- SublimeLinter-contrib-standard
- SublimeLinter-eslint
- SublimeLinter-stylelint

**VS Code:** install the following extensions:

- [ESLint](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint)
- [stylelint](https://marketplace.visualstudio.com/items?itemName=stylelint.vscode-stylelint)

Workspace setting should be located at the root of this project's repo: `/.vscode/settings.json`

```json
{
  "files.trimTrailingWhitespace": true,
  "eslint.workingDirectories": [
    "htdocs/wp-content/themes/STARTER"
  ],
  "stylelint.packageManager": "yarn",
  "stylelint.configBasedir": "htdocs/wp-content/themes/STARTER",
  "stylelint.configFile": "htdocs/wp-content/themes/STARTER/.stylelintrc.json",
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
  "phpsab.composerJsonPath": "composer.json",
  "phpsab.executablePathCS": "vendor/bin/phpcs",
  "phpsab.executablePathCBF": "vendor/bin/phpcbf",
}
```
