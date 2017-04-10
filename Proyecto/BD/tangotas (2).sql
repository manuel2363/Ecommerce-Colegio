-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 23-07-2014 a las 14:14:19
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `tangotas`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `categorias`
-- 

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(39) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `categorias`
-- 

INSERT INTO `categorias` VALUES (1, 'Salvaje', 'asdsadsda');
INSERT INTO `categorias` VALUES (2, 'Clasica', 'adsdsadsa');
INSERT INTO `categorias` VALUES (3, 'Experimental', 'asddasdassad');
INSERT INTO `categorias` VALUES (4, 'Sexi', 'asddsaasddas');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `comentarios`
-- 

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL default 'despublicado',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- 
-- Volcar la base de datos para la tabla `comentarios`
-- 

INSERT INTO `comentarios` VALUES (1, 'Mi rey', 'lalitorams@gmail.com', 'CHINGON', 'fsddsfdffsdsffddfsl de lalito rams esta chingony que la venta de las tangas es un negocio millonario', '24332432432432', 'publicado');
INSERT INTO `comentarios` VALUES (22, 'Mi rey', 'lalitorams@gmail.com', 'xcvcxvxcvxcv', 'vcvccxvcxvcxvcxvcxvcxv', '03/06/2014', 'publicado');
INSERT INTO `comentarios` VALUES (9, 'Administrador', 'admin@admin.com', 'asdsadsad', 'asdsadsadsadsad', '03/06/2014', 'publicado');
INSERT INTO `comentarios` VALUES (10, 'Administrador', 'admin@admin.com', 'sfddfdsfdsf', 'sdfdsf', '03/06/2014', 'publicado');
INSERT INTO `comentarios` VALUES (21, 'Administrador', 'lalitorams@gmail.com', '', 'hfhdfgfdgfdgfdfdg', '03/06/2014', 'publicado');
INSERT INTO `comentarios` VALUES (20, 'Administrador', 'admin@admin.com', '5555555', '55555', '03/06/2014', 'publicado');
INSERT INTO `comentarios` VALUES (25, 'Administrador', 'admin@admin.com', 'sadsad', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '23/06/2014', 'publicado');
INSERT INTO `comentarios` VALUES (26, 'Dolar', 'dolar@dolar', '', '', '24/06/2014', 'despublicado');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `mantenimiento`
-- 

CREATE TABLE `mantenimiento` (
  `id` int(11) NOT NULL auto_increment,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `mantenimiento`
-- 

INSERT INTO `mantenimiento` VALUES (1, 'mantenimiento');
INSERT INTO `mantenimiento` VALUES (2, 'trabajando');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pago`
-- 

CREATE TABLE `pago` (
  `id` int(11) NOT NULL auto_increment,
  `tipo` varchar(50) NOT NULL,
  `banco` varchar(50) NOT NULL,
  `no_cuenta` varchar(100) NOT NULL,
  `titular` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `pago`
-- 

INSERT INTO `pago` VALUES (1, 'Bancomer (Credito)', 'Bancomer', '324343243234', 'Lalito Rams');
INSERT INTO `pago` VALUES (2, 'Banamex (Transferencia bancaria)', 'Banamex', '23432432523325', 'Lalito Rams');
INSERT INTO `pago` VALUES (3, 'Paypal (Transferencia)', 'Paypal', '24325235324', 'Lalito Rams');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pedidos`
-- 

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL auto_increment,
  `fecha` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nombreR` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `metodoenvio` varchar(70) NOT NULL,
  `metodopago` varchar(70) NOT NULL,
  `articulos` varchar(500) NOT NULL,
  `total` varchar(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- Volcar la base de datos para la tabla `pedidos`
-- 

INSERT INTO `pedidos` VALUES (1, 'asdasd', 'asdasd', 'asdsad', 'asdsadsa', 'asdasd', 'asdsad', '2312', '123123213', 'dasdsad', 'asdsad', '3424', '', 'Pagado');
INSERT INTO `pedidos` VALUES (3, '21/06/2014 23:43:58', 'Dolar', 'sadas', 'dasdsadsa', 'asddsadsa', '324324', '23423', '23424', 'Estafeta', 'Banamex (Transferencia bancaria)', '[54] = 1.', '54', '');
INSERT INTO `pedidos` VALUES (4, '21/06/2014 23:57:11', 'Dolar', 'asdsa', 'asdsadsad', 'asdsad', 'asdasd', '32434', '234234324', 'Estafeta', 'Paypal (Transferencia)', '[34] = 1.', '514', '');
INSERT INTO `pedidos` VALUES (5, '22/06/2014 09:40:52', 'Dolar', 'Lalito Rams', 'Valle - Toronja - 50', 'Morelia', 'Michoacan', '44890', '412329123', 'Estafeta', 'Banamex (Transferencia bancaria)', '[80] = 1.', '304', '');
INSERT INTO `pedidos` VALUES (11, '24/06/2014 13:48:37', 'Dolar', 'sdfdsf', 'sdfsdf', 'dsfsdf', 'sdfsdf', '234234', '234234', 'Estafeta', 'Selecciona una forma de pago...', '[80] = 1.', '80', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `productos`
-- 

CREATE TABLE `productos` (
  `id` int(11) NOT NULL auto_increment,
  `portada` varchar(100) NOT NULL,
  `nombreP` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` varchar(11) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `fecha` varchar(80) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- 
-- Volcar la base de datos para la tabla `productos`
-- 

INSERT INTO `productos` VALUES (18, 'images/tangas-ref-206-7777178z0.jpg', 'Normal', 'asdsad', '54', '2', '19/07/2014', 'Sexi', 'despublicado');
INSERT INTO `productos` VALUES (16, 'images/img.jpg', 'Super', 'super man', '80', '22', '14/Jun/2014', 'Experimental', 'despublicado');
INSERT INTO `productos` VALUES (17, 'images/tangas-nuevas-para-uso-diario-y-noches-especiales-ultimas-1144-MLM4734452005_072013-O.jpg', 'Pack tangas', 'muchas', '234', '231', '19/06/2014', 'Salvaje', 'despublicado');
INSERT INTO `productos` VALUES (15, 'images/df.jpg', 'Elefantito', 'tanga', '545', '205', '19/06/2014', 'Salvaje', 'publicado');
INSERT INTO `productos` VALUES (19, 'images/images.jpg', 'EDE', 'EDEE', '23', '22', '19/06/2014', 'Sexi', 'publicado');
INSERT INTO `productos` VALUES (20, 'images/images.jpg', 'qwe', 'qwe', '34', '6', '19/Jun/2014', 'Clasica', 'publicado');
INSERT INTO `productos` VALUES (21, 'images/anticonceptivos.jpg', 'asdasd', 'asddsasad', '324324', '324423', '19/07/2014', 'Salvaje', 'publicado');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `status`
-- 

CREATE TABLE `status` (
  `id` int(11) NOT NULL auto_increment,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `status`
-- 

INSERT INTO `status` VALUES (1, 'En Proceso');
INSERT INTO `status` VALUES (2, 'Pagado');
INSERT INTO `status` VALUES (3, 'Entregado');
INSERT INTO `status` VALUES (4, 'Cancelado');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `imagen` varchar(200) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `privilegios` varchar(20) NOT NULL default 'Usuario',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (17, 'imagenes/Imagen2.png', 'CAGUABONGA', 'CAGUABONGA@hotmail.c', '3e8d115eb4b32b9e9479f387dbe14ee1', 'Usuario');
INSERT INTO `usuarios` VALUES (10, 'imagenes/viajes.jpg', 'Mi rey', 'lalitorams@gmail.com', '39c3ac84912e917f46f1baa034513376', 'Usuario');
INSERT INTO `usuarios` VALUES (5, 'administrador/usuarios/imagenes/559480_395880607181608_1693211699_n.jpg', 'lalito', 'lalo@gmail.com', '6a0897cfd163f9fb5bad', 'Usuario');
INSERT INTO `usuarios` VALUES (13, 'imagenes/Logo_Nuevo.png', 'asd', 'asd@dsa', 'f970e2767d0cfe75876ea857f92e319b', 'Administrador');
INSERT INTO `usuarios` VALUES (32, 'imagenes/images.jpg', 'ed', 'ed@ed', 'b5f3729e5418905ad2b21ce186b1c01d', 'Administrador');
INSERT INTO `usuarios` VALUES (33, 'imagenes/images.jpg', 'ff', 'ff@ff', '633de4b0c14ca52ea2432a3c8a5c4c31', 'Usuario');
INSERT INTO `usuarios` VALUES (11, 'imagenes/char.png', 'Administrador', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Administrador');
INSERT INTO `usuarios` VALUES (34, 'imagenes/imagen.jpg', 'Dolar', 'dolar@dolar', '568a7bd05c09b03d57f0e614eb55f58f', 'Usuario');
INSERT INTO `usuarios` VALUES (35, 'imagenes/ff60a879-f9b6-4b8f-b56f-d157da60423f.jpg', 'asdsad', 'asdsa@sdffsd', 'ad41b3d77a7a512f2382ee58eb53cb74', 'Usuario');
INSERT INTO `usuarios` VALUES (36, 'imagenes/ff60a879-f9b6-4b8f-b56f-d157da60423f.jpg', 'asdsad', 'asdsd@sadds', 'f970e2767d0cfe75876ea857f92e319b', 'Usuario');
INSERT INTO `usuarios` VALUES (37, 'imagenes/ajedrezz.jpg', 'caca', 'caca@caca', 'd2104a400c7f629a197f33bb33fe80c0', 'Usuario');
