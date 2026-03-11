# Pizzeria - instrukcja uruchomienia

## Wymagania

- Docker Desktop (z `docker compose`)

## 1) Zbudowanie i uruchomienie kontenerów


```bash
docker compose up -d --build
```

## 2) Instalacja zależności PHP

```bash
docker compose exec app composer install
```

## 3) Konfiguracja Laravel

Plik `app/.env` jest już skonfigurowany pod MySQL z Dockera:

- `DB_HOST=mysql`
- `DB_PORT=3306`
- `DB_DATABASE=pizza_app`
- `DB_USERNAME=dbuser`
- `DB_PASSWORD=dbpass`

Jeśli uruchamiasz projekt pierwszy raz, wygeneruj klucz:

```bash
docker compose exec app php artisan key:generate
```

## 4) Migracje bazy danych

```bash
docker compose exec app php artisan migrate --seed
```

## 5) Uruchomienie schedulera (tryb ciągły)

Scheduler odpowiada za automatyczne zamykanie 1 najstarszego zamówienia co 10 minut.

Uruchom w osobnym terminalu:

```bash
docker compose exec app php artisan schedule:work
```


Po starcie będą dostępne usługi:

- aplikacja: [http://localhost:8001](http://localhost:8001)
- phpMyAdmin: [http://localhost:8080](http://localhost:8080)

## 6) Przydatne komendy

Jednorazowe ręczne wykonanie logiki zamykania najstarszego zamówienia:

```bash
docker compose exec app php artisan orders:complete-oldest
```

Podgląd logów aplikacji:

```bash
docker compose exec app tail -f storage/logs/laravel.log
```

Zatrzymanie kontenerów:

```bash
docker compose down
```
