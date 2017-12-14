# REST API on PHP

## Installation

1. Load DB dump from `db_dump.sql`.

2. Set up your DB credentials in `config.php`.

3. Set up your authentication credentials in `App.php`
```
$credentials = [
            'login' => 'yourLogin',
            'pwd' => 'yourPassword'
               ];
```

4. Set `base_url` in `config.php`. It's a path between your domain root and site's base folder.
See [this example](https://ibb.co/k5a4TG)

5. Install dependencies
```
composer install
```