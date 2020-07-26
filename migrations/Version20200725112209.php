<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200725112209 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE raw_craft (id INT AUTO_INCREMENT NOT NULL, raw_id INT NOT NULL, craft_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_C274B6C63C92D793 (raw_id), INDEX IDX_C274B6C6E836CCC8 (craft_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE raw_craft ADD CONSTRAINT FK_C274B6C63C92D793 FOREIGN KEY (raw_id) REFERENCES raw (id)');
        $this->addSql('ALTER TABLE raw_craft ADD CONSTRAINT FK_C274B6C6E836CCC8 FOREIGN KEY (craft_id) REFERENCES craft (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE raw_craft');
    }
}
