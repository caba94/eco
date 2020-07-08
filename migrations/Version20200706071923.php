<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200706071923 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE craft (id INT AUTO_INCREMENT NOT NULL, raw1_id INT DEFAULT NULL, job_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, qraw1 INT DEFAULT NULL, qraw2 INT DEFAULT NULL, qraw3 INT DEFAULT NULL, INDEX IDX_F45C4A84BF567DBA (raw1_id), INDEX IDX_F45C4A84BE04EA9 (job_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, bonus11_name VARCHAR(255) DEFAULT NULL, bonus11_value INT DEFAULT NULL, bonus12_name VARCHAR(255) DEFAULT NULL, bonus12_value INT DEFAULT NULL, bonus21_name VARCHAR(255) DEFAULT NULL, bonus21_value INT DEFAULT NULL, bonus22_name VARCHAR(255) DEFAULT NULL, bonus22_value INT DEFAULT NULL, img VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE raw (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION DEFAULT NULL, img VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE craft ADD CONSTRAINT FK_F45C4A84BF567DBA FOREIGN KEY (raw1_id) REFERENCES raw (id)');
        $this->addSql('ALTER TABLE craft ADD CONSTRAINT FK_F45C4A84BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE craft DROP FOREIGN KEY FK_F45C4A84BE04EA9');
        $this->addSql('ALTER TABLE craft DROP FOREIGN KEY FK_F45C4A84BF567DBA');
        $this->addSql('DROP TABLE craft');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE raw');
    }
}
