# quickstart-php
A simple PHP app ( using [Sim](http://www.slimframework.com/): a PHP micro framework) which can easily be deployed to Arukas.

## Running locally

```
$ git clone git@github.com:peco8/quickstart-php.git
$ cd quickstart-php
$ docker build --no-cache --tag quickstart-php .
$ docker run -d -p 80:80 quickstart-php
```

Your app should now be running:

```
$ curl 192.168.59.103:80/hello/Arukas
Hello world
```

## Deploying to Arukas

[Install the Arukas CLI](https://github.com/arukasio/cli),

or If you have docker installed already, try
```
$ docker run --rm -e ARUKAS_JSON_API_TOKEN=<APIT_TOKEN> \
                  -e ARUKAS_JSON_API_SECRET=<SECRET_KEY> \
                    arukasio/arukas run --instances=1 \
                                        --mem=512 \
                                        --ports=80:tcp peco8/quickstart-php
```
## Authors

* Toshiki Inami (<t-inami@arukas.io>)

## License

This project is licensed under the terms of the MIT license.

**Continue with this tutorial [here](/).**
