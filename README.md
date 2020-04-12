# pjbase-laravel-docker
Laravel+Dockerのプロジェクトベース

<br>

## Tech

* **Docker**  
  * **Compose File**  
    3.7
* **Nginx**  
  Latest
* **PHP**  
  7.3.15
* **Laravel**  
  Latest
* **MySQL**  
  Latest

<br>

## Environment setup

1. Clone code in your local.  
    ``` git clone <repository url> ```
    
2. Run Docker Containers.  
    ``` cd <your project directory> ```  
    ``` docker-compose up -d ```
    
3. Install php libraries.  
    ``` sh ./laravel/scripts/00_composer_update_install.sh ```
    
4. Create .env file.  
    ``` sh ./laravel/scripts/02_create_env.sh ```
    
5. Create tables.  
    ``` sh ./laravel/scripts/03_artisan_migrate_seed.sh ```
    
6. Connect `http://localhost`.

<br>

## Tools

* Connect to nginx container.  
    ``` sh ./scripts/00_connect_nginx.sh ```

* Connect to php-fpm container.  
    ``` sh ./scripts/01_connect_php-fpm.sh ```
    
* Connect to database.  
    ``` sh ./scripts/02_connect_db.sh ```

* Update php library.  
    ``` sh ./laravel/scripts/00_composer_update_install.sh ```
    
* Update autoload.php.
    ``` sh ./laravel/scripts/01_composer_dump-autoload.sh ```
    
* Update about database.
    ``` sh ./laravel/scripts/03_artisan_migrate_seed.sh ```
