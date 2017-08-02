# Sigfox Downlink with Php

## About

Check out the [downlink README](../README.md) to better undestand the overall downlink mechanism over the [Sigfox](http://makers.sigfox.com) network

## Vanilla

This sample use only vanilla Php, with no dependencies.  
### Install

#### Mac OS X

```
$ brew install php70
```

### Run

```
$ php -S 127.0.0.1:4004
```


## Silex

Sample using the Silex framework, for easy integration in your own app.

_**Disclaimer:** I didn't write a lot of Php the last couple of years, so may have troubles to keep up with the latest best practices & frameworks ;). Feel free to drop a suggestion!_

### Pre requisites

* Php
* Composer

### Install

#### Mac OS X

```
$ brew install php70
$ brew install composer --ignore-dependencies
```

### Run

```
$ composer update
$ php -S 127.0.0.1:4004
```


### Test

#### Empty response

	$ curl -X POST http://localhost:4004/sigfox

	HTTP 204 / No Content
  
#### Downlink data

	$ curl -X POST http://localhost:4004/sigfox -d deviceId=whatever
	
	{"whatever":{"downlinkData":"01234567890ABCDE"}}%

