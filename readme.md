<div align="center">
    <img src="https://www.metalab.csun.edu/img/logo/metalab-logo.svg" width="15%">
    <h1>IMMERSIVE 2019: Back End Track</h1>
</div>

# Table of Contents
- [About META+LAB IMMERSIVE](#about-meta+lab-immersive)
- [Learning Laravel](#learning-laravel)
- [Instructions](#instructions)
    - [Env values](#env-values)
- [Starting your Docker environment](#starting-your-docker-environment)
    - [Composer](#composer)
    - [Artisan](#artisan)
- [License](#license)


## About META<span style="color:#d00d2d;">+</span>LAB IMMERSIVE

The META<span style="color:#d00d2d;">+</span>LAB IMMERSIVE is a 2 week bootcamp with the aim of teaching participants the basics of web development. It is composed of 3 tracks: Front End which includes UI/UX, Back End with an emphasis on Laravel, and Operations with an accredited AWS Solutions Architect lecturer.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1400 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Instructions

Before we begin your development machine **must** have the following dependencies:

+ Git
+ Docker with Docker Compose
+ A Text Editor or IDE of your choice

Once all of the dependencies are met we can get started by cloning the repository into any directory. To achieve this fire up your favorite command-line application and issue `$ git clone https://github.com/luisjg/immersive.git`. This will make an `immersive` directory on your machine. Once you successfully complete this step you can continue on to the next section.

### Env values

The final step for the project initialization is to set our `.env` values. First we have to make a copy of the `.env.example` file and save it as `.env`. Make sure that it is a **copy**, renaming the `.env.example` to `.env` is not the correct way of doing things. Next we want to open the `.env` file with our favorite text editor and locate the following section:

```
# small snippet from .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Here we're going to set the values to our MySQL Docker configuration found in `docker-compose.yml` file:

```
# these values should now be on your .env file
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=immersive
DB_USERNAME=immersive
DB_PASSWORD=immersivepass
```

Once we have done these changes we can now continue on to the [Starting your Docker environment](#starting-your-docker-environment) section.

<div align="center">
    <img src="https://www.docker.com/sites/default/files/social/docker_facebook_share.png">
</div>

## Starting your Docker environment

To start your docker environment please follow the next steps.

1. Open your favorite command-line interface application such as **Terminal** for macOS or **Powershell** for Windows.
2. Change directory into the `immersive` folder.
3. To start your docker environment execute the following command: `docker-compose up -d`.
4. To enter your container execute the following command: `docker exec -it immersive /bin/bash`.
5. To exit your container simply type `exit`.
6. To shutdown your containers execute the following command: `docker-compose down`.

To see your website, open up your internet browser and go to `http://localhost:8080`.

To access adminer, open up your internet browser and go to `http://localhost:8081`.

**Note:** When we run `docker-compose up -d` to start our containers for the very first time, it will take a little while for us to see anything when we visit `http://localhost:8080` that is because all of the Laravel dependencies are being installed for the very first time. Please be patient!

### Composer

To use composer make sure that you use the right container which has the composer.json file.

1. Enter your container using the following command: `docker exec -it immersive /bin/bash`.
2. Install dependencies by executing the following command: `composer install`.

### Artisan

To use artisan make sure that you use the right container.

1. Enter your container using the following command: `docker exec -it immersive /bin/bash`.
2. Run your desired artisan commands by executing the following command on your favorite terminal: `php artisan`.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
