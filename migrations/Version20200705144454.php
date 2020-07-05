<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200705144454 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE craft_raw');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE craft_raw (craft_id INT NOT NULL, raw_id INT NOT NULL, INDEX IDX_E430CF883C92D793 (raw_id), INDEX IDX_E430CF88E836CCC8 (craft_id), PRIMARY KEY(craft_id, raw_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE craft_raw ADD CONSTRAINT FK_E430CF883C92D793 FOREIGN KEY (raw_id) REFERENCES raw (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE craft_raw ADD CONSTRAINT FK_E430CF88E836CCC8 FOREIGN KEY (craft_id) REFERENCES craft (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
