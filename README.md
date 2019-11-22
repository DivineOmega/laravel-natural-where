# Laravel Natural Where

Laravel Natural Where extends the Laravel query builder to allow expressing of 
where operators in natural language.

## Installation

To install Laravel Natural Where, run the following command from the
root of your project.

```bash
composer require divineomega/laravel-natural-where
```

## Usage

See the basic usage example below.

```php
$query = \App\User::query()
    ->naturalWhere('created_at', 'is between the years', ['2018', '2020'])
    ->naturalWhere('email', 'contains the word', 'jordan')
    ->naturalWhere('name', 'is not', 'Jordan Smith')
    ->naturalWhere('id', 'is one of the following', [1, 2, 3])
    ->get();
```