A new Laravel project.

## Getting Started
This project aims to register patients and link them with doctors within the system.

- [Laravel](https://laravel.com/).
- [Laravel Sail](https://laravel.com/docs/10.x/sail).


### Without docker
## Step One

Download composer on your machine with the link: https://getcomposer.org/download/

**note: composer needs PHP installed on the machine**

Make a clone of this project using the command

```
    https://github.com/AndreTGama/facil-consulta.git
```

## Step Two

Run the command in your terminal

**note: the terminal needs is in the root of the project**

```
    composer install
```

## Step Three

Configure the .env file, if not, copy the .env-example file and rename it to .env and configure the database connection information

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE={database name}
    DB_USERNAME={user}
    DB_PASSWORD={password}
```

## Step four

Run command in terminal

```
    php artisan jwt:secret
```
**note: This command will create your JWT key, don't share it with anyone**

## Step five

Run command in terminal

```
    php artisan migrate:refresh --seed
```

## Step five

Run command in terminal

```
    php artisan serve
```



### With docker

## Step One

Download composer on your machine with the link: https://getcomposer.org/download/

**note: composer needs PHP installed on the machine**

Make a clone of this project using the command

```
    https://github.com/AndreTGama/facil-consulta.git
```

## Step Two

Run the command in your terminal

**note: the terminal needs is in the root of the project**

```
    composer install
```

## Step Three

Run command in terminal

```
    php artisan jwt:secret
```
**note: This command will create your JWT key, don't share it with anyone**
## Step four

Download docker on your machine with the link: https://www.docker.com/products/docker-desktop/


## Step five

Run the command in your terminal

**note: If you use windows you will need to use Ubuntu LTS, available on the microsoft store - link: https://apps.microsoft.com/store/detail/ubuntu-20046-lts/9MTTCL66CPXJ**
**note: the terminal needs is in the root of the project**

```
    ./vendor/bin/sail up
```

## Step six

Configure the .env file, if not, copy the .env-example file and rename it to .env and configure the database connection information

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE={database name}
    DB_USERNAME={user}
    DB_PASSWORD={password}
```

## Step seven

create a alias for sail

```
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

**note: This command will create your JWT key, don't share it with anyone**

## Step eight

Run command in terminal

```
    sail artisan migrate:refresh --seed
```

## Step nine

Run command in terminal

```
    sail up
```
 
 or

```
    sail up -d
```
