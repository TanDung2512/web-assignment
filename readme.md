# Web Programming Assignment 
**Lecturer:** Dr. Nguyen Duc Thai

**Group members:**
- Dung Nguyen - 1652119
- Thinh Tran - 1652578
- Nhu Vo - 1652458
- Thu Tran - 1652599



## Table of contents

- [Quick start](#quick-start)
- [Usecase diagram](#usecase-diagram)
- [Summary](#summary)
- [Technologies](#technologies)
- [Related links](#related-links)
- [Additional Tools](#additional-tools)



## Quick start
0. Install XAMPP and clone the project into XAMPP/htdocs

1. Initialize database: import database scripts into phpmyadmin

2. Use command line (Require node v11.11.0)
``` 
    npm install 
```

3. To start project 
```
    gulp
```

## Usecase diagram

![Diagram](https://github.com/TanDung2512/web-assignment/blob/master/Usercase.png?raw=true)

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

## Related links

- **Trello:** show assigned tasks https://trello.com/b/gCbDcLLl/assignment-web
- **Design UI:** https://app.zeplin.io/project/5dad9ee730b1aa127f09350e

## Additional Tools
- **Git Client**: Sourcetree or Sublime Merge is good, or use the one included in VSCode or Atom.
- **PhpStorm / Visual Studio Code**: suggested text editor
