<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210925131011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add product table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'create table product(
                id uuid
                    constraint product_pk
                        primary key,
                name varchar(255) not null,
                code varchar(10) not null,
                slug varchar(255) not null
            )'
        );

        $this->addSql('create unique index product_code_uindex on product (code);');
    }

    public function down(Schema $schema): void
    {
    }
}
