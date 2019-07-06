<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190706051328 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE weather_con (id INT AUTO_INCREMENT NOT NULL, idcon INT NOT NULL, id_place INT NOT NULL, temperature DOUBLE PRECISION NOT NULL, preasure DOUBLE PRECISION NOT NULL, status VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bus (id INT AUTO_INCREMENT NOT NULL, num_bus_id INT NOT NULL, id_place_id INT NOT NULL, id_enterprise INT NOT NULL, driver_name VARCHAR(50) NOT NULL, seat_num INT NOT NULL, bus_type VARCHAR(50) NOT NULL, INDEX IDX_2F566B699C6724A5 (num_bus_id), UNIQUE INDEX UNIQ_2F566B695D7D4E8C (id_place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B699C6724A5 FOREIGN KEY (num_bus_id) REFERENCES weather_con (id)');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B695D7D4E8C FOREIGN KEY (id_place_id) REFERENCES weather_con (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B699C6724A5');
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B695D7D4E8C');
        $this->addSql('DROP TABLE weather_con');
        $this->addSql('DROP TABLE bus');
    }
}
