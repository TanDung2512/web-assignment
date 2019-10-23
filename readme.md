### Hello

* go to apache/conf/httpd.conf add this line 
```
    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule web-assignment/(.*) /web-assignment/index.php?path=$1 [NC,L,QSA]
```
