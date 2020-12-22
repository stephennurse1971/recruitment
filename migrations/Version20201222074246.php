<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201222074246 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE candidates_category');
        $this->addSql('DROP TABLE candidates_resort');
        $this->addSql('ALTER TABLE candidates DROP FOREIGN KEY FK_6A77F80CA76ED395');
        $this->addSql('DROP INDEX UNIQ_6A77F80CA76ED395 ON candidates');
        $this->addSql('ALTER TABLE candidates ADD email VARCHAR(255) NOT NULL, DROP user_id');
        $this->addSql('ALTER TABLE category ADD candidates_id INT DEFAULT NULL, ADD catgory_candidate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C17D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C13B7B3A1A FOREIGN KEY (catgory_candidate_id) REFERENCES candidates (id)');
        $this->addSql('CREATE INDEX IDX_64C19C17D5FB314 ON category (candidates_id)');
        $this->addSql('CREATE INDEX IDX_64C19C13B7B3A1A ON category (catgory_candidate_id)');
        $this->addSql('ALTER TABLE country ADD candidates_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C9667D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('CREATE INDEX IDX_5373C9667D5FB314 ON country (candidates_id)');
        $this->addSql('ALTER TABLE employer DROP FOREIGN KEY FK_DE4CF066A76ED395');
        $this->addSql('DROP INDEX IDX_DE4CF066A76ED395 ON employer');
        $this->addSql('ALTER TABLE employer ADD password VARCHAR(255) NOT NULL, DROP user_id, CHANGE contact_name email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE resort ADD candidates_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resort ADD CONSTRAINT FK_D69AD86A7D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('CREATE INDEX IDX_D69AD86A7D5FB314 ON resort (candidates_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidates_category (candidates_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_629662D37D5FB314 (candidates_id), INDEX IDX_629662D312469DE2 (category_id), PRIMARY KEY(candidates_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE candidates_resort (candidates_id INT NOT NULL, resort_id INT NOT NULL, INDEX IDX_EA1E5517D5FB314 (candidates_id), INDEX IDX_EA1E5517A3ABE5D (resort_id), PRIMARY KEY(candidates_id, resort_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE candidates_category ADD CONSTRAINT FK_629662D312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidates_category ADD CONSTRAINT FK_629662D37D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidates_resort ADD CONSTRAINT FK_EA1E5517A3ABE5D FOREIGN KEY (resort_id) REFERENCES resort (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidates_resort ADD CONSTRAINT FK_EA1E5517D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidates ADD user_id INT NOT NULL, DROP email');
        $this->addSql('ALTER TABLE candidates ADD CONSTRAINT FK_6A77F80CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6A77F80CA76ED395 ON candidates (user_id)');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C17D5FB314');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C13B7B3A1A');
        $this->addSql('DROP INDEX IDX_64C19C17D5FB314 ON category');
        $this->addSql('DROP INDEX IDX_64C19C13B7B3A1A ON category');
        $this->addSql('ALTER TABLE category DROP candidates_id, DROP catgory_candidate_id');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C9667D5FB314');
        $this->addSql('DROP INDEX IDX_5373C9667D5FB314 ON country');
        $this->addSql('ALTER TABLE country DROP candidates_id');
        $this->addSql('ALTER TABLE employer ADD user_id INT NOT NULL, ADD contact_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP email, DROP password');
        $this->addSql('ALTER TABLE employer ADD CONSTRAINT FK_DE4CF066A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_DE4CF066A76ED395 ON employer (user_id)');
        $this->addSql('ALTER TABLE resort DROP FOREIGN KEY FK_D69AD86A7D5FB314');
        $this->addSql('DROP INDEX IDX_D69AD86A7D5FB314 ON resort');
        $this->addSql('ALTER TABLE resort DROP candidates_id');
    }
}
