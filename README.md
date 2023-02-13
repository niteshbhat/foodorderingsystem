
About The Project Use any preferred language to develop a small food ordering system with a calendar, menu and order confirmation details. The DB (mysql) to keep the history of the orders.
 1. To be running as docker container (So that we can test it in our test kubernetes)
 2. A mysql db running as a docker and connected to the site 
 3. Bundle all these as helm chart 
 4. Share us the website code and dockerfile via github and a readme file on how to run this and make it up on our kubernetes cluster to test Should be able to create at-least one order successfully
   
<img src="https://github.com/niteshbhat/foodorderingsystem/blob/Master/Screenshot/localhost_landing%20page.png" width="30%" height="30%"><img src="https://github.com/niteshbhat/foodorderingsystem/blob/Master/Screenshot/orderdetail-Food%20Restaurants.png" width="30%" height="30%"><img src="https://github.com/niteshbhat/foodorderingsystem/blob/Master/Screenshot/listorder-Food%20order%20system.png" width="30%" height="30%"><img src="https://github.com/niteshbhat/foodorderingsystem/blob/Master/Screenshot/ordershistory-Food%20order%20system.png" width="30%" height="30%"><img src="https://github.com/niteshbhat/foodorderingsystem/blob/Master/Screenshot/infrastructure_k8sdetails.png" width="30%" height="30%"><img src="https://github.com/niteshbhat/foodorderingsystem/blob/Master/Screenshot/mysql_details.png" width="30%" height="30%">

 

#Project Details

The Dockerfile installs the following required extensions for the PHP application: 
Mysql
libzip-dev
zip
libcurl4-openssl-dev
pkg-config
libssl-dev
libicu-dev 
libjpeg-dev 
libpng-dev 
libfreetype6-dev 
libjpeg62-turbo-dev 
libpq-dev 
The extensions are installed using apt-get install and docker-php-ext-install.


<!-- GETTING STARTED -->
Getting Started Instructions on setting up your project locally. To get a local copy up and running follow these simple example steps.
Prerequisites - kubernetes - helm 3.0 
Installation _Below is an example of how you can instruct your audience on installing and setting up your app. This template doesn't rely on any external dependencies or services. 

1. Clone the repo 
```sh 
git clone https://github.com/niteshbhat/foodorderingsystem && cd foodorderingsystem
``` 
2. using helm chart install the product into kubernetes cluster
 ```sh
 helm install foodsystem foodsystem -f ./foodsystem/values.yaml
  ``` 
Used below two repo from github where image has been upload
```sh
PHP based image: https://hub.docker.com/repository/docker/evila/food-ordering-system
Mysql based image: https://hub.docker.com/repository/docker/evila/food-ordering-system-database/general

```

Usage Used to two dockerfile
This is a Docker image for running a PHP application using Apache web server. It is based on the official PHP image and includes the following extensions:

    libzip-dev
    zip
    libcurl4-openssl-dev
    pkg-config
    libssl-dev
    libicu-dev
    libjpeg-dev
    libpng-dev
    libfreetype6-dev
    libjpeg62-turbo-dev
    libpq-dev
        
Additionally, the following PHP extensions are installed:

    zip
    curl
    intl
    gd
    pdo_mysql
    mysqli
    bcmath
To use this image, you will need to copy your PHP code into the image and expose the default Apache port. When the container is run, Apache will start and your PHP application will be available at http://localhost/.

Dockerfile 1 Use an official PHP image as the base image
   ```dockerfile
        # Use an official PHP image as the base image
        FROM php:7.4-apache

        # Install the required extensions
        RUN apt-get update && \
            apt-get install -y \
            libzip-dev \
            zip \
            libcurl4-openssl-dev \
            pkg-config \
            libssl-dev \
            libicu-dev \
            libjpeg-dev \
            libpng-dev \
            libfreetype6-dev \
            libjpeg62-turbo-dev \
            libpq-dev \
            && docker-php-ext-install \
            zip \
            curl \
            intl \
            gd \
            pdo_mysql \
            mysqli \
            bcmath

        # Copy the PHP code into the Docker image
        COPY ./php/ /var/www/html/

        # Expose the default Apache port
        EXPOSE 80

        # Start Apache when the container is run
        CMD ["apache2-foreground"]

   ```
Dockerfile 3 Use an official PHP image as the base image MySQL 5.7 Docker Image
Docker Image for MySQL
        This image is built using the official `mysql:5.7` image and includes custom configuration for setting up a local database.

        ## Environment Variables
        The following environment variables are used to configure the database:
        - `MYSQL_ROOT_PASSWORD`: The password for the root user of the database. Default value is `root`.
        - `MYSQL_DATABASE`: The name of the database that will be created. Default value is `local_db`.

        ## Copying SQL Script
        The `create-local-db.sql` file is copied to the `/tmp` directory of the Docker image. This script will be used to initialize the database when the container is run.

        ## Exposed Port
        The default MySQL port `3306` is exposed.

        ## Command to Run Container
        The following command is used to start the container:


 ```
 dockerfile
        FROM mysql:5.7

        ENV MYSQL_ROOT_PASSWORD=root \
            MYSQL_DATABASE=local_db 

        COPY ./create-local-db.sql /tmp

        EXPOSE 3360

        CMD [ "mysqld", "--init-file=/tmp/create-local-db.sql" ]

    ```
    
    
    
    
 
