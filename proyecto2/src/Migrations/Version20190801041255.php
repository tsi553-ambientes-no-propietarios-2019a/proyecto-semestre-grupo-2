<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190801041255 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compra CHANGE paquete_id paquete_id INT NOT NULL, CHANGE habitacion_id habitacion_id INT NOT NULL, CHANGE no_asientos no_asientos INT DEFAULT NULL, CHANGE total_asientos total_asientos NUMERIC(10, 2) DEFAULT NULL, CHANGE no_habita no_habita INT DEFAULT NULL, CHANGE total_paquetes total_paquetes NUMERIC(10, 2) DEFAULT NULL, CHANGE no_paquetes no_paquetes INT DEFAULT NULL, CHANGE total_habita total_habita NUMERIC(10, 2) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compra CHANGE paquete_id paquete_id INT DEFAULT NULL, CHANGE habitacion_id habitacion_id INT DEFAULT NULL, CHANGE no_asientos no_asientos INT NOT NULL, CHANGE total_asientos total_asientos NUMERIC(10, 2) NOT NULL, CHANGE no_habita no_habita INT NOT NULL, CHANGE total_paquetes total_paquetes NUMERIC(10, 2) NOT NULL, CHANGE no_paquetes no_paquetes INT NOT NULL, CHANGE total_habita total_habita NUMERIC(10, 2) NOT NULL');
    }
}
