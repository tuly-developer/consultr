
# Consultr (PHP Laravel Exercise)

- CSV Import
- API 

## Lenguage
- PHP 7.2.34
- Laravel Framework 7.30.6

## Installation

```bash
  composer install
```
Configure .env with database credentials and add the API key `API_SUPERHEROES_KEY="4c8f6b51d448a62f5a76621db9057b157ef1ff42b797b7cadfe4ba0f47030f95"` them run

```bash
  php artisan key:generate
  php artisan cache:clear
  php artisan config:clear
  php artisan config:cache
  php artisan view:clear
  php artisan migrate
```

## Import route
`/import`


## API routes
api-superheroes-key required in request header

#### Get one/all superheroes

```
  GET /api/superheroes/{id?}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `int` | **Optional**. if ID dont exits all superheroes are returned instead |

#### Get superheroes with filter

```
  GET /superheroes/filter
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Optional**. |
| `fullname`      | `string` | **Optional**. |
| `strength`      | `int` | **Optional**. |
| `speed`      | `int` | **Optional**. |
| `durability`      | `int` | **Optional**. |
| `power`      | `int` | **Optional**. |
| `combat`      | `int` | **Optional**. |
| `race_id`      | `int` | **Optional**.  |
| `height_feet`      | `string` | **Optional**. |
| `height_cm`      | `string` | **Optional**. |
| `weight_lb`      | `string` | **Optional**. |
| `weight_kg`      | `string` | **Optional**. |
| `orderByColumn`      | `string` | **Optional**. i.e 'strength', 'durability'. Default value ID|
| `orderByMethod`      | `string` | **Optional**. 'asc' or 'desc'. Default value 'asc'|
| `page`      | `int` | **Optional**. |
| `paginate`      | `int` | **Optional**. Default value 10|


#### Example
`api/superheroes/filter?power=20&orderByColumn=id&orderByMethod=asc&page=2&paginate=2`

#### Response
```json
{
    "current_page": 2,
    "data": [
        {
            "id": 100,
            "name": "Bullseye",
            "fullname": "Lester",
            "strength": 11,
            "speed": 25,
            "durability": 70,
            "power": 20,
            "combat": 70,
            "race_id": 1,
            "height_feet": "6'0",
            "height_cm": "183 cm",
            "weight_lb": "200 lb",
            "weight_kg": "90 kg",
            "eye_color_id": 2,
            "hair_color_id": 3,
            "publisher_id": 1,
            "created_at": "2023-01-23T23:44:17.000000Z",
            "updated_at": "2023-01-23T23:44:17.000000Z",
            "race": {
                "id": 1,
                "type": "Human",
                "created_at": "2023-01-23T23:44:16.000000Z",
                "updated_at": "2023-01-23T23:44:16.000000Z"
            },
            "eye_color": {
                "id": 2,
                "detail": "Blue",
                "created_at": "2023-01-23T23:44:16.000000Z",
                "updated_at": "2023-01-23T23:44:16.000000Z"
            },
            "hair_color": {
                "id": 3,
                "detail": "Blond",
                "created_at": "2023-01-23T23:44:16.000000Z",
                "updated_at": "2023-01-23T23:44:16.000000Z"
            },
            "publisher": {
                "id": 1,
                "name": "Marvel Comics",
                "created_at": "2023-01-23T23:44:16.000000Z",
                "updated_at": "2023-01-23T23:44:16.000000Z"
            }
        },
        {
            "id": 145,
            "name": "Dash",
            "fullname": "Dashiell Robert Parr",
            "strength": 12,
            "speed": 92,
            "durability": 60,
            "power": 20,
            "combat": 30,
            "race_id": 1,
            "height_feet": "4'0",
            "height_cm": "122 cm",
            "weight_lb": "60 lb",
            "weight_kg": "27 kg",
            "eye_color_id": 2,
            "hair_color_id": 3,
            "publisher_id": 2,
            "created_at": "2023-01-23T23:44:17.000000Z",
            "updated_at": "2023-01-23T23:44:17.000000Z",
            "race": {
                "id": 1,
                "type": "Human",
                "created_at": "2023-01-23T23:44:16.000000Z",
                "updated_at": "2023-01-23T23:44:16.000000Z"
            },
            "eye_color": {
                "id": 2,
                "detail": "Blue",
                "created_at": "2023-01-23T23:44:16.000000Z",
                "updated_at": "2023-01-23T23:44:16.000000Z"
            },
            "hair_color": {
                "id": 3,
                "detail": "Blond",
                "created_at": "2023-01-23T23:44:16.000000Z",
                "updated_at": "2023-01-23T23:44:16.000000Z"
            },
            "publisher": {
                "id": 2,
                "name": "Dark Horse Comics",
                "created_at": "2023-01-23T23:44:16.000000Z",
                "updated_at": "2023-01-23T23:44:16.000000Z"
            }
        }
    ],
    "first_page_url": "http://127.0.0.1:8000/api/superheroes/filter?page=1",
    "from": 3,
    "last_page": 4,
    "last_page_url": "http://127.0.0.1:8000/api/superheroes/filter?page=4",
    "next_page_url": "http://127.0.0.1:8000/api/superheroes/filter?page=3",
    "path": "http://127.0.0.1:8000/api/superheroes/filter",
    "per_page": "2",
    "prev_page_url": "http://127.0.0.1:8000/api/superheroes/filter?page=1",
    "to": 4,
    "total": 8
}
