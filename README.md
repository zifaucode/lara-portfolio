<p align="center"><a href="https://github.com/zifaucode/cek-lulus" target="_blank"><img src="https://github.com/zifaucode/lara-portfolio/assets/33486013/bb3a7afa-9cc1-40b7-bfde-a22d326479c9" width="900"></a></p>

<p align="center">
<a href="https://trakteer.id/zifau"><img src="https://img.shields.io/static/v1?label=Trakteer&message=zifaucode&color=C02433"></a>
</p>

<b>Fork dan Star ⭐ if this helps ♥️</b>

# Index

-   **[ABOUT LARA-PORTPOLIO](#about-lara-portfolio)**
-   **[HOW TO INSTALL](#how-to-install)**
-   **[USER PASSWORD](#user-password)**
-   **[TRAKTIR COFFEE](#traktir-kopi)**
-   **[License](#license)**

<br>
<br>

## ABOUT LARA-PORTPOLIO

ENG:
Web for portfolio needs created with the aim of making it easier for freelancers to build websites and write blogs on their personal websites.

<br>

ID:
Merupakan Web untuk kebutuhan portfolio yang dibuat dengan tujuan memudahkan para pekerja lepas untuk membangun website dan menulis blog pada website pribadinya

<br>
<br>

## HOW TO INSTALL

To Install Locally Make sure your PHP is above > 8.0

-   Clone this Repository in your favorite terminal `git clone https://github.com/zifaucode/lara-portfolio`
-   Type `composer install`
-   Rename .env-lokal to .env and edit according to your database configuration
-   Create a database on your dbms (ex: phpmyadmin) with the name according to the DB_DATABASE configuration on the .env
-   Migrate database : `php artisan migrate`
-   Running Seeder database : `php artisan db:seed`

then Run Terminal

-   `php artisan optimize:clear` and `php artisan serve`

<br>
<br>

option if you do not want to run the database migrate and seeder:

-   The SQL file is located in the MY-DATABASE folder, import it into the mysql db that you have created in your dbms.

## USER PASSWORD

-   U: admin
-   P: 123456789

<br>
<br>

## TRAKTIR COFFEE

Treat me to coffee to keep me fresh while coding : <a href="https://trakteer.id/zifau"><img src="https://img.shields.io/static/v1?label=Trakteer&message=zifaucode&color=C02433"></a>

<br>
<br>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
