-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 13-Nov-2015 às 00:05
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `hollyfood`
--
CREATE DATABASE IF NOT EXISTS `hollyfood` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hollyfood`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bairros`
--

CREATE TABLE IF NOT EXISTS `tb_bairros` (
  `bai_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `bai_nome` varchar(45) NOT NULL,
  `bai_codcidade` int(11) NOT NULL,
  PRIMARY KEY (`bai_codigo`),
  KEY `fk_tb_bairros_copy1_tb_cidades_copy11` (`bai_codcidade`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Extraindo dados da tabela `tb_bairros`
--

INSERT INTO `tb_bairros` (`bai_codigo`, `bai_nome`, `bai_codcidade`) VALUES
(1, 'Água Verde', 1),
(2, 'Badenfurt', 1),
(3, 'Boa Vista', 1),
(4, 'Bom Retiro', 1),
(5, 'Centro', 1),
(6, 'Escola Agrícola', 1),
(7, 'Fidélis', 1),
(8, 'Fortaleza', 1),
(9, 'Fortaleza Alta', 1),
(10, 'Garcia', 1),
(11, 'Glória', 1),
(12, 'Itoupava Central', 1),
(13, 'Itoupava Norte', 1),
(14, 'Itoupava Rega', 1),
(15, 'Itoupava Seca', 1),
(16, 'Itoupavazinha', 1),
(17, 'Jardim', 1),
(18, 'Nova Rússia', 1),
(19, 'Passo Manso', 1),
(20, 'Ponta Aguda', 1),
(21, 'Ribeirão Fresco', 1),
(22, 'Salto', 1),
(23, 'Salto do Norte', 1),
(24, 'Salto Weissbach', 1),
(25, 'Testo Salto', 1),
(26, 'Tribess', 1),
(27, 'Valparaíso', 1),
(28, 'Velha', 1),
(29, 'Velha Central', 1),
(30, 'Velha Grande', 1),
(31, 'Victor Konder', 1),
(32, 'Vila Formosa', 1),
(33, 'Vila Itoupava', 1),
(34, 'Vila Nova', 1),
(35, 'Vorstadt', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categorias`
--

CREATE TABLE IF NOT EXISTS `tb_categorias` (
  `cat_codigo` int(11) NOT NULL,
  `cat_tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`cat_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_categorias`
--

INSERT INTO `tb_categorias` (`cat_codigo`, `cat_tipo`) VALUES
(1, 'Churrascaria'),
(2, 'Coffee House'),
(3, 'Lanchonete'),
(4, 'Pastelaria'),
(5, 'Pizzaria'),
(6, 'Restaurante Alemão'),
(7, 'Restaurante Árabe'),
(8, 'Restaurante Fitness'),
(9, 'Restaurante Italiano'),
(10, 'Restaurante Japonês'),
(11, 'Restaurante Mexicano');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cidades`
--

CREATE TABLE IF NOT EXISTS `tb_cidades` (
  `cid_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cid_nome` varchar(45) NOT NULL,
  `cid_codestado` int(11) NOT NULL,
  PRIMARY KEY (`cid_codigo`),
  KEY `fk_tb_cidades_copy1_tb_estados_copy11` (`cid_codestado`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_cidades`
--

INSERT INTO `tb_cidades` (`cid_codigo`, `cid_nome`, `cid_codestado`) VALUES
(1, 'Blumenau', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `cli_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(45) NOT NULL,
  `cli_codusuario` int(11) NOT NULL,
  PRIMARY KEY (`cli_codigo`),
  KEY `fk_tb_clientes_tb_usuarios1` (`cli_codusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`cli_codigo`, `cli_nome`, `cli_codusuario`) VALUES
(1, 'Cleber Tomazoni', 1),
(2, 'Jaiane', 2),
(3, 'Wemerson', 3),
(21, 'Wemerson Natanael', 26),
(20, 'bbbb', 25),
(19, 'aaaa', 24),
(14, 'Zeca', 18),
(18, 'aaa', 23),
(17, 'Salete', 22),
(22, 'Christian', 53),
(23, 'Sr João', 54),
(24, 'Pedro', 55),
(25, 'Administrador', 56);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentarios`
--

CREATE TABLE IF NOT EXISTS `tb_comentarios` (
  `com_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `com_descricao` varchar(300) NOT NULL,
  `com_data` date NOT NULL,
  `com_codrestaurante` int(11) NOT NULL,
  `com_codcliente` int(11) NOT NULL,
  PRIMARY KEY (`com_codigo`),
  KEY `fk_tb_comentario_tb_restaurantes1_idx` (`com_codrestaurante`),
  KEY `fk_tb_comentario_tb_cliente1_idx` (`com_codcliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`com_codigo`, `com_descricao`, `com_data`, `com_codrestaurante`, `com_codcliente`) VALUES
(1, 'O Restaurante Figueira é excelente.', '2015-11-10', 7, 1),
(2, 'Esse restaurante tem uma vasta gama de comidas exóticas com gostos sensacionais.', '2015-11-10', 25, 1),
(3, 'Legal, restaurante muito bom.', '2015-11-10', 9, 1),
(4, 'A comida do Onkelhaus é deliciosa.', '2015-11-10', 22, 1),
(5, 'Comida típica deliciosa!! APROVADO!!', '2015-11-11', 11, 22),
(6, 'Pastel bom,mas poderiam melhorar o catupiry.', '2015-11-11', 28, 22),
(7, 'A comida é boa,mas o atendimento deixou um pouco a desejar.', '2015-11-11', 8, 22),
(8, 'Os tacos são maravilhosos,e a tequila da promoção coloca pra arrasar.', '2015-11-11', 9, 22),
(9, 'Um bom lugar pra levar a família, os garçons são bastante atenciosos, estabelecimento nota 10.', '2015-11-11', 18, 22),
(10, 'Esse restaurante é uma delícia.', '2015-11-11', 25, 22),
(11, 'Aprovado ', '2015-11-11', 26, 22),
(12, 'Uma das melhores pizzarias em rodízio de blumenau,gostei!!', '2015-11-11', 17, 22),
(13, 'Um DOG do bom !! ', '2015-11-11', 31, 22),
(14, 'Já foi melhor,hoje não é,mas poderia ser.', '2015-11-11', 7, 22),
(15, 'Recomendo muito  uhuuul, vale a pena!!', '2015-11-11', 17, 3),
(16, 'Eu curti!', '2015-11-11', 18, 3),
(17, 'Muito bom,cucas deliciosas.', '2015-11-11', 23, 3),
(18, 'Uma boa pastelaria.', '2015-11-11', 29, 3),
(19, 'Dentre toda uma gama de variedades estabelecidas para o cliente,o restaurante ainda conta com um excelente atendimento! Deveras Impressionante. ', '2015-11-11', 17, 23),
(20, 'Muito boa a comida!! Já comi!!', '2015-11-11', 16, 23),
(21, 'Impressionante a culinária japonese. ', '2015-11-11', 26, 23),
(22, 'Um rango do bom aí,gostei  muitíssimo.', '2015-11-11', 17, 14),
(23, 'A carne do estabelecimento é Friboi!!!!', '2015-11-11', 18, 14),
(24, 'O rango dos japa é bom.', '2015-11-11', 26, 14),
(25, 'Gostei muito,as promoções de datas comemorativas são boas!', '2015-11-11', 17, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_enderecos`
--

CREATE TABLE IF NOT EXISTS `tb_enderecos` (
  `end_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `end_logradouro` varchar(45) NOT NULL,
  `end_numero` varchar(4) NOT NULL,
  `end_cep` varchar(9) NOT NULL,
  `end_complemento` varchar(50) DEFAULT NULL,
  `end_codbairro` int(11) NOT NULL,
  PRIMARY KEY (`end_codigo`),
  KEY `fk_tb_endereco_tb_bairro1` (`end_codbairro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `tb_enderecos`
--

INSERT INTO `tb_enderecos` (`end_codigo`, `end_logradouro`, `end_numero`, `end_cep`, `end_complemento`, `end_codbairro`) VALUES
(7, 'Mariana Broneman', '527', '89036-080', 'Na Velha', 28),
(25, 'Rua Baburinha', '4242', '42781-410', '', 5),
(8, 'Carlos Rieschbieter', '61', '89012-200', 'Na Boa VIsta', 3),
(9, 'São Paulo', '1280', '89012-200', 'Na frente do Giassi', 31),
(10, 'Joinville', '148', '89035-200', 'Perto da Furb', 34),
(11, 'Henrique Conrad', '1194', '89095-300', '', 33),
(12, ' Avenida Quinze de Novembro', '8444', '89498-498', '', 25),
(13, 'Porto Rico', '66', '89050-010', '', 20),
(14, 'Sete de Setembro', '432', '89651-651', '', 5),
(15, 'Dois de setembro', '218', '89052-000', '', 13),
(16, 'Engenheiro Paul Werner', '936', '89022-600', '', 13),
(17, 'Malrechau Deodoro', '202', '89036-300', '', 28),
(18, 'Porto Rico', '77', '89050-010', '', 20),
(19, 'Av. Pres. Castelo Branco', '417', '89001-000', '', 5),
(20, 'General Osório', '2617', '89061-188', '', 1),
(21, 'Antonio da Veiga', '440', '89012-500', '', 34),
(22, 'Pedro Zimmermann', '2512', '89055-466', '', 12),
(23, 'Sete de Setembro', '2266', '89010-911', 'Shopping Neumarkt 2º Piso', 5),
(24, 'Av. Lisboa', '176', '89052-600', '', 13),
(26, 'Pres. Getúlio Vargas', '63', '89010-130', '', 5),
(27, 'R Curt Hering', '31', '89010-030', 'Sala 09', 1),
(28, 'R Frederico Jensen', '1360', '89066-301', '', 16),
(29, ' Caçadores', '3707', '89040-003', 'esquina com José Reuter', 28),
(30, 'R Frederico Jensen', '3020', '89066-302', '', 16),
(31, ' Frei Estanislau Schaette', '168', '89037-002', 'Sala 2', 6),
(32, '7 de setembro', '2713', '89010-200', 'Prox.Terminal Proeb', 5),
(33, ' BR 470 ', '3000', '89065-80', 'North Shopping,sala 35', 1),
(34, 'General Osório', '3012', '89042-000', '', 1),
(35, 'Paulo Zimmermann', '242', '89010-170', '', 5),
(36, '7 de setembro', '2013', '89012-400', '', 5),
(37, 'R Coronel Feddersen', '20', '89030-415', '', 15),
(38, '7 de setembro', '2070', '89012-400', '', 5),
(39, 'São Paulo', '1120', '89012-000', '', 31),
(40, 'São Paulo', '1360', '89036-05', 'Térreo', 15),
(41, 'Antonio da Veiga', '484', '89012-50', 'Sala 02', 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estados`
--

CREATE TABLE IF NOT EXISTS `tb_estados` (
  `est_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `est_nome` varchar(45) NOT NULL,
  `est_sigla` varchar(2) NOT NULL,
  PRIMARY KEY (`est_codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_estados`
--

INSERT INTO `tb_estados` (`est_codigo`, `est_nome`, `est_sigla`) VALUES
(1, 'Santa Catarina', 'SC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_restaurantes`
--

CREATE TABLE IF NOT EXISTS `tb_restaurantes` (
  `res_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `res_nmfantasia` varchar(70) NOT NULL,
  `res_rzsocial` varchar(70) NOT NULL,
  `res_telefone` varchar(15) NOT NULL,
  `res_cnpj` varchar(18) NOT NULL,
  `res_foto` varchar(45) DEFAULT NULL,
  `res_url` varchar(100) DEFAULT NULL,
  `res_codendereco` int(11) NOT NULL,
  `res_codusuario` int(11) NOT NULL,
  `res_codcategoria` int(11) NOT NULL,
  PRIMARY KEY (`res_codigo`),
  KEY `fk_tb_restaurantes_tb_enderecos1` (`res_codendereco`),
  KEY `fk_tb_restaurantes_tb_usuarios1` (`res_codusuario`),
  KEY `fk_tb_restaurante_tb_categoria1_idx` (`res_codcategoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `tb_restaurantes`
--

INSERT INTO `tb_restaurantes` (`res_codigo`, `res_nmfantasia`, `res_rzsocial`, `res_telefone`, `res_cnpj`, `res_foto`, `res_url`, `res_codendereco`, `res_codusuario`, `res_codcategoria`) VALUES
(11, 'Abendbrothaus', 'Abendbrothaus Restaurante', '(47) 3378-1157', '69.514.894/3121-58', '', '', 11, 32, 6),
(10, 'Pepper Jack ', 'Pepper Jack Restaurante', '(47) 3041-2922', '49.878.465/4110-65', '', 'https://www.pepperjack.com.br', 10, 31, 11),
(9, 'ElBurrito', 'ElBurrito', '(47) 3041-3555', '97.845.648/9121-31', '', 'https://www.elburrito.com.br', 9, 30, 11),
(8, 'Rosa Mexicano', 'Rosa Mexicano', '(47) 3288-3096', '15.981.202/3186-84', '', 'http://www.rosamexicano.com.br/', 8, 29, 11),
(12, 'WunderWald', 'WunderWald Tipicos', '(47) 3395-1700', '96.221.851/5619-86', '', '', 12, 33, 6),
(13, 'Moinho do Vale', 'Restaurante Moinho do Vale', '(47) 3322-3440', '58.264.997/9794-61', '', 'https://www.moinhodovale.com.br', 13, 34, 6),
(14, 'Cheff Manu', 'Cheff Manu', '(47) 3363-2699', '98.966.548/1000-26', '', 'https://www.cheffmanu.com.br', 14, 35, 2),
(15, 'Tempero Caseiro', 'Tempero Caseiro - Restaurante & Eventos', '(47) 3323-2470', '65.489.130/0659-89', '', 'https://www.temperocaseiro.com.br', 15, 36, 6),
(16, 'Nonna Conceta', 'Ristorante Nonna Conceta', '(47) 3312-6598', '32.569.875/5522-22', '', 'https://www.nonnaconceta.com.br', 16, 37, 9),
(17, 'Gutes Essen', 'Restaurante Gutes Essen', '(47) 3329-0691', '12.569.784/8448-15', '', 'https://www.gutesessen.com.br', 17, 38, 5),
(18, 'Ataliba Churrascaria', 'Ataliba Churrascaria LTDA', '(47) 8951-6666', '96.589.998/9494-94', '', 'http://www.churrascariataliba.com.br/home/', 18, 39, 1),
(19, 'Dazarábia', 'Dazarábia Restaurante Árabe', '(47) 3323-4896', '57.896.314/5200-01', '', 'http://dazarabia.com/', 19, 40, 7),
(20, 'Esfiha Sheik', 'Esfiha Sheik - Lanches Árabes', '(47) 3222-5684', '66.359.989/8994-51', '', 'https://www.esfihasheik.com.br', 20, 41, 7),
(21, 'Dona Hilda', 'Dona Hilda', '(47) 3322-6986', '48.687.498/7987-98', '', 'http://www.donahilda.com.br/', 21, 42, 2),
(22, 'Onkel Cafehaus', 'Onkel Cafehaus', '(47) 3339-0604', '15.997.974/6464-94', '', 'https://www.onkel.com.br', 22, 43, 2),
(23, 'Cafehaus Glória', 'Confeitaria Cafehaus Glória', '(47) 3326-2140', '25.896.314/7123-02', '', 'https://www.cafehausgloria.com.br', 23, 44, 2),
(24, 'Madrugadão Lanches', 'Madrugadão Lanches', '(47) 3231-9295', '99.689.518/5521-51', '', 'http://www.madrugadaolanches.com.br/', 24, 45, 3),
(7, 'Restaurante Figueira', 'Restaurante Figueira LTDA', '(47) 3035-3710', '10.256.891/0050-66', '', 'http://www.figueirarestaurante.com.br/', 7, 28, 1),
(25, 'Restaurante Amendoim com Mel', 'Amendoim com Mel Ltda.', '(47) 3378-7878', '41.638.479/8641-46', '', 'http://www.amendoimcommel.com.br', 25, 46, 8),
(26, 'Sushi Garden', 'Sushi Garden Restaurante Japonês ltda', '(47) 3326-1335', '10.618.475/0001-08', '', 'http://www.sushigardenbnu.com.br/', 26, 47, 10),
(27, 'Sushi Yuzu', 'Sushi Yuzu - Restaurante ltda - EPP', '(47) 3041-2590', '14.057.290/0001-14', '', 'http://www.sushiyuzu.com.br/', 27, 48, 10),
(28, 'Pastelaria Trindade', 'Restaurante e Pastelaria Trindade Ltda - Me', '(47) 3337-6643', '17.911.497/0001-00', '', '', 28, 49, 4),
(29, 'Paraíso dos Pastéis', 'Paraíso Dos Pastéis Pastelaria Ltda - EPP', '(47) 3330-0706', '07.811.558/0001-04', '', 'http://paraisodospasteis.com.br/', 29, 50, 4),
(30, 'Pastelaria Duas Irmãs', 'Everaldo Americo Sobrinho - Pastelaria - ME', '(47) 3323-2535', '09.528.529/0001-57', '', '', 30, 51, 4),
(31, 'Mega Dog', 'Mega Dog - Restaurante E Lanchonete Eireli - ME', '(47) 3328-0000', '18.472.176/0001-01', '', '', 31, 52, 3),
(32, 'Mcdonalds', 'Mcdonalds Comercio De Alimentos Ltda.', '(47) 3037-2598', '42.591.651/0921-61', '', '', 32, 57, 3),
(33, 'Burger King', 'Adiser Comércio de Alimentos ltda', '(47) 3388-5649', '11.377.588/0009-70', '', '', 33, 58, 3),
(34, 'Bibamel', 'Panificadora Biba Mel Ltda Me', '(47) 3330-9139', '03.980.261/0001-03', '', '', 34, 59, 2),
(35, 'Don Corleone ', 'Pizzaria Don Corleone Ltda - ME', '(47) 3035-4949', '03.872.291/0001-04', '', '', 35, 60, 5),
(36, 'Don Peppone', 'Pizzeria Don Peppone Ltda', '(47) 3322-9090', '02.486.536/0001-94', '', '', 36, 61, 5),
(37, 'Catedral da Pizza', '- Catedral da Pizza ltda ', '(04) 7985-0587', '83.064.253/0001-56', '', '', 37, 62, 5),
(38, 'Blu Pizza', 'Blu Pizza Ltda', '(47) 3035-7214', '03.144.973/0001-92', '', '', 38, 63, 5),
(39, 'Mortadella Ristorante e Pizzeria', 'Mortadella Ristorante e Pizzeria Ltda', '(47) 3037-6060', '11.086.933/0001-60', '', '', 39, 64, 9),
(40, 'Castelo Da Pizza', 'Castelo da Pizza Ltda ', '(47) 3328-0804', '01.530.882/0001-60', '', '', 40, 65, 5),
(41, 'Hakken Sushi', 'JEAN CARLOS LINHARES - ME', '(47) 3037-3992', '19.369.661/0001-17', '', '', 41, 70, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usu_email` varchar(45) NOT NULL,
  `usu_senha` varchar(8) NOT NULL,
  `usu_nivel` int(11) NOT NULL,
  PRIMARY KEY (`usu_codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`usu_codigo`, `usu_email`, `usu_senha`, `usu_nivel`) VALUES
(1, 'ctomazoni@hotmail.com', 'tomazoni', 2),
(2, 'jaiane_ber@hotmail.com', '123456', 2),
(3, 'pretto@theblack.com.br', '12345678', 2),
(28, 'figueira@hotmail.com', 'figueira', 1),
(29, 'rosamexicano@hotmail.com', 'mexico', 1),
(30, 'elburrito@hotmail.com', 'burrito', 1),
(31, 'pepperjack@hotmail.com', 'pepperja', 1),
(32, 'abendbrothaus@hotmail.com', 'Abendbro', 1),
(26, 'dj.pretto@hotmail.com.br', 'qwertyui', 2),
(25, 'bbbb@bbbb.bbb', 'bbbbbbbb', 2),
(18, 'zcarnes@hotmail.com', 'zecazeca', 2),
(22, 'stomazoni@hotmail.com', '12345678', 2),
(23, 'aaa@email.com', 'llllllll', 2),
(24, 'aaaa@aaaa.aaa', 'aaaaaaaa', 2),
(33, 'wunderwald@hotmail.com', 'wunderwa', 1),
(34, 'moinhodovale@hotmail.com', 'moinhodo', 1),
(35, 'cheffmanu@hotmail.com', 'cheffman', 1),
(36, 'temperocaseiro@hotmail.com', 'caseiro', 1),
(37, 'nonnaconceta@hotmail.com', 'conceta', 1),
(38, 'gutesessen@hotmail.com', 'gutesess', 1),
(39, 'ataliba@hotmail.com', 'ataliba', 1),
(40, 'dazarabia@hotmail.com', 'dazarabi', 1),
(41, 'esfihasheik@hotmail.com', 'esfihash', 1),
(42, 'donahilda@hotmail.com', 'donahild', 1),
(43, 'onkel@hotmailc.om', 'cafehaus', 1),
(44, 'cafehausgloria@hotmail.com', 'gloria', 1),
(45, 'madrugadaolanches@hotmail.com', 'madrugad', 1),
(46, 'amendoim@melmail.com', 'comMel', 1),
(47, 'contato@sushigardenbnu.com.br', 'sushig', 1),
(48, 'contato@sushiyuzu.com.br', 'sushiy', 1),
(49, 'contato@pastelariatrindade.com.br', 'trindade', 1),
(50, 'contato@paraisodospasteis.com.br', 'paraisop', 1),
(51, 'contato@pastelariaduasirmas.com.br', 'pastelar', 1),
(52, 'contato@megadog.com.br', 'megadog', 1),
(54, 'joaodasneves@gmail.com', '123456', 2),
(55, 'pedroso@hotmail.com', 'pedro1', 2),
(56, 'admin@admin.com', '123456', 2),
(57, 'mcdonalds@contato.com', 'mcdonald', 1),
(58, 'contato@burgerking.com', 'burgerki', 1),
(59, 'contato@bibamel.com', 'bibamel', 1),
(60, 'contato@doncorleone.com', 'doncorle', 1),
(61, 'contato@donpeppone.com', 'donpeppo', 1),
(62, 'contato@catedraldapizza.com', 'catedral', 1),
(63, 'contato@blupizza.com', 'blupizza', 1),
(64, 'contato@mortadella.com', 'mortadel', 1),
(65, 'contato@castelodapizza.com', 'castelod', 1),
(70, 'contato@hakkensushi.com', 'hakkensu', 1),
(53, 'christian.lucasltda@gmail.com', 'ad12345', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_votos`
--

CREATE TABLE IF NOT EXISTS `tb_votos` (
  `vot_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `vot_curtida` tinyint(1) NOT NULL,
  `vot_data` date NOT NULL,
  `vot_codrestaurante` int(11) NOT NULL,
  `vot_codcliente` int(11) NOT NULL,
  PRIMARY KEY (`vot_codigo`),
  KEY `fk_tb_votacao_tb_restaurante1` (`vot_codrestaurante`),
  KEY `fk_tb_votacao_tb_cliente1` (`vot_codcliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Extraindo dados da tabela `tb_votos`
--

INSERT INTO `tb_votos` (`vot_codigo`, `vot_curtida`, `vot_data`, `vot_codrestaurante`, `vot_codcliente`) VALUES
(1, 1, '2015-11-10', 25, 1),
(2, 1, '2015-11-10', 25, 3),
(3, 1, '2015-11-10', 26, 1),
(4, 1, '2015-11-10', 9, 1),
(5, 1, '2015-11-10', 22, 1),
(6, 1, '2015-11-11', 28, 1),
(7, 1, '2015-11-11', 10, 1),
(8, 1, '2015-11-11', 17, 1),
(9, 1, '2015-11-11', 14, 1),
(10, 1, '2015-11-11', 16, 1),
(11, 1, '2015-11-11', 31, 1),
(12, 1, '2015-11-11', 13, 1),
(13, 1, '2015-11-11', 20, 1),
(14, 1, '2015-11-11', 10, 2),
(15, 1, '2015-11-11', 8, 2),
(16, 1, '2015-11-11', 12, 2),
(17, 1, '2015-11-11', 14, 2),
(18, 1, '2015-11-11', 16, 2),
(19, 1, '2015-11-11', 31, 2),
(20, 1, '2015-11-11', 17, 2),
(21, 1, '2015-11-11', 11, 2),
(22, 1, '2015-11-11', 10, 3),
(23, 1, '2015-11-11', 8, 3),
(24, 1, '2015-11-11', 15, 3),
(25, 1, '2015-11-11', 31, 3),
(26, 1, '2015-11-11', 30, 3),
(27, 1, '2015-11-11', 29, 3),
(28, 1, '2015-11-11', 7, 3),
(29, 1, '2015-11-11', 22, 3),
(30, 1, '2015-11-11', 23, 3),
(31, 1, '2015-11-11', 24, 3),
(32, 1, '2015-11-11', 19, 3),
(33, 1, '2015-11-11', 21, 3),
(34, 1, '2015-11-11', 28, 3),
(35, 1, '2015-11-11', 10, 21),
(36, 1, '2015-11-11', 9, 21),
(37, 1, '2015-11-11', 12, 21),
(38, 1, '2015-11-11', 14, 21),
(39, 1, '2015-11-11', 16, 21),
(40, 1, '2015-11-11', 18, 21),
(41, 1, '2015-11-11', 22, 21),
(42, 1, '2015-11-11', 31, 21),
(43, 1, '2015-11-11', 25, 21),
(44, 1, '2015-11-11', 13, 21),
(45, 1, '2015-11-11', 15, 21),
(46, 1, '2015-11-11', 7, 21),
(47, 1, '2015-11-11', 20, 21),
(48, 1, '2015-11-11', 26, 21),
(49, 1, '2015-11-11', 30, 21),
(50, 1, '2015-11-11', 10, 20),
(51, 1, '2015-11-11', 11, 20),
(52, 1, '2015-11-11', 27, 20),
(53, 1, '2015-11-11', 12, 20),
(54, 1, '2015-11-11', 15, 20),
(55, 1, '2015-11-11', 16, 20),
(56, 1, '2015-11-11', 14, 20),
(57, 1, '2015-11-11', 20, 20),
(58, 1, '2015-11-11', 31, 20),
(59, 1, '2015-11-11', 28, 20),
(60, 1, '2015-11-11', 9, 20),
(61, 1, '2015-11-11', 21, 20),
(62, 1, '2015-11-11', 8, 20),
(63, 1, '2015-11-11', 19, 20),
(64, 1, '2015-11-11', 29, 20),
(65, 1, '2015-11-11', 25, 20),
(66, 1, '2015-11-11', 23, 20),
(67, 1, '2015-11-11', 10, 14),
(68, 1, '2015-11-11', 11, 14),
(69, 1, '2015-11-11', 8, 14),
(70, 1, '2015-11-11', 14, 14),
(71, 1, '2015-11-11', 13, 14),
(72, 1, '2015-11-11', 12, 14),
(73, 1, '2015-11-11', 17, 14),
(74, 1, '2015-11-11', 16, 14),
(75, 1, '2015-11-11', 23, 14),
(76, 1, '2015-11-11', 29, 14),
(77, 1, '2015-11-11', 31, 14),
(78, 1, '2015-11-11', 28, 14),
(79, 1, '2015-11-11', 18, 14),
(80, 1, '2015-11-11', 26, 14),
(81, 1, '2015-11-11', 24, 17),
(82, 1, '2015-11-11', 10, 17),
(83, 1, '2015-11-11', 9, 17),
(84, 1, '2015-11-11', 8, 17),
(85, 1, '2015-11-11', 15, 17),
(86, 1, '2015-11-11', 14, 17),
(87, 1, '2015-11-11', 21, 17),
(88, 1, '2015-11-11', 7, 17),
(89, 1, '2015-11-11', 30, 17),
(90, 1, '2015-11-11', 31, 17),
(91, 1, '2015-11-11', 11, 18),
(92, 1, '2015-11-11', 9, 18),
(93, 1, '2015-11-11', 15, 18),
(94, 1, '2015-11-11', 17, 18),
(95, 1, '2015-11-11', 7, 18),
(96, 1, '2015-11-11', 24, 18),
(97, 1, '2015-11-11', 27, 18),
(98, 1, '2015-11-11', 31, 18),
(99, 1, '2015-11-11', 25, 18),
(100, 1, '2015-11-11', 18, 18),
(101, 1, '2015-11-11', 21, 18),
(102, 1, '2015-11-11', 9, 19),
(103, 1, '2015-11-11', 8, 19),
(104, 1, '2015-11-11', 10, 19),
(105, 1, '2015-11-11', 14, 19),
(106, 1, '2015-11-11', 18, 19),
(107, 1, '2015-11-11', 21, 19),
(108, 1, '2015-11-11', 24, 19),
(109, 1, '2015-11-11', 30, 19),
(110, 1, '2015-11-11', 31, 19),
(111, 1, '2015-11-11', 11, 19);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
