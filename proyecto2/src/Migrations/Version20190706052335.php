<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190706052335 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE has (id INT AUTO_INCREMENT NOT NULL, id_buy INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B699C6724A5 FOREIGN KEY (num_bus_id) REFERENCES weather_con (id)');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B695D7D4E8C FOREIGN KEY (id_place_id) REFERENCES weather_con (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE has');
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B699C6724A5');
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B695D7D4E8C');
    }
}
