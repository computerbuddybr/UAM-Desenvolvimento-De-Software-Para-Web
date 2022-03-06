CREATE DATABASE loja;
CREATE TABLE `loja`.`produtos`
(
    `id`          INT NOT NULL AUTO_INCREMENT,
    `nomeProduto` VARCHAR(100) NULL,
    `descricao`   VARCHAR(255) NULL,
    `valor`       NUMERIC(10,2) NULL,
    `fornecedor`  VARCHAR(100) NULL,
    PRIMARY KEY (`id`)
);