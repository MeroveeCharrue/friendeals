# friendeals
App for home accounting

## Cheat sheet
```bash
php bin/console lint:twig templates/
php bin/console make:entity
php bin/console make:migration
```

# Setup

Create new `.env.local` file :
```dotenv
DATABASE_URL="mysql://<user>:<password>@<host>/friendeals?serverVersion=5.7"
```

Run :
```shell
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```
