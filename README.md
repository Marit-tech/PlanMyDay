# PlanMyDay – lokale installatie
## 1.
Installeer vooraf:
- PHP (een versie die Laravel 12 ondersteunt, minimaal PHP 8.2), inclusief de benodigde PHP-extensies;
- Composer;
- Node.js en npm;
- MariaDB of MySQL;
- een terminal, bijvoorbeeld die van Visual Studio Code.

Controleer in de terminal:
```bash
php -v
composer --version
node -v
npm -v
```

## 2.
Download de project-ZIP en pak deze uit
Open vervolgens de hoofdmap van PlanMyDay in een terminal. Hierin hoort onder andere het bestand `artisan` te staan.

## 3.
Voer in de projectmap uit:
```bash
composer install
npm install
```

## 4.
Maak een kopie van `.env.example` en noem die `.env`. Genereer daarna een applicatiesleutel:
```bash
php artisan key:generate
```

## 5.
Start MariaDB/MySQL en maak een lege database aan. Pas in `.env` de database-instellingen aan op de lokale installatie:
```dotenv
APP_TIMEZONE=Europe/Amsterdam
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=planmyday
DB_USERNAME=root
DB_PASSWORD=
```

De gebruikersnaam en het wachtwoord hierboven zijn voorbeelden. Vul de gegevens van de eigen database in.

Voer daarna uit:
```bash
php artisan config:clear
php artisan migrate
```

## 6. Testaccounts / gebruikers
Voer uit:
```bash
php artisan db:seed
```

## 7. Applicatie starten
Open een terminal in de projectmap.
```bash
composer run dev
```

Open daarna de URL die Laravel in de terminal toont. Standaard is dat:
```text
http://127.0.0.1:8000
```
Houd de terminal open zolang je de applicatie gebruikt.

## 8. Controleren of alles werkt
1. Open de loginpagina en log in als klant.
2. Open de agenda en controleer of de weekweergave zichtbaar is.
3. Plan als klant een opdracht in en controleer of deze in de agenda verschijnt.
4. Log uit en log in als lid.
5. Open een opdracht en controleer of de details zichtbaar zijn.
6. Controleer bij een afgelopen opdracht of het lid een beschrijving kan opslaan.