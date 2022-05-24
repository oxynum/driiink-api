<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220524093934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion ADD menu_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD active_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD deactivate_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD expiration_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_C11D7DD1CCD7E912 ON promotion (menu_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1CCD7E912');
        $this->addSql('DROP INDEX IDX_C11D7DD1CCD7E912 ON promotion');
        $this->addSql('ALTER TABLE promotion DROP menu_id, DROP created_at, DROP updated_at, DROP active_at, DROP deactivate_at, DROP expiration_date');
    }
}
