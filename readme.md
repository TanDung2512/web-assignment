# Web Programming Assignment 
**Lecturer:** Dr. Nguyen Duc Thai

**Group members:**
- Dung Nguyen - 1652119
- Thinh Tran - 1652578
- Nhu Vo - 1652458
- Thu Tran - 1652599

## Table of contents

- [Quick start](#quick-start)
- [Summary](#summary)
- [Technologies](#technologies)
- [Additional Tools](#additional-tools)


## Quick start


1. use command line
``` 
    npm install 
```

2. to Start project 
```
    gulp
```

## Summary
- **Model:** This project applies MVC model to structure the website in order to make it more maintainable and extendable 
- **Architecture:** 
    * Routing: all the requests will go to index.php, and will be redirected to appropriate controller. To make it simple, we just implement GET and POST method 

    * View: this folder contains all views of the website. There is a View.php which is a class to take correspond view depend on argument

    * Controller: this folder contains all controllers of the website. Each webpage will have its own controller 

    * Model: this folder is to manage connection of database as well as all queries

    * Classes: this folder contains all class definitions. Ex: User, CV, Router,... 


## Technologies
- **PHP:** Back-end
- **MySQL:** Database
- **Gulp:** Compile SCSS, Browser Sync
- **SCSS:** To make writing CSS easier and maintainable

## Additional Tools
- **Git Client**: Sourcetree or Sublime Merge is good, or use the one included in VSCode or Atom.
- **PhpStorm / Visual Studio Code**: suggested text editor