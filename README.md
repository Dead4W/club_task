# "Клуб Приключений" Test work

[![buddy pipeline](https://app.buddy.works/dead4w/club-task/pipelines/pipeline/301757/badge.svg?token=bfcd84c7fa743dec501694b1ab6f97bf4a546bc3b193573ce0ac16661765648f "buddy pipeline")](https://app.buddy.works/dead4w/club-task/pipelines/pipeline/301757)

![Code size](https://img.shields.io/github/languages/code-size/dead4w/club_task.svg)
![Lines of Code](https://tokei.rs/b1/github/dead4w/club_task?category=code)

------------------------

DIRECTORY STRUCTURE
-------------------

    apache2             contains apache configuration
    src                 contains yii2 application source files



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.6.0.

INSTALLATION
------------

### Install manually with Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project depencies using the following command:

~~~shell script
$ composer install
~~~

### Install with a Dockerfile

```shell script
$ docker build .
```


### Install with Docker-compose

Start the container

```shell script
$ docker-compose up -d
```

You can then access the application through the following URL:

    http://127.0.0.1:8080

**NOTES:** 
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](http://codeception.com/).
By default there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```shell script
$ php src/vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser. 
