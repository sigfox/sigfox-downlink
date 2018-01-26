# Sigfox Downlink with Nodejs

## About

Check out the [downlink README](../README.md) to better understand the overall downlink mechanism over the [Sigfox](http://makers.sigfox.com) network

## hapi

This sample use the hapi framework.
Check their [website](https://hapijs.com/) for install instructions.

### Run

```
$ node hapi.js
```

### Test

#### Empty response

	$ curl -X POST http://localhost:4004/sigfox-downlink-empty -H "content-type: application/json" -d '{"device":"FAF7E"}'

	< HTTP/1.1 204 No Content

#### Downlink data

	$ curl -X POST http://localhost:4004/sigfox-downlink-data -H "content-type: application/json" -d '{"device":"FAF7E", "data":"70117f61a5ceec67"}'

	< HTTP/1.1 200 OK
	< content-type: application/json; charset=utf-8
	{"deviceId":"FAF7E","downlinkData":"70117f61a5ceec67"}
