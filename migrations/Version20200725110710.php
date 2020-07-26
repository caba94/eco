<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200725110710 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE craft DROP FOREIGN KEY FK_F45C4A84155FB531');
        $this->addSql('ALTER TABLE craft DROP FOREIGN KEY FK_F45C4A84ADE3D254');
        $this->addSql('ALTER TABLE craft DROP FOREIGN KEY FK_F45C4A84BF567DBA');
        $this->addSql('DROP INDEX IDX_F45C4A84155FB531 ON craft');
        $this->addSql('DROP INDEX IDX_F45C4A84ADE3D254 ON craft');
        $this->addSql('DROP INDEX IDX_F45C4A84BF567DBA ON craft');
        $this->addSql('ALTER TABLE craft DROP raw1_id, DROP raw2_id, DROP raw3_id, DROP qraw1, DROP qraw2, DROP qraw3');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE craft ADD raw1_id INT DEFAULT NULL, ADD raw2_id INT DEFAULT NULL, ADD raw3_id INT DEFAULT NULL, ADD qraw1 INT DEFAULT NULL, ADD qraw2 INT DEFAULT NULL, ADD qraw3 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE craft ADD CONSTRAINT FK_F45C4A84155FB531 FOREIGN KEY (raw3_id) REFERENCES raw (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE craft ADD CONSTRAINT FK_F45C4A84ADE3D254 FOREIGN KEY (raw2_id) REFERENCES raw (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE craft ADD CONSTRAINT FK_F45C4A84BF567DBA FOREIGN KEY (raw1_id) REFERENCES raw (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F45C4A84155FB531 ON craft (raw3_id)');
        $this->addSql('CREATE INDEX IDX_F45C4A84ADE3D254 ON craft (raw2_id)');
        $this->addSql('CREATE INDEX IDX_F45C4A84BF567DBA ON craft (raw1_id)');
    }
}
