<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220516105528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bar (id INT AUTO_INCREMENT NOT NULL, groupe_id INT DEFAULT NULL, customers_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_76FF8CAA7A45358C (groupe_id), INDEX IDX_76FF8CAAC3568B40 (customers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE barman (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_77977D2E7927C74 (email), UNIQUE INDEX UNIQ_77977D2444F97DD (phone), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE barman_bar (barman_id INT NOT NULL, bar_id INT NOT NULL, INDEX IDX_86EECD8BA1EB02C0 (barman_id), INDEX IDX_86EECD8B89A253A (bar_id), PRIMARY KEY(barman_id, bar_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customers (id INT AUTO_INCREMENT NOT NULL, phone VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_62534E21444F97DD (phone), UNIQUE INDEX UNIQ_62534E21E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, bar_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, active_until TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7D053A9389A253A (bar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_products (menu_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_9FEB1FCCCCD7E912 (menu_id), INDEX IDX_9FEB1FCC6C8A81A9 (products_id), PRIMARY KEY(menu_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, customer_id INT NOT NULL, INDEX IDX_F52993986BF700BD (status_id), INDEX IDX_F52993989395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_products (order_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_5242B8EB8D9F6D38 (order_id), INDEX IDX_5242B8EB6C8A81A9 (products_id), PRIMARY KEY(order_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, prep_time TIME NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_ingredient (products_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_B9F0806E6C8A81A9 (products_id), INDEX IDX_B9F0806E933FE08C (ingredient_id), PRIMARY KEY(products_id, ingredient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAA7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAAC3568B40 FOREIGN KEY (customers_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE barman_bar ADD CONSTRAINT FK_86EECD8BA1EB02C0 FOREIGN KEY (barman_id) REFERENCES barman (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE barman_bar ADD CONSTRAINT FK_86EECD8B89A253A FOREIGN KEY (bar_id) REFERENCES bar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A9389A253A FOREIGN KEY (bar_id) REFERENCES bar (id)');
        $this->addSql('ALTER TABLE menu_products ADD CONSTRAINT FK_9FEB1FCCCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_products ADD CONSTRAINT FK_9FEB1FCC6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993986BF700BD FOREIGN KEY (status_id) REFERENCES order_status (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_ingredient ADD CONSTRAINT FK_B9F0806E6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_ingredient ADD CONSTRAINT FK_B9F0806E933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE barman_bar DROP FOREIGN KEY FK_86EECD8B89A253A');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A9389A253A');
        $this->addSql('ALTER TABLE barman_bar DROP FOREIGN KEY FK_86EECD8BA1EB02C0');
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_76FF8CAAC3568B40');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989395C3F3');
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_76FF8CAA7A45358C');
        $this->addSql('ALTER TABLE products_ingredient DROP FOREIGN KEY FK_B9F0806E933FE08C');
        $this->addSql('ALTER TABLE menu_products DROP FOREIGN KEY FK_9FEB1FCCCCD7E912');
        $this->addSql('ALTER TABLE order_products DROP FOREIGN KEY FK_5242B8EB8D9F6D38');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993986BF700BD');
        $this->addSql('ALTER TABLE menu_products DROP FOREIGN KEY FK_9FEB1FCC6C8A81A9');
        $this->addSql('ALTER TABLE order_products DROP FOREIGN KEY FK_5242B8EB6C8A81A9');
        $this->addSql('ALTER TABLE products_ingredient DROP FOREIGN KEY FK_B9F0806E6C8A81A9');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE bar');
        $this->addSql('DROP TABLE barman');
        $this->addSql('DROP TABLE barman_bar');
        $this->addSql('DROP TABLE customers');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_products');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_products');
        $this->addSql('DROP TABLE order_status');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE products_ingredient');
    }
}
