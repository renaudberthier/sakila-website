<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261020123526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE film_actor DROP FOREIGN KEY `fk_film_actor_actor`');
        $this->addSql('ALTER TABLE film_actor DROP FOREIGN KEY `fk_film_actor_film`');
        $this->addSql('ALTER TABLE film_actor DROP last_update');
        $this->addSql('ALTER TABLE film_actor ADD CONSTRAINT FK_DD19A8A910DAF24A FOREIGN KEY (actor_id) REFERENCES actor (actor_id)');
        $this->addSql('ALTER TABLE film_actor ADD CONSTRAINT FK_DD19A8A9567F5183 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE film_actor RENAME INDEX idx_fk_film_id TO IDX_DD19A8A9567F5183');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY `fk_address_city`');
        $this->addSql('ALTER TABLE address ADD location GEOMETRY NOT NULL, CHANGE city_id city_id SMALLINT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F818BAC62AF FOREIGN KEY (city_id) REFERENCES city (city_id)');
        $this->addSql('CREATE INDEX idx_location ON address (location)');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY `fk_city_country`');
        $this->addSql('ALTER TABLE city CHANGE country_id country_id SMALLINT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234F92F3E70 FOREIGN KEY (country_id) REFERENCES country (country_id)');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY `fk_customer_address`');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY `fk_customer_store`');
        $this->addSql('ALTER TABLE customer CHANGE store_id store_id TINYINT DEFAULT NULL, CHANGE address_id address_id SMALLINT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (address_id)');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09B092A811 FOREIGN KEY (store_id) REFERENCES store (store_id)');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY `fk_film_language`');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY `fk_film_language_original`');
        $this->addSql('ALTER TABLE film CHANGE language_id language_id TINYINT DEFAULT NULL, CHANGE rating rating VARCHAR(5) NOT NULL');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE2282F1BAF4 FOREIGN KEY (language_id) REFERENCES language (language_id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE2275FE5ADE FOREIGN KEY (original_language_id) REFERENCES language (language_id)');
        $this->addSql('ALTER TABLE film_category DROP FOREIGN KEY `fk_film_category_category`');
        $this->addSql('ALTER TABLE film_category DROP FOREIGN KEY `fk_film_category_film`');
        $this->addSql('ALTER TABLE film_category DROP last_update');
        $this->addSql('ALTER TABLE film_category ADD CONSTRAINT FK_A4CBD6A8567F5183 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE film_category ADD CONSTRAINT FK_A4CBD6A812469DE2 FOREIGN KEY (category_id) REFERENCES category (category_id)');
        $this->addSql('ALTER TABLE film_category RENAME INDEX fk_film_category_category TO IDX_A4CBD6A812469DE2');
        $this->addSql('ALTER TABLE film_text CHANGE film_id film_id SMALLINT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY `fk_inventory_film`');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY `fk_inventory_store`');
        $this->addSql('ALTER TABLE inventory CHANGE film_id film_id SMALLINT UNSIGNED DEFAULT NULL, CHANGE store_id store_id TINYINT DEFAULT NULL');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT FK_B12D4A36B092A811 FOREIGN KEY (store_id) REFERENCES store (store_id)');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT FK_B12D4A36567F5183 FOREIGN KEY (film_id) REFERENCES film (film_id)');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY `fk_payment_customer`');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY `fk_payment_rental`');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY `fk_payment_staff`');
        $this->addSql('ALTER TABLE payment CHANGE customer_id customer_id SMALLINT UNSIGNED DEFAULT NULL, CHANGE staff_id staff_id TINYINT DEFAULT NULL');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DA7CF2329 FOREIGN KEY (rental_id) REFERENCES rental (rental_id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (customer_id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DD4D57CD FOREIGN KEY (staff_id) REFERENCES staff (staff_id)');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY `fk_rental_customer`');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY `fk_rental_inventory`');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY `fk_rental_staff`');
        $this->addSql('ALTER TABLE rental CHANGE inventory_id inventory_id INT UNSIGNED DEFAULT NULL, CHANGE customer_id customer_id SMALLINT UNSIGNED DEFAULT NULL, CHANGE staff_id staff_id TINYINT DEFAULT NULL');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27DD4D57CD FOREIGN KEY (staff_id) REFERENCES staff (staff_id)');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27D9EEA759 FOREIGN KEY (inventory_id) REFERENCES inventory (inventory_id)');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27D9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (customer_id)');
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY `fk_staff_address`');
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY `fk_staff_store`');
        $this->addSql('ALTER TABLE staff CHANGE address_id address_id SMALLINT UNSIGNED DEFAULT NULL, CHANGE store_id store_id TINYINT DEFAULT NULL, CHANGE password password VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT FK_426EF392B092A811 FOREIGN KEY (store_id) REFERENCES store (store_id)');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT FK_426EF392F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (address_id)');
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY `fk_store_address`');
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY `fk_store_staff`');
        $this->addSql('ALTER TABLE store CHANGE manager_staff_id manager_staff_id TINYINT DEFAULT NULL, CHANGE address_id address_id SMALLINT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT FK_FF575877F9272FA9 FOREIGN KEY (manager_staff_id) REFERENCES staff (staff_id)');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT FK_FF575877F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (address_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F818BAC62AF');
        $this->addSql('DROP INDEX idx_location ON address');
        $this->addSql('ALTER TABLE address DROP location, CHANGE city_id city_id SMALLINT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT `fk_address_city` FOREIGN KEY (city_id) REFERENCES city (city_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234F92F3E70');
        $this->addSql('ALTER TABLE city CHANGE country_id country_id SMALLINT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT `fk_city_country` FOREIGN KEY (country_id) REFERENCES country (country_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09F5B7AF75');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09B092A811');
        $this->addSql('ALTER TABLE customer CHANGE address_id address_id SMALLINT UNSIGNED NOT NULL, CHANGE store_id store_id TINYINT NOT NULL');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT `fk_customer_address` FOREIGN KEY (address_id) REFERENCES address (address_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT `fk_customer_store` FOREIGN KEY (store_id) REFERENCES store (store_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE2282F1BAF4');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE2275FE5ADE');
        $this->addSql('ALTER TABLE film CHANGE rating rating ENUM(\'G\', \'PG\', \'PG-13\', \'R\', \'NC-17\') DEFAULT \'G\', CHANGE language_id language_id TINYINT NOT NULL');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT `fk_film_language` FOREIGN KEY (language_id) REFERENCES language (language_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT `fk_film_language_original` FOREIGN KEY (original_language_id) REFERENCES language (language_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE film_actor DROP FOREIGN KEY FK_DD19A8A910DAF24A');
        $this->addSql('ALTER TABLE film_actor DROP FOREIGN KEY FK_DD19A8A9567F5183');
        $this->addSql('ALTER TABLE film_actor ADD last_update DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE film_actor ADD CONSTRAINT `fk_film_actor_actor` FOREIGN KEY (actor_id) REFERENCES actor (actor_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE film_actor ADD CONSTRAINT `fk_film_actor_film` FOREIGN KEY (film_id) REFERENCES film (film_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE film_actor RENAME INDEX idx_dd19a8a9567f5183 TO idx_fk_film_id');
        $this->addSql('ALTER TABLE film_category DROP FOREIGN KEY FK_A4CBD6A8567F5183');
        $this->addSql('ALTER TABLE film_category DROP FOREIGN KEY FK_A4CBD6A812469DE2');
        $this->addSql('ALTER TABLE film_category ADD last_update DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE film_category ADD CONSTRAINT `fk_film_category_category` FOREIGN KEY (category_id) REFERENCES category (category_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE film_category ADD CONSTRAINT `fk_film_category_film` FOREIGN KEY (film_id) REFERENCES film (film_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE film_category RENAME INDEX idx_a4cbd6a812469de2 TO fk_film_category_category');
        $this->addSql('ALTER TABLE film_text CHANGE film_id film_id SMALLINT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY FK_B12D4A36B092A811');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY FK_B12D4A36567F5183');
        $this->addSql('ALTER TABLE inventory CHANGE store_id store_id TINYINT NOT NULL, CHANGE film_id film_id SMALLINT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT `fk_inventory_film` FOREIGN KEY (film_id) REFERENCES film (film_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT `fk_inventory_store` FOREIGN KEY (store_id) REFERENCES store (store_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DA7CF2329');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D9395C3F3');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DD4D57CD');
        $this->addSql('ALTER TABLE payment CHANGE customer_id customer_id SMALLINT UNSIGNED NOT NULL, CHANGE staff_id staff_id TINYINT NOT NULL');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT `fk_payment_customer` FOREIGN KEY (customer_id) REFERENCES customer (customer_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT `fk_payment_rental` FOREIGN KEY (rental_id) REFERENCES rental (rental_id) ON UPDATE CASCADE ON DELETE SET NULL');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT `fk_payment_staff` FOREIGN KEY (staff_id) REFERENCES staff (staff_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27DD4D57CD');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27D9EEA759');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27D9395C3F3');
        $this->addSql('ALTER TABLE rental CHANGE staff_id staff_id TINYINT NOT NULL, CHANGE inventory_id inventory_id INT UNSIGNED NOT NULL, CHANGE customer_id customer_id SMALLINT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT `fk_rental_customer` FOREIGN KEY (customer_id) REFERENCES customer (customer_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT `fk_rental_inventory` FOREIGN KEY (inventory_id) REFERENCES inventory (inventory_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT `fk_rental_staff` FOREIGN KEY (staff_id) REFERENCES staff (staff_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY FK_426EF392B092A811');
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY FK_426EF392F5B7AF75');
        $this->addSql('ALTER TABLE staff CHANGE password password VARCHAR(40) DEFAULT NULL COLLATE `utf8mb4_bin`, CHANGE store_id store_id TINYINT NOT NULL, CHANGE address_id address_id SMALLINT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT `fk_staff_address` FOREIGN KEY (address_id) REFERENCES address (address_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT `fk_staff_store` FOREIGN KEY (store_id) REFERENCES store (store_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY FK_FF575877F9272FA9');
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY FK_FF575877F5B7AF75');
        $this->addSql('ALTER TABLE store CHANGE manager_staff_id manager_staff_id TINYINT NOT NULL, CHANGE address_id address_id SMALLINT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT `fk_store_address` FOREIGN KEY (address_id) REFERENCES address (address_id) ON UPDATE CASCADE');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT `fk_store_staff` FOREIGN KEY (manager_staff_id) REFERENCES staff (staff_id) ON UPDATE CASCADE');
    }
}
