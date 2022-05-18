<div id="top"></div>

<!-- PROJECT LOGO -->
<br />
<div align="center">
    <img src="images/logo.png" alt="Logo" height="80">

<h2 align="center">DRIIINK API</h3>

  <p align="center">
    DRIIINK API is the api that will be used in our app, DRIINK. The goal of this app <br />
    is to make ordering at a bar more easier
    <br />
    <a href="https://github.com/oxynum/driiink-api"><strong>Explore the docs »</strong></a>
    <br />
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
  </ol>
</details>


<div id="about-the-project"></div>

<!-- ABOUT THE PROJECT -->
## About The Project

Launch by Oxynum, DRIIINK is an app to make ordering easier at a bar. This repo contains the API that will be used in the app. Built with Symfony, API platform and JWT, it permits to have
full access to every data store in the database and to interact with it. The APi is secured by a JWT token only accessible for those considered as an admin. 

If you want to get access to the api you need to contact Oxynum. 

<p align="right">(<a href="#top">back to top</a>)</p>

<div id="built-with"></div>


### Built With

* [Symfony](https://symfony.com/)
* [EasyAdminBundle](https://symfony.com/bundles/EasyAdminBundle/current/index.html)
* [API Platform](https://api-platform.com/)
* [JWT](https://jwt.io/)


<p align="right">(<a href="#top">back to top</a>)</p>

<div id="getting-started"></div>


<!-- GETTING STARTED -->
## Getting Started
To get a local copy up and running follow these simple steps.


<div id="prerequisites"></div>

### Prerequisites

There is a list of everything you need to have to install the project.
* npm
  ```sh
  npm install npm@latest -g
  ```
* [Composer](https://getcomposer.org/download/)
* [PHP >= 8](https://www.php.net/manual/fr/install.php) 
* [A local development server](https://www.mamp.info/en/downloads/)

<div id="installation"></div>

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/oxynum/driiink-api.git
   ```
2. Install Composer packages
   ```sh
   composer install
   ```
3. Install npm packages
   ```sh
   npm install
   ```
4. Duplicate `.env.example` as `.env.local`
   ```sh
   cp .env.example .env.local
   ```
5. Enter your DATABASE in `.env.local`
   ```dotenv
   DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7&charset=utf8mb4"
   ```
6. Run those following command
   ```sh
   php bin/console doctrine:database:create 
   ```
   ```sh
   php bin/console m:mi
   ```
   ```sh 
   php bin/console d:m:m
   ```
   ```sh 
   php bin/console d:f:l
   ```
   ```sh
   symfony server:start
   ```

<p align="right">(<a href="#top">back to top</a>)</p>


<div id="usage"></div>

<!-- USAGE EXAMPLES -->
## Usage

You now have installed the project on your computer. You will now have access to a webpage at [https://localhost:8000](https://localhost:8000).
There are 3 route you have to know :
1. [https://localhost:8000/api/docs](https://localhost:8000/api/docs) <br />
   This link will lead you to the documentation of the API.
     

2. [https://localhost:8000/admin](https://localhost:8000/admin) <br />
   This link will lead you to the admin panel that permit to access/edit/remove ever information about the app.


3. [https://localhost:8000/login_check](https://localhost:8000/login_check) <br />
   This link is a route to get the JWT token to get access to the API. You need to send a POST request with a couple email/password
   in the body like so :
   ```json
   {
    "email": "your@email.com" ,
    "password": "yourpassword"
   }
   ```
    


<p align="right">(<a href="#top">back to top</a>)</p>



