/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.14-MariaDB : Database - panleos
*********************************************************************
https://www.codigofuentepuntodeventa.com/pos_simple/pos
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`panleos` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `panleos`;

/*Table structure for table `cant_venta_pans` */

DROP TABLE IF EXISTS `cant_venta_pans`;

CREATE TABLE `cant_venta_pans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` tinyint(4) NOT NULL,
  `detalles` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `cant_venta_pans` */

insert  into `cant_venta_pans`(`id`,`cantidad`,`detalles`,`created_at`,`updated_at`) values (1,8,NULL,NULL,NULL),(2,7,NULL,NULL,NULL),(3,10,NULL,NULL,NULL),(4,6,NULL,NULL,NULL);

/*Table structure for table `cargos` */

DROP TABLE IF EXISTS `cargos`;

CREATE TABLE `cargos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(45) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `cargos` */

insert  into `cargos`(`id`,`cargo`,`descripcion`,`created_at`,`updated_at`) values (1,'ADMINISTRADOR','ADMINISTRADOR DE LA EMPRESA',NULL,NULL),(2,'VENDEDOR','ATENCION AL PUBLICO',NULL,NULL),(3,'CAJERO','COBRANZAS',NULL,NULL),(4,'REPARTIDOR','ENTREGA DE PEDIDOS',NULL,NULL);

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `categorias` */

insert  into `categorias`(`id`,`categoria`,`descripcion`,`created_at`,`updated_at`) values (1,'PANADERÍA',NULL,NULL,NULL),(2,'ABARROTES',NULL,NULL,NULL);

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_razon` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `documento_identi` char(11) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `referencia` text NOT NULL,
  `representante` varchar(150) NOT NULL,
  `nCelular` char(9) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cumpleanos` date NOT NULL,
  `tipoCliente_id` int(10) unsigned NOT NULL,
  `identificacion_id` int(10) unsigned NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientes_tipocliente_id_foreign` (`tipoCliente_id`),
  KEY `clientes_identificacion_id_foreign` (`identificacion_id`),
  KEY `clientes_users_id_foreign` (`users_id`),
  CONSTRAINT `clientes_identificacion_id_foreign` FOREIGN KEY (`identificacion_id`) REFERENCES `identificacions` (`id`),
  CONSTRAINT `clientes_tipocliente_id_foreign` FOREIGN KEY (`tipoCliente_id`) REFERENCES `tipo_clientes` (`id`),
  CONSTRAINT `clientes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`nombre_razon`,`direccion`,`documento_identi`,`alias`,`referencia`,`representante`,`nCelular`,`email`,`cumpleanos`,`tipoCliente_id`,`identificacion_id`,`users_id`,`created_at`,`updated_at`) values (1,'GRUPO FUMINSUMOS SAC','AV. LOS FICUS CALLE 5 LOS GIRASOLES','20600149645','FUMINSUMOS','al costado del estadio','JUAN MARTINEZ','96455211','fuminsumos@gmail.com','2020-12-14',1,1,1,'2020-12-14 07:18:24','2020-12-14 07:18:24'),(2,'JORGE DE RIVA AGUERO','AV. LOS FICUS CALLE 5 LOS GIRASOLES','20600149645','LAS REJAS','al costado del estadio','JUAN MARTINEZ','96455211','fuminsumos@gmail.com','2020-12-14',1,1,1,'2020-12-14 07:18:24','2020-12-14 07:18:24'),(3,'RIVAS CISNERO CARLOS','AV. LOS FICUS CALLE 5 LOS GIRASOLES','20600149645','EL GALPON','al costado del estadio','JUAN MARTINEZ','96455211','fuminsumos@gmail.com','2020-12-14',1,1,1,'2020-12-14 07:18:24','2020-12-14 07:18:24'),(4,'JORGE MACALUPU SANCHES','AV. LOS FICUS CALLE 5 LOS GIRASOLES','20600149645','LAS REJITAS','al costado del estadio','JUAN MARTINEZ','96455211','fuminsumos@gmail.com','2020-12-14',1,1,1,'2020-12-14 07:18:24','2020-12-14 07:18:24'),(5,'MARCO SERRANO FIESTAS','AV. LOS FICUS CALLE 5 LOS GIRASOLES','20600149645','DON MICHAEL','al costado del estadio','JUAN MARTINEZ','96455211','fuminsumos@gmail.com','2020-12-14',1,1,1,'2020-12-14 07:18:24','2020-12-14 07:18:24');

/*Table structure for table `detalle_pedidos` */

DROP TABLE IF EXISTS `detalle_pedidos`;

CREATE TABLE `detalle_pedidos` (
  `cantidad` tinyint(4) NOT NULL,
  `pedido_id` int(10) unsigned NOT NULL,
  `producto_id` int(10) unsigned NOT NULL,
  `cantpan_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `detalle_pedidos_pedido_id_foreign` (`pedido_id`),
  KEY `detalle_pedidos_cantpan_id_foreign` (`cantpan_id`),
  KEY `detalle_pedidos_producto_id_foreign` (`producto_id`),
  CONSTRAINT `detalle_pedidos_cantpan_id_foreign` FOREIGN KEY (`cantpan_id`) REFERENCES `cant_venta_pans` (`id`),
  CONSTRAINT `detalle_pedidos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  CONSTRAINT `detalle_pedidos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalle_pedidos` */

insert  into `detalle_pedidos`(`cantidad`,`pedido_id`,`producto_id`,`cantpan_id`,`created_at`,`updated_at`) values (8,1,1,1,NULL,NULL),(30,1,2,3,NULL,NULL),(25,1,3,3,NULL,NULL),(30,3,1,1,NULL,NULL),(50,3,4,1,NULL,NULL),(60,3,5,1,NULL,NULL),(70,3,2,1,NULL,NULL),(15,4,6,3,NULL,NULL);

/*Table structure for table `detalle_ventas` */

DROP TABLE IF EXISTS `detalle_ventas`;

CREATE TABLE `detalle_ventas` (
  `venta_id` int(10) unsigned NOT NULL,
  `producto_id` int(10) unsigned NOT NULL,
  `cantidad` tinyint(4) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `valorVenta` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `detalle_ventas_venta_id_foreign` (`venta_id`),
  KEY `detalle_ventas_producto_id_foreign` (`producto_id`),
  CONSTRAINT `detalle_ventas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `detalle_ventas_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalle_ventas` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `identificacions` */

DROP TABLE IF EXISTS `identificacions`;

CREATE TABLE `identificacions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identificacions` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `identificacions` */

insert  into `identificacions`(`id`,`identificacions`,`descripcion`,`created_at`,`updated_at`) values (1,'RUC',NULL,NULL,NULL),(2,'DNI',NULL,NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2020_11_02_152006_create_cargos_table',1),(4,'2020_11_02_152106_create_users_table',1),(5,'2020_11_02_152206_create_proveedores_table',1),(6,'2020_12_09_074709_create_tipo_clientes_table',2),(7,'2020_12_09_074925_create_identificacions_table',2),(8,'2020_12_09_075218_create_seccions_table',2),(9,'2020_12_09_075343_create_categorias_table',2),(10,'2020_12_09_075607_create_productos_table',2),(11,'2020_12_09_075954_create_clientes_table',2),(12,'2020_12_10_071514_create_tipo_comprobantes_table',2),(13,'2020_12_10_071617_create_tipo_pagos_table',2),(14,'2020_12_10_071805_create_turnos_table',2),(15,'2020_12_10_071926_create_ventas_table',2),(16,'2020_12_10_072210_create_detalle_ventas_table',2),(18,'2020_12_15_073712_add_precio_compra_to_productos',3),(27,'2020_12_15_072445_create_tipo_estado_table',4),(28,'2020_12_15_074602_create_recipiente_entregas_table',4),(29,'2020_12_15_075541_create_pedidos_table',4),(30,'2020_12_15_080038_create_cant_venta_pans_table',4),(31,'2020_12_15_080113_create_detalle_pedidos_table',4),(32,'2020_12_21_144440_add_color_to_tipo_estado',5);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fPedido` date NOT NULL,
  `monto` decimal(9,2) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `turno_id` int(10) unsigned NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `estado_id` int(10) unsigned NOT NULL,
  `recipiente_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_cliente_id_foreign` (`cliente_id`),
  KEY `pedidos_turno_id_foreign` (`turno_id`),
  KEY `pedidos_users_id_foreign` (`users_id`),
  KEY `pedidos_estado_id_foreign` (`estado_id`),
  KEY `pedidos_recipiente_id_foreign` (`recipiente_id`),
  CONSTRAINT `pedidos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `pedidos_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `tipo_estado` (`id`),
  CONSTRAINT `pedidos_recipiente_id_foreign` FOREIGN KEY (`recipiente_id`) REFERENCES `recipiente_entregas` (`id`),
  CONSTRAINT `pedidos_turno_id_foreign` FOREIGN KEY (`turno_id`) REFERENCES `turnos` (`id`),
  CONSTRAINT `pedidos_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `pedidos` */

insert  into `pedidos`(`id`,`fPedido`,`monto`,`observaciones`,`cliente_id`,`turno_id`,`users_id`,`estado_id`,`recipiente_id`,`created_at`,`updated_at`) values (1,'2020-12-21',15.00,NULL,2,1,1,1,2,NULL,NULL),(3,'2020-12-21',25.00,NULL,5,1,1,2,1,NULL,NULL),(4,'2020-12-21',22.00,NULL,3,1,1,3,2,NULL,NULL);

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `presentacion` varchar(60) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `pCompra` decimal(9,2) DEFAULT NULL,
  `pVenta` decimal(8,2) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `productos` */

insert  into `productos`(`id`,`nombre`,`presentacion`,`stock`,`imagen`,`pCompra`,`pVenta`,`descripcion`,`categoria_id`,`created_at`,`updated_at`) values (1,'FRANCES','UNIDAD',10,'',0.30,5.00,'PAN FRANCES',1,NULL,NULL),(2,'REDONDO','UNIDAD',30,'',0.30,5.00,NULL,1,NULL,NULL),(3,'CACHITO DE MANTECA','UNIDAD',0,'',NULL,0.00,NULL,1,NULL,NULL),(4,'ITALIANO','UNIDAD',0,'',NULL,0.00,NULL,1,NULL,NULL),(5,'CACHANGA','UNIDAD',0,'',NULL,0.00,NULL,1,NULL,NULL),(6,'CACHITO ANIS','UNIDAD',0,'',NULL,0.00,NULL,1,NULL,NULL);

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rason` varchar(100) NOT NULL,
  `ruc` char(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nCelula` char(9) NOT NULL,
  `nFono` char(9) NOT NULL,
  `referencia` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `proveedores` */

insert  into `proveedores`(`id`,`rason`,`ruc`,`direccion`,`contacto`,`email`,`nCelula`,`nFono`,`referencia`,`created_at`,`updated_at`) values (1,'GRURO CONCORDIA','20601496455','LAS GARDENIAS','JAVIER PACHERREZ','concordia@gmail.com','96455554','3355999','POR UNA REFERENCIA',NULL,'2020-12-07 07:05:40');

/*Table structure for table `recipiente_entregas` */

DROP TABLE IF EXISTS `recipiente_entregas`;

CREATE TABLE `recipiente_entregas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recipiente` varchar(45) NOT NULL,
  `icono` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `recipiente_entregas` */

insert  into `recipiente_entregas`(`id`,`recipiente`,`icono`,`descripcion`,`created_at`,`updated_at`) values (1,'TAPER','icon-tupper',NULL,NULL,NULL),(2,'CANASTA','icon-baguette',NULL,NULL,NULL);

/*Table structure for table `seccions` */

DROP TABLE IF EXISTS `seccions`;

CREATE TABLE `seccions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seccion` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `seccions` */

/*Table structure for table `tipo_clientes` */

DROP TABLE IF EXISTS `tipo_clientes`;

CREATE TABLE `tipo_clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_clientes` */

insert  into `tipo_clientes`(`id`,`tipo`,`descripcion`,`created_at`,`updated_at`) values (1,'DISTRIBUIDOR',NULL,NULL,NULL),(2,'CONSUMIDOR',NULL,NULL,NULL);

/*Table structure for table `tipo_comprobantes` */

DROP TABLE IF EXISTS `tipo_comprobantes`;

CREATE TABLE `tipo_comprobantes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comprobante` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipo_comprobantes` */

/*Table structure for table `tipo_estado` */

DROP TABLE IF EXISTS `tipo_estado`;

CREATE TABLE `tipo_estado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  `color` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_estado` */

insert  into `tipo_estado`(`id`,`estado`,`color`,`descripcion`,`created_at`,`updated_at`) values (1,'PENDIENTE','bg-info',NULL,NULL,NULL),(2,'ANULADO','bg-danger',NULL,NULL,NULL),(3,'ENTREGADO','bg-warning',NULL,NULL,NULL);

/*Table structure for table `tipo_pagos` */

DROP TABLE IF EXISTS `tipo_pagos`;

CREATE TABLE `tipo_pagos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoPago` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipo_pagos` */

/*Table structure for table `turnos` */

DROP TABLE IF EXISTS `turnos`;

CREATE TABLE `turnos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `turno` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `turnos` */

insert  into `turnos`(`id`,`turno`,`descripcion`,`created_at`,`updated_at`) values (1,'MAÑANA',NULL,NULL,NULL),(2,'TARDE',NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `aPaterno` varchar(80) NOT NULL,
  `aMaterno` varchar(80) NOT NULL,
  `dni` char(8) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `nCelular` char(9) NOT NULL,
  `fIngreso` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `user` varchar(30) NOT NULL,
  `ultimoLogeo` datetime DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cargos_id` int(10) unsigned NOT NULL,
  `password` varchar(255) NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_unique` (`user`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_cargos_id_foreign` (`cargos_id`),
  KEY `users_users_id_foreign` (`users_id`),
  CONSTRAINT `users_cargos_id_foreign` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`),
  CONSTRAINT `users_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`aPaterno`,`aMaterno`,`dni`,`direccion`,`nCelular`,`fIngreso`,`avatar`,`user`,`ultimoLogeo`,`email`,`email_verified_at`,`cargos_id`,`password`,`users_id`,`remember_token`,`created_at`,`updated_at`) values (1,'RONY JESÚS','AGUILERA','RIVERA','46261585','Calle las Gardenias Miraflores','962615854','2019-11-09','/storage/img/avatar/751.jpeg','Rony','2020-12-26 07:17:02','rony@hotmail.com','2020-12-26 07:17:02',1,'$2y$10$YXvjm/1aDUSm/.wanZ1h3ujSL4XBZyYStop5yO/eGFDpG.Exg2H2C',1,NULL,'2020-11-09 06:59:12','2020-12-26 07:17:02'),(2,'MANUEL','PEREZ','ALBELA','4652515','Calle los Girasoles Castilla - Piura','99964455','2020-11-24','/storage/img/avatar/7Hjr2F8pht9aVsZdZJrn7x4KSuEbOUf2uKo5lGeK.png','Manuel',NULL,'manuel@gmail.com','2020-11-24 10:11:55',2,'$2y$10$YMK0XBWmIYGSkXdfHPtoqO./Uj0/jszA83ZzJMeXLbiEkbKTJWpuy',1,NULL,'2020-11-24 10:11:55','2020-11-24 10:11:55'),(3,'RAUL','CORDOVA','MARTINEZ','56688444','POR LA AV. MIRAFLORES CASTILLAS','96558844','2020-11-25','/storage/img/avatar/LB4juC5Br7TYkitEj7jaCIMSUGPsk8BMbejK7rwq.png','Raul','2020-11-25 07:57:49','raul@gmail.com','2020-11-25 07:57:49',2,'$2y$10$w5faQU9VSG3fJbSTWmk.wO8zUyzkbBQovchfwp54kmCyaHiwVjeDe',1,NULL,'2020-11-25 07:57:27','2020-11-25 07:57:49'),(4,'JAVIER','CARMONA','RIQUELME','4626551','POR UNA DIRECCION CUALQUIERA','965444','2020-12-07','/storage/img/avatar/Javier/OiQpeirwoFNsTczgA9wlQ3Kni0PlwvTATrF1rrSa.png','Javier',NULL,'javier@gmail.com','2020-12-07 07:23:53',3,'$2y$10$EK8.RyBb867AqbWFBVVzo.l28jXbRQxiv1GvwgrINarB3w63Mxi4K',1,NULL,'2020-12-07 07:23:53','2020-12-07 07:23:53');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `correlativo` char(6) NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `igv` decimal(9,2) NOT NULL,
  `subtotal` decimal(9,2) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fRegistro` date NOT NULL,
  `tcomprobante_id` int(10) unsigned NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `tpagos_id` int(10) unsigned NOT NULL,
  `turno_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_tcomprobante_id_foreign` (`tcomprobante_id`),
  KEY `ventas_cliente_id_foreign` (`cliente_id`),
  KEY `ventas_tpagos_id_foreign` (`tpagos_id`),
  KEY `ventas_turno_id_foreign` (`turno_id`),
  KEY `ventas_user_id_foreign` (`user_id`),
  CONSTRAINT `ventas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `ventas_tcomprobante_id_foreign` FOREIGN KEY (`tcomprobante_id`) REFERENCES `tipo_comprobantes` (`id`),
  CONSTRAINT `ventas_tpagos_id_foreign` FOREIGN KEY (`tpagos_id`) REFERENCES `tipo_pagos` (`id`),
  CONSTRAINT `ventas_turno_id_foreign` FOREIGN KEY (`turno_id`) REFERENCES `turnos` (`id`),
  CONSTRAINT `ventas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ventas` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
