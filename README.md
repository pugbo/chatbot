# Botman studio php chatbot based on Laravel

## installation

* `git clone`
* `composer install`
* `cp .env.example .env`
* `php artisan key:generate`

## development

*  Ricordati di integrare PUGBO_MEETUP_KEY nel file .env
* `php artisan serve -vvv`

## Note

* `routes/botman.php` listens for commands
* `App\Pugbo\Pugbot` business logic

## Requirements

* php > 7.1
* composer
* botman/studio

