<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190729184148 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE schedule ADD origin_city_id INT DEFAULT NULL, ADD destiny_city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB3EDB77C2 FOREIGN KEY (origin_city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB15ECDDA9 FOREIGN KEY (destiny_city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_5A3811FB3EDB77C2 ON schedule (origin_city_id)');
        $this->addSql('CREATE INDEX IDX_5A3811FB15ECDDA9 ON schedule (destiny_city_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB3EDB77C2');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB15ECDDA9');
        $this->addSql('DROP INDEX IDX_5A3811FB3EDB77C2 ON schedule');
        $this->addSql('DROP INDEX IDX_5A3811FB15ECDDA9 ON schedule');
        $this->addSql('ALTER TABLE schedule DROP origin_city_id, DROP destiny_city_id');
    }
}
