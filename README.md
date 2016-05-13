## quickstart-php
A simple PHP app (using Sim: a PHP micro framework ) which can easily be deployed to Arukas.

### Running locally

```
$ git clone https://github.com/peco8/quickstart-php.git
$ cd quickstart-php
$ docker build --tag quickstart-php .
$ docker run -d -p 80:80 quickstart-php
```

Your app should now be running:

```
$ curl 192.168.59.103:80/hello/Arukas
Hello Arukas
```

### Deploying to Arukas

[Install the Arukas CLI.](/)

```
```

**Continue with this tutorial [here](/).**
