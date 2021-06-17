# PHP fatal error test

See the following for a full explanation:

https://todayilearned.net/2021/06/fatal-php-errors-produce-200-http-status

To test using this code, use `make run` to start the web server, and then use `curl` to test the following URLs:

```
$ curl http://localhost:8666 -i
HTTP/1.1 200 OK
Date: Thu, 17 Jun 2021 19:38:21 GMT
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/8.0.7
Content-Length: 43
Content-Type: text/html; charset=UTF-8

Current date is: 2021-06-17T19:38:21+00:00

$ curl http://localhost:8666?bad -i
HTTP/1.1 500 Internal Server Error
Date: Thu, 17 Jun 2021 19:38:22 GMT
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/8.0.7
Content-Length: 43
Connection: close
Content-Type: text/html; charset=UTF-8

Silly error, catchable by set_error_handler().

$ curl http://localhost:8666?terrible -i
HTTP/1.1 500 Terrible Internal Server Error
Date: Thu, 17 Jun 2021 19:38:24 GMT
Server: Apache/2.4.38 (Debian)
X-Powered-By: PHP/8.0.7
Content-Length: 172
Connection: close
Content-Type: text/html; charset=UTF-8

<br />
<b>Fatal error</b>:  Array and string offset access syntax with curly braces is no longer supported in <b>/var/www/html/TerribleClass.php</b> on line <b>6</b><br />
```
