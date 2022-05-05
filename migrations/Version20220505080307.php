<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220505080307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin CHANGE pictures pictures VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bar CHANGE picture picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE customers CHANGE pictures pictures VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_62534E215126AC48 ON customers (mail)');
        $this->addSql('ALTER TABLE groupe CHANGE picture picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient CHANGE picture picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE products CHANGE picture picture VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin CHANGE pictures pictures VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE bar CHANGE picture picture VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_62534E215126AC48 ON customers');
        $this->addSql('ALTER TABLE customers CHANGE pictures pictures VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE groupe CHANGE picture picture VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ingredient CHANGE picture picture VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE products CHANGE picture picture VARCHAR(255) NOT NULL');
    }
}
