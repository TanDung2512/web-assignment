# OISP SOCIAL PLATFORM
**Lecturer:** Quan Thanh Tho

**Group members:**
- Dung Nguyen - 1652
- Thinh Tran - 1652578
- Nhu Vo - 1652458
- Thu Tran - 165


## Summary


## Technologies
- **PHP:** 
- **MySQL:** Database

## Additional Tools
- **Postman**: Test your APIs.
- **Git Client**: Sourcetree or Sublime Merge is good, or use the one included in VSCode or Atom.

## Set-up Project

* go to apache/conf/httpd.conf add this line 
```
    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule web-assignment/(.*) /web-assignment/index.php?path=$1 [NC,L,QSA]
```
