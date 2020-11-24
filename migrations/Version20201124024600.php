<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124024600 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employer DROP FOREIGN KEY FK_DE4CF0669D86650F');
        $this->addSql('DROP INDEX UNIQ_DE4CF0669D86650F ON employer');
        $this->addSql('ALTER TABLE employer DROP user_id_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employer ADD user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE employer ADD CONSTRAINT FK_DE4CF0669D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DE4CF0669D86650F ON employer (user_id_id)');
    }
}
