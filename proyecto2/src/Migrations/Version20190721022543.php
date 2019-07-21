<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190721022543 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aff_company ADD terminal_id INT NOT NULL');
        $this->addSql('ALTER TABLE aff_company ADD CONSTRAINT FK_57884356E77B6CE8 FOREIGN KEY (terminal_id) REFERENCES terminal (id)');
        $this->addSql('CREATE INDEX IDX_57884356E77B6CE8 ON aff_company (terminal_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aff_company DROP FOREIGN KEY FK_57884356E77B6CE8');
        $this->addSql('DROP INDEX IDX_57884356E77B6CE8 ON aff_company');
        $this->addSql('ALTER TABLE aff_company DROP terminal_id');
    }
}
