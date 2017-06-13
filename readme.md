<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Project start up
For development it's recommended to use Laravel Homestead virtual machine. If it's not an option, requirements are listed below.
After downloading the project you should follow this steps to be able to run and develop the app.
1. Run `composer install` to install all PHP dependencies.
2. Run `npm install` to install all node dependencies.
3. Insert database credentials into `.env` file or in the `config/database.php`
3. Run `php artistan migrate` to create all required database tables.
4. (Optional) Run `php artistan db:seed` to seed example data for the project. 


## Requirements
- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension


### Strona linii autobusowych;
Aplikacja realizująca system internetowej rezerwacji określonych biletów. Powinna zapewniać co najmniej następujące funkcjonalności:
-	możliwość dokonania rezerwacji biletów poprzez wypełnienie pól formularza;
-	formularz rezerwacji powinien zawierać pola np. liczba biletów, kategoria (pospieszny, normalny), cel przejazdu, data, godzina, imię, nazwisko rezerwującego;
-	aplikacja powinna sprawdzać, czy złożona rezerwacja może być zrealizowana (tzn. czy istnieją odpowiednie zasoby);
-	łatwe dostosowanie kolorystyki aplikacji do całej strony (np. poprzez zgrupowanie parametrów określających wszystkie używane w aplikacji kolory w osobnym bloku kodu);
-	panel administracyjny (dostępny po zalogowaniu) powinien pozwolić na wprowadzenie informacji o dostępnych zasobach oraz kasowanie i edycję dokonanej rezerwacji.
