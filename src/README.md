# "Клуб Приключений" Test work



------------------------

DIRECTORY STRUCTURE
-------------------

    assets             contains assets definition
    common             contains application enums/controllers
       - controllers   contains application controllers
       - enums         contains application enums
    config             contains application configurations
    controllers        contains Web controller classes
    models             contains model classes
    runtime            contains files generated during runtime
    tests              contains various tests for the basic application
    vendor             contains dependent 3rd-party packages
    views              contains view files for the Web application
    web                contains the entry script and Web resources

CONFIGURATION
------------

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```