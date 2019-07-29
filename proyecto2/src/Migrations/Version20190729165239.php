<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190729165239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE compra_asiento');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE compra_asiento (compra_id INT NOT NULL, asiento_id INT NOT NULL, INDEX IDX_9943CE41F2E704D7 (compra_id), INDEX IDX_9943CE41C642F3A8 (asiento_id), PRIMARY KEY(compra_id, asiento_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE compra_asiento ADD CONSTRAINT FK_9943CE41C642F3A8 FOREIGN KEY (asiento_id) REFERENCES asiento (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compra_asiento ADD CONSTRAINT FK_9943CE41F2E704D7 FOREIGN KEY (compra_id) REFERENCES compra (id) ON DELETE CASCADE');
    }
}
