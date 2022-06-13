<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613142414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE menu_products');
        $this->addSql('ALTER TABLE bar ADD adress VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_products (menu_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_9FEB1FCC6C8A81A9 (products_id), INDEX IDX_9FEB1FCCCCD7E912 (menu_id), PRIMARY KEY(menu_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE menu_products ADD CONSTRAINT FK_9FEB1FCC6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_products ADD CONSTRAINT FK_9FEB1FCCCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bar DROP adress');
    }
}
