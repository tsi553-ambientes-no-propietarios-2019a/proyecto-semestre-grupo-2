<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190801153327 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, bus_id INT NOT NULL, origin_city_id INT DEFAULT NULL, destiny_city_id INT DEFAULT NULL, day VARCHAR(50) NOT NULL, hour TIME NOT NULL, INDEX IDX_5A3811FB2546731D (bus_id), INDEX IDX_5A3811FB3EDB77C2 (origin_city_id), INDEX IDX_5A3811FB15ECDDA9 (destiny_city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB2546731D FOREIGN KEY (bus_id) REFERENCES bus (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB3EDB77C2 FOREIGN KEY (origin_city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB15ECDDA9 FOREIGN KEY (destiny_city_id) REFERENCES city (id)');
        $this->addSql('DROP TABLE bus_places');
        $this->addSql('DROP TABLE compra_asiento');
        $this->addSql('DROP TABLE paquetes_places');
        $this->addSql('ALTER TABLE aff_company CHANGE company_phone company_phone BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE asiento ADD disp_asiento VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE bus CHANGE driver_name driver_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE compra CHANGE paquete_id paquete_id INT DEFAULT NULL, CHANGE habitacion_id habitacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE habitaciones CHANGE hotel_id hotel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hotel ADD category INT DEFAULT NULL, ADD price NUMERIC(10, 2) NOT NULL, ADD image_name VARCHAR(255) NOT NULL, ADD image_size INT NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE paquetes ADD extras VARCHAR(255) NOT NULL, ADD price NUMERIC(10, 2) NOT NULL, ADD duration VARCHAR(255) NOT NULL, ADD date DATE NOT NULL, ADD updated_at DATETIME NOT NULL, ADD image_name VARCHAR(255) DEFAULT NULL, ADD image_original_name VARCHAR(255) DEFAULT NULL, ADD image_mime_type VARCHAR(255) DEFAULT NULL, ADD image_size INT DEFAULT NULL, ADD image_dimensions LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', DROP no_days');
        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL, CHANGE birth_date birth_date DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bus_places (bus_id INT NOT NULL, places_id INT NOT NULL, INDEX IDX_3483F87A8317B347 (places_id), INDEX IDX_3483F87A2546731D (bus_id), PRIMARY KEY(bus_id, places_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE compra_asiento (compra_id INT NOT NULL, asiento_id INT NOT NULL, INDEX IDX_9943CE41C642F3A8 (asiento_id), INDEX IDX_9943CE41F2E704D7 (compra_id), PRIMARY KEY(compra_id, asiento_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE paquetes_places (paquetes_id INT NOT NULL, places_id INT NOT NULL, INDEX IDX_6B2CFD598317B347 (places_id), INDEX IDX_6B2CFD59508D03CB (paquetes_id), PRIMARY KEY(paquetes_id, places_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bus_places ADD CONSTRAINT FK_3483F87A2546731D FOREIGN KEY (bus_id) REFERENCES bus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bus_places ADD CONSTRAINT FK_3483F87A8317B347 FOREIGN KEY (places_id) REFERENCES places (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compra_asiento ADD CONSTRAINT FK_9943CE41C642F3A8 FOREIGN KEY (asiento_id) REFERENCES asiento (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compra_asiento ADD CONSTRAINT FK_9943CE41F2E704D7 FOREIGN KEY (compra_id) REFERENCES compra (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paquetes_places ADD CONSTRAINT FK_6B2CFD59508D03CB FOREIGN KEY (paquetes_id) REFERENCES paquetes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paquetes_places ADD CONSTRAINT FK_6B2CFD598317B347 FOREIGN KEY (places_id) REFERENCES places (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE schedule');
        $this->addSql('ALTER TABLE aff_company CHANGE company_phone company_phone BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE asiento DROP disp_asiento');
        $this->addSql('ALTER TABLE bus CHANGE driver_name driver_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE compra CHANGE paquete_id paquete_id INT DEFAULT NULL, CHANGE habitacion_id habitacion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE habitaciones CHANGE hotel_id hotel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hotel DROP category, DROP price, DROP image_name, DROP image_size, DROP updated_at');
        $this->addSql('ALTER TABLE paquetes ADD no_days INT NOT NULL, DROP extras, DROP price, DROP duration, DROP date, DROP updated_at, DROP image_name, DROP image_original_name, DROP image_mime_type, DROP image_size, DROP image_dimensions');
        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\', CHANGE phone phone VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE birth_date birth_date DATE DEFAULT \'NULL\'');
    }
}
