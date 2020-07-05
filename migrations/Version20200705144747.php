<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200705144747 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE craft ADD raw1_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE craft ADD CONSTRAINT FK_F45C4A84BF567DBA FOREIGN KEY (raw1_id) REFERENCES raw (id)');
        $this->addSql('CREATE INDEX IDX_F45C4A84BF567DBA ON craft (raw1_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE craft DROP FOREIGN KEY FK_F45C4A84BF567DBA');
        $this->addSql('DROP INDEX IDX_F45C4A84BF567DBA ON craft');
        $this->addSql('ALTER TABLE craft DROP raw1_id');
    }
}
