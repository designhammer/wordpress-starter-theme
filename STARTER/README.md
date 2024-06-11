# Theme Readme

START by replace every instenace of the following three word instances with the new theme name. "STARTER", "Starter", and "starter".


## Installing PHP Code Sniffer

Run the following command from the root directory of this repo.

```bash
$ composer require --dev squizlabs/php_codesniffer wp-coding-standards/wpcs
# required plugin
$ composer require --dev dealerdirect/phpcodesniffer-composer-installer
# set phpcs paths to WordPress PHP Coding Standards
$ vendor/bin/phpcs --config-set installed_paths vendor/wp-coding-standards/wpcs
```

VS Code workspace setting should be located at the root of this project's repo: `/.vscode/settings.json`

```json
{
  "files.trimTrailingWhitespace": true,
  "phpsab.fixerEnable": true,
  "phpsab.snifferEnable": true,
  "phpsab.standard": "WordPress",
  "phpsab.composerJsonPath": "composer.json",
  "phpsab.executablePathCS": "vendor/bin/phpcs",
  "phpsab.executablePathCBF": "vendor/bin/phpcbf",
}
```
