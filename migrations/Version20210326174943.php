<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210326174943 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE scheduled_command (id INT AUTO_INCREMENT NOT NULL, version INT DEFAULT 1 NOT NULL, created_at DATETIME DEFAULT NULL, name VARCHAR(150) NOT NULL, command VARCHAR(200) NOT NULL, arguments LONGTEXT DEFAULT NULL, cron_expression VARCHAR(200) DEFAULT NULL, last_execution DATETIME DEFAULT NULL, last_return_code INT DEFAULT NULL, log_file VARCHAR(150) DEFAULT NULL, priority INT NOT NULL, execute_immediately TINYINT(1) NOT NULL, disabled TINYINT(1) NOT NULL, locked TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_EA0DBC905E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE scheduled_command');
    }
}
