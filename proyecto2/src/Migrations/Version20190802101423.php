<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190802101423 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aff_company CHANGE company_phone company_phone BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE bus CHANGE driver_name driver_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE compra CHANGE paquete_id paquete_id INT DEFAULT NULL, CHANGE habitacion_id habitacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE habitaciones CHANGE hotel_id hotel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hotel ADD category INT DEFAULT NULL, ADD price NUMERIC(10, 2) NOT NULL, ADD image_name VARCHAR(255) NOT NULL, ADD image_size INT NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE paquetes ADD updated_at DATETIME NOT NULL, ADD image_name VARCHAR(255) DEFAULT NULL, ADD image_original_name VARCHAR(255) DEFAULT NULL, ADD image_mime_type VARCHAR(255) DEFAULT NULL, ADD image_size INT DEFAULT NULL, ADD image_dimensions LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\'');
        $this->addSql('ALTER TABLE schedule CHANGE origin_city_id origin_city_id INT DEFAULT NULL, CHANGE destiny_city_id destiny_city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL, CHANGE birth_date birth_date DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aff_company CHANGE company_phone company_phone BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE bus CHANGE driver_name driver_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE compra CHANGE paquete_id paquete_id INT DEFAULT NULL, CHANGE habitacion_id habitacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE habitaciones CHANGE hotel_id hotel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hotel DROP category, DROP price, DROP image_name, DROP image_size, DROP updated_at');
        $this->addSql('ALTER TABLE paquetes DROP updated_at, DROP image_name, DROP image_original_name, DROP image_mime_type, DROP image_size, DROP image_dimensions');
        $this->addSql('ALTER TABLE schedule CHANGE origin_city_id origin_city_id INT DEFAULT NULL, CHANGE destiny_city_id destiny_city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\', CHANGE phone phone VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE birth_date birth_date DATE DEFAULT \'NULL\'');
    }
}
