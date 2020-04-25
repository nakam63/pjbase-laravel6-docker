## Tech

* **Docker**  
  * **Compose File**  
    3.7
* **Nginx**  
  Latest
* **PHP**  
  7.3.15
* **Laravel**  
  6.x
* **MySQL**  
  Latest

<br>

## Environment setup
    
1. Run Docker Containers.  
    ``` cd <this project directory> ```  
    ``` docker-compose up -d ```
    
2. Install php libraries.  
    ``` sh ./scripts/composer_update_install.sh ```
    
3. Create .env file.  
    ``` sh ./scripts/create_env.sh ```
    
4. Create tables.  
    ``` sh ./scripts/artisan_migrate_seed.sh ```
    
5. Connect `http://localhost`.

<br>

## Tools

* Connect to nginx container.  
    ``` sh ./scripts/connect_nginx.sh ```

* Connect to php-fpm container.  
    ``` sh ./scripts/connect_php-fpm.sh ```
    
* Connect to database.  
    ``` sh ./scripts/connect_db.sh ```

* Update php library.  
    ``` sh ./scripts/composer_update_install.sh ```
    
* Update autoload.php.  
    ``` sh ./scripts/composer_dump-autoload.sh ```
    
* Update database.  
    ``` sh ./scripts/artisan_migrate_seed.sh ```
