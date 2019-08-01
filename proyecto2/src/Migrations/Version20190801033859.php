<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190801033859 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE province (id INT AUTO_INCREMENT NOT NULL, prov_cod INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitaciones (id INT AUTO_INCREMENT NOT NULL, hotel_id INT DEFAULT NULL, type_room VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, no_beds INT NOT NULL, INDEX IDX_E10783B3243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bus (id INT AUTO_INCREMENT NOT NULL, aff_company_id INT NOT NULL, num_bus INT NOT NULL, driver_name VARCHAR(255) DEFAULT NULL, seat_num INT NOT NULL, bus_type VARCHAR(255) NOT NULL, INDEX IDX_2F566B69364780B1 (aff_company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aff_company (id INT AUTO_INCREMENT NOT NULL, terminal_id INT NOT NULL, name_company VARCHAR(255) NOT NULL, email_company VARCHAR(255) NOT NULL, company_phone BIGINT DEFAULT NULL, INDEX IDX_57884356E77B6CE8 (terminal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paquetes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, extras VARCHAR(255) NOT NULL, price NUMERIC(10, 2) NOT NULL, duration VARCHAR(255) NOT NULL, date DATE NOT NULL, updated_at DATETIME NOT NULL, image_name VARCHAR(255) DEFAULT NULL, image_original_name VARCHAR(255) DEFAULT NULL, image_mime_type VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, image_dimensions LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', phone VARCHAR(255) DEFAULT NULL, birth_date DATE DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D64992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_8D93D649A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_8D93D649C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, bus_id INT NOT NULL, origin_city_id INT DEFAULT NULL, destiny_city_id INT DEFAULT NULL, day VARCHAR(50) NOT NULL, hour TIME NOT NULL, INDEX IDX_5A3811FB2546731D (bus_id), INDEX IDX_5A3811FB3EDB77C2 (origin_city_id), INDEX IDX_5A3811FB15ECDDA9 (destiny_city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE asiento (id INT AUTO_INCREMENT NOT NULL, bus_id INT NOT NULL, num_asiento INT NOT NULL, tipo_asiento VARCHAR(255) NOT NULL, disp_asiento VARCHAR(50) NOT NULL, INDEX IDX_71D6D35C2546731D (bus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email LONGTEXT NOT NULL, web_site LONGTEXT NOT NULL, no_rooms INT NOT NULL, INDEX IDX_3535ED98BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE places (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, place_name VARCHAR(255) NOT NULL, longitud DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, INDEX IDX_FEAF6C558BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compra (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, paquete_id INT DEFAULT NULL, habitacion_id INT DEFAULT NULL, fecha_com DATETIME NOT NULL, no_asientos INT NOT NULL, total_asientos NUMERIC(10, 2) NOT NULL, no_habita INT NOT NULL, total_paquetes NUMERIC(10, 2) NOT NULL, no_paquetes INT NOT NULL, total_habita NUMERIC(10, 2) NOT NULL, total_compra NUMERIC(10, 2) NOT NULL, INDEX IDX_9EC131FFA76ED395 (user_id), INDEX IDX_9EC131FF41E2D57E (paquete_id), INDEX IDX_9EC131FFB009290D (habitacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terminal (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, name VARCHAR(255) NOT NULL, longitud DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, INDEX IDX_8F7B15418BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, province_id INT NOT NULL, city_cod INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2D5B0234E946114A (province_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE habitaciones ADD CONSTRAINT FK_E10783B3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B69364780B1 FOREIGN KEY (aff_company_id) REFERENCES aff_company (id)');
        $this->addSql('ALTER TABLE aff_company ADD CONSTRAINT FK_57884356E77B6CE8 FOREIGN KEY (terminal_id) REFERENCES terminal (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB2546731D FOREIGN KEY (bus_id) REFERENCES bus (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB3EDB77C2 FOREIGN KEY (origin_city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB15ECDDA9 FOREIGN KEY (destiny_city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE asiento ADD CONSTRAINT FK_71D6D35C2546731D FOREIGN KEY (bus_id) REFERENCES bus (id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED98BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE places ADD CONSTRAINT FK_FEAF6C558BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE compra ADD CONSTRAINT FK_9EC131FFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE compra ADD CONSTRAINT FK_9EC131FF41E2D57E FOREIGN KEY (paquete_id) REFERENCES paquetes (id)');
        $this->addSql('ALTER TABLE compra ADD CONSTRAINT FK_9EC131FFB009290D FOREIGN KEY (habitacion_id) REFERENCES habitaciones (id)');
        $this->addSql('ALTER TABLE terminal ADD CONSTRAINT FK_8F7B15418BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234E946114A FOREIGN KEY (province_id) REFERENCES province (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234E946114A');
        $this->addSql('ALTER TABLE compra DROP FOREIGN KEY FK_9EC131FFB009290D');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB2546731D');
        $this->addSql('ALTER TABLE asiento DROP FOREIGN KEY FK_71D6D35C2546731D');
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B69364780B1');
        $this->addSql('ALTER TABLE compra DROP FOREIGN KEY FK_9EC131FF41E2D57E');
        $this->addSql('ALTER TABLE compra DROP FOREIGN KEY FK_9EC131FFA76ED395');
        $this->addSql('ALTER TABLE habitaciones DROP FOREIGN KEY FK_E10783B3243BB18');
        $this->addSql('ALTER TABLE aff_company DROP FOREIGN KEY FK_57884356E77B6CE8');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB3EDB77C2');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB15ECDDA9');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED98BAC62AF');
        $this->addSql('ALTER TABLE places DROP FOREIGN KEY FK_FEAF6C558BAC62AF');
        $this->addSql('ALTER TABLE terminal DROP FOREIGN KEY FK_8F7B15418BAC62AF');
        $this->addSql('DROP TABLE province');
        $this->addSql('DROP TABLE habitaciones');
        $this->addSql('DROP TABLE bus');
        $this->addSql('DROP TABLE aff_company');
        $this->addSql('DROP TABLE paquetes');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE schedule');
        $this->addSql('DROP TABLE asiento');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE places');
        $this->addSql('DROP TABLE compra');
        $this->addSql('DROP TABLE terminal');
        $this->addSql('DROP TABLE city');
    }
}
