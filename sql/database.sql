CREATE TABLE `repositorio` (
  `id_repositorio` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `nome_repo` varchar(225) NOT NULL,
  `archivado` tinyint(1) NOT NULL DEFAULT '0',
  `data_ultimo_commit` datetime DEFAULT NULL,
  PRIMARY KEY (`id_repositorio`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4