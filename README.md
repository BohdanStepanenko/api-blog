# API-blog 💬

### REST API education project

&nbsp;

# Table of Contents

-   **Instalation**
-   **Usage**
-   **JWT**

---

## Installation

Please, check the official Laravel framework installation guide for server requirements before you start.

> [Official Documentation](https://laravel.com/docs/8.x/installation)

**Step 1**. Clone the repository

    git clone git@github.com:BohdanStepanenko/api-blog.git

**Step 2**. Install all the dependencies using composer inside project folder

    composer install

**Step 3**. Copy the .env.example file and make the required configuration changes in your .env file

    cp .env.example .env

**Step 4**. Generate a new JWT authentication secret key

    php artisan jwt:generate

**Step 5**. Run the database migrations and seeding

> Important: Set the database connection in .env before migrating

    php artisan migrate:refresh --seed

---

## Usage

**Step 1**. Start the local development server

    php artisan serve

Now you have access the server at http://127.0.0.1:8000

You can use requests from [this collection](https://github.com/BohdanStepanenko/api-blog/blob/main/api-blog.postman_collection.json) using **Postman, Thunder Client** or other Rest API Client

---

## JWT

The **JWT** authentication middleware handles the validation and authentication of the token. Please check the following sources to learn more about JWT.

-   https://jwt.io/introduction/
-   https://self-issued.info/docs/draft-ietf-oauth-json-web-token.html
