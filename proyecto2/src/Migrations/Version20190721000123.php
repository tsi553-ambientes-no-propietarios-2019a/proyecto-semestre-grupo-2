<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190721000123 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE places (id INT AUTO_INCREMENT NOT NULL, place_name VARCHAR(255) NOT NULL, longitud DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bus_places (bus_id INT NOT NULL, places_id INT NOT NULL, INDEX IDX_3483F87A2546731D (bus_id), INDEX IDX_3483F87A8317B347 (places_id), PRIMARY KEY(bus_id, places_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aff_company (id INT AUTO_INCREMENT NOT NULL, name_company VARCHAR(255) NOT NULL, email_company VARCHAR(255) NOT NULL, company_phone BIGINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bus_places ADD CONSTRAINT FK_3483F87A2546731D FOREIGN KEY (bus_id) REFERENCES bus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bus_places ADD CONSTRAINT FK_3483F87A8317B347 FOREIGN KEY (places_id) REFERENCES places (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bus ADD aff_company_id INT NOT NULL, ADD num_bus INT NOT NULL, ADD driver_name VARCHAR(255) DEFAULT NULL, ADD seat_num INT NOT NULL, ADD bus_type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B69364780B1 FOREIGN KEY (aff_company_id) REFERENCES aff_company (id)');
        $this->addSql('CREATE INDEX IDX_2F566B69364780B1 ON bus (aff_company_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bus_places DROP FOREIGN KEY FK_3483F87A8317B347');
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B69364780B1');
        $this->addSql('DROP TABLE places');
        $this->addSql('DROP TABLE bus_places');
        $this->addSql('DROP TABLE aff_company');
        $this->addSql('DROP INDEX IDX_2F566B69364780B1 ON bus');
        $this->addSql('ALTER TABLE bus DROP aff_company_id, DROP num_bus, DROP driver_name, DROP seat_num, DROP bus_type');
    }
}
