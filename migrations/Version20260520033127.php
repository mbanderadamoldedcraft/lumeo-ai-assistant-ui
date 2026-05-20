<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260520033127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, import_tm_file_id BIGINT DEFAULT NULL, is_deleted TINYINT DEFAULT NULL, created_by VARCHAR(50) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_by VARCHAR(50) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, old_sys_id BIGINT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, roles_allowed JSON DEFAULT NULL, types JSON DEFAULT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(180) NOT NULL, last_name VARCHAR(180) NOT NULL, full_name VARCHAR(180) DEFAULT NULL, email VARCHAR(180) DEFAULT NULL, is_active TINYINT DEFAULT NULL, is_access_all_company TINYINT DEFAULT NULL, is_access_all_branch TINYINT DEFAULT NULL, is_access_all_bu TINYINT DEFAULT NULL, is_access_all_division TINYINT DEFAULT NULL, is_access_all_dept TINYINT DEFAULT NULL, is_access_all_dept_unit TINYINT DEFAULT NULL, is_access_all_emp_type TINYINT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
