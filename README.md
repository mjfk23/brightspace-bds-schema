# mjfk23/brightspace-bds-schema

## Usage
```sh
./bin/console brightspace:bds:update-datasets
./bin/console brightspace:bds:generate-entities

rm -f ./migrations/*.php
./bin/console doctrine:migrations:diff
./bin/console doctrine:migrations:migrate --dry-run --write-sql=./migrations/migration.${APP_ENV}.sql
```

See the [Brightspace documentation](https://community.d2l.com/brightspace/kb/articles/4518-about-brightspace-data-sets)
for more information

## License
This project is [MIT Licensed](LICENSE)