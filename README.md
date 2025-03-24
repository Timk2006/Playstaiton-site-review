# PlayStation 5 Reviews Website

 **XAMPP**.

## Vereisten
- **XAMPP** (Apache, MySQL, PHP & phpMyAdmin)
- **Webbrowser** (bijv. Chrome, Firefox, Edge)

## Installatie en opstarten

1. **Download en installeer XAMPP**
   - Ga naar [Apache Friends](https://www.apachefriends.org/) en download XAMPP.
   - Installeer en start de **Apache** en **MySQL** modules via het XAMPP Control Panel.

2. **Plaats de website in de htdocs-map**
   - Kopieer de map met de bestanden van de website naar de `htdocs`-map van XAMPP.
   - Standaardlocatie op Windows: `C:\xampp\htdocs\ps5-reviews`

3. **Database instellen**
   - Open je browser en ga naar `http://localhost/phpmyadmin/`.
   - Maak een nieuwe database aan, bijvoorbeeld 'reviewsite'.
   - Importeer het bestand `import.sql` uit de projectmap om de database en tabellen aan te maken.

4. **Configuratie controleren**
   - Controleer het bestand `db.php` en zorg ervoor dat de databaseverbinding correct is ingesteld:
     ```php
      $host = 'localhost';
      $dbname = 'reviewsite';
      $username = 'bit_academy';
      $password = 'bit_academy'; 
     ```

5. **Start de website**
   - Open je browser en ga naar `http://localhost/ps5-reviews/`.

## Functies
Op onze site kun je jouw favoriete PS5-games beoordelen en ontdekken wat anderen ervan vinden. Log in, deel je mening en geef jouw favoriete games een score. Jouw naam komt bij elke review te staan, zodat iedereen kan zien welke titels jij aanbeveelt.


## Problemen oplossen
- **Apache of MySQL start niet?**
  - Controleer of er geen andere programma’s (zoals Skype of IIS) poort 80/443 blokkeren.
- **Databasefout?**
  - Controleer of de database is geïmporteerd en de juiste naam heeft in `config.php`.
- **Pagina niet gevonden?**
  - Zorg ervoor dat de map correct in `htdocs` staat en probeer `http://localhost/ps5-reviews/`.

## Licentie
Dit project is open-source en mag vrij gebruikt en aangepast worden.

---
Veel plezier met het testen van PlayStation 5-games en het delen van je reviews! 🎮
