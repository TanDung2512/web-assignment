### Hello

## Set Up Project

1. go to apache/conf/httpd.conf add this line 
```
    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule web-assignment/(.*) /web-assignment/app/index.php?path=$1 [NC,L,QSA]
```
2. use command line
``` 
    npm install 
```

3. to Start project 
```
    gulp
```

