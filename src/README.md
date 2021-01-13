# "Клуб Приключений" Test work

[![buddy pipeline](https://app.buddy.works/dead4w/club-task/pipelines/pipeline/301757/badge.svg?token=bfcd84c7fa743dec501694b1ab6f97bf4a546bc3b193573ce0ac16661765648f "buddy pipeline")](https://app.buddy.works/dead4w/club-task/pipelines/pipeline/301757)

![Code size](https://img.shields.io/github/languages/code-size/dead4w/club_task.svg)
![Lines of Code](https://tokei.rs/b1/github/dead4w/club_task?category=code)

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

    file: config/web.php

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```