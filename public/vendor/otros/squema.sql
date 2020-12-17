-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema BDpanaderialeos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema BDpanaderialeos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BDpanaderialeos` DEFAULT CHARACTER SET utf8 ;
USE `BDpanaderialeos` ;

-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`TIPO_COMPROBANTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`TIPO_COMPROBANTE` (
  `tipoComprobante_id` INT NOT NULL AUTO_INCREMENT,
  `comprobante` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  PRIMARY KEY (`tipoComprobante_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`TIPO_CLIENTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`TIPO_CLIENTE` (
  `tipoCliente_id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `descripcion` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  PRIMARY KEY (`tipoCliente_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`IDENTIFICACION_CLIENTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`IDENTIFICACION_CLIENTE` (
  `identificacion_id` INT NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `descripcion` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `fRegistro` TIMESTAMP NULL,
  PRIMARY KEY (`identificacion_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`SUCURSAL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`SUCURSAL` (
  `sucursal_id` INT NOT NULL AUTO_INCREMENT,
  `direccion` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `nFono` CHAR(9) NULL,
  `estado` INT(1) NOT NULL,
  `descripcion` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  PRIMARY KEY (`sucursal_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`CARGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`CARGO` (
  `cargo_id` INT NOT NULL AUTO_INCREMENT,
  `cargo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `descripcion` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `fCreacion` TIMESTAMP NULL,
  PRIMARY KEY (`cargo_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`COLABORADOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`COLABORADOR` (
  `colaborador_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `aPaterno` VARCHAR(80) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `aMaterno` VARCHAR(80) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `dni` CHAR(8) NOT NULL,
  `direccion` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `nCelular` CHAR(9) NULL,
  `fIngreso` DATE NOT NULL,
  `fCreacion` TIMESTAMP NULL,
  `avatar` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `user` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `pass` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `email` VARCHAR(80) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `cargo_id` INT NOT NULL,
  PRIMARY KEY (`colaborador_id`),
  INDEX `fk_COLABORADOR_CARGO1_idx` (`cargo_id` ASC),
  CONSTRAINT `fk_COLABORADOR_CARGO1`
    FOREIGN KEY (`cargo_id`)
    REFERENCES `BDpanaderialeos`.`CARGO` (`cargo_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`CLIENTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`CLIENTE` (
  `cliente_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `nombre_razon` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `direccion` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `documento_identi` CHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `alias` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `referencia` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `representante` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `nCelular` CHAR(9) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `email` VARCHAR(100) NULL,
  `fRegistro` TIMESTAMP NOT NULL,
  `cumpleaños` DATE NULL,
  `tipoCliente_id` INT NOT NULL,
  `identificacion_id` INT NOT NULL,
  `sucursal_id` INT NOT NULL,
  `colaborador_id` INT NOT NULL,
  PRIMARY KEY (`cliente_id`),
  INDEX `fk_CLIENTE_TIPO_CLIENTE1_idx` (`tipoCliente_id` ASC),
  INDEX `fk_CLIENTE_IDENTIFICACION_CLIENTE1_idx` (`identificacion_id` ASC),
  INDEX `fk_CLIENTE_SUCURSAL1_idx` (`sucursal_id` ASC),
  INDEX `fk_CLIENTE_COLABORADOR1_idx` (`colaborador_id` ASC),
  CONSTRAINT `fk_CLIENTE_TIPO_CLIENTE1`
    FOREIGN KEY (`tipoCliente_id`)
    REFERENCES `BDpanaderialeos`.`TIPO_CLIENTE` (`tipoCliente_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CLIENTE_IDENTIFICACION_CLIENTE1`
    FOREIGN KEY (`identificacion_id`)
    REFERENCES `BDpanaderialeos`.`IDENTIFICACION_CLIENTE` (`identificacion_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CLIENTE_SUCURSAL1`
    FOREIGN KEY (`sucursal_id`)
    REFERENCES `BDpanaderialeos`.`SUCURSAL` (`sucursal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CLIENTE_COLABORADOR1`
    FOREIGN KEY (`colaborador_id`)
    REFERENCES `BDpanaderialeos`.`COLABORADOR` (`colaborador_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`TIPO_PAGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`TIPO_PAGO` (
  `tPago_id` INT NOT NULL AUTO_INCREMENT,
  `tPago` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `descriipcion` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  PRIMARY KEY (`tPago_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`TURNO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`TURNO` (
  `turno_id` INT NOT NULL AUTO_INCREMENT,
  `turno` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  PRIMARY KEY (`turno_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`VENTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`VENTA` (
  `venta_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `correlativo` CHAR(6) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `fecha` DATE NOT NULL,
  `total` DECIMAL(9,2) NOT NULL,
  `igv` DECIMAL(9,2) NOT NULL,
  `subtotal` DECIMAL(9,2) NOT NULL,
  `estado` INT NOT NULL,
  `fRegistro` TIMESTAMP NOT NULL,
  `tipoComprobante_id` INT NOT NULL,
  `cliente_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `sucursal_id` INT NOT NULL,
  `tPago_id` INT NOT NULL,
  `turno_id` INT NOT NULL,
  `colaborador_id` INT NOT NULL,
  PRIMARY KEY (`venta_id`),
  INDEX `fk_VENTA_TIPO_COMPROBANTE1_idx` (`tipoComprobante_id` ASC),
  INDEX `fk_VENTA_CLIENTE1_idx` (`cliente_id` ASC),
  INDEX `fk_VENTA_SUCURSAL1_idx` (`sucursal_id` ASC),
  INDEX `fk_VENTA_TIPO_PAGO1_idx` (`tPago_id` ASC),
  INDEX `fk_VENTA_TURNO1_idx` (`turno_id` ASC),
  INDEX `fk_VENTA_COLABORADOR1_idx` (`colaborador_id` ASC),
  CONSTRAINT `fk_VENTA_TIPO_COMPROBANTE1`
    FOREIGN KEY (`tipoComprobante_id`)
    REFERENCES `BDpanaderialeos`.`TIPO_COMPROBANTE` (`tipoComprobante_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTA_CLIENTE1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `BDpanaderialeos`.`CLIENTE` (`cliente_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTA_SUCURSAL1`
    FOREIGN KEY (`sucursal_id`)
    REFERENCES `BDpanaderialeos`.`SUCURSAL` (`sucursal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTA_TIPO_PAGO1`
    FOREIGN KEY (`tPago_id`)
    REFERENCES `BDpanaderialeos`.`TIPO_PAGO` (`tPago_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTA_TURNO1`
    FOREIGN KEY (`turno_id`)
    REFERENCES `BDpanaderialeos`.`TURNO` (`turno_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VENTA_COLABORADOR1`
    FOREIGN KEY (`colaborador_id`)
    REFERENCES `BDpanaderialeos`.`COLABORADOR` (`colaborador_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`SECCION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`SECCION` (
  `seccion_id` INT NOT NULL AUTO_INCREMENT,
  `seccion` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `descripcion` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `estado` INT(1) NOT NULL,
  PRIMARY KEY (`seccion_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`CATEGORIA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`CATEGORIA` (
  `categoria_id` CHAR(5) NOT NULL,
  `categoria` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `descripcion` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `estado` BIT(1) NOT NULL,
  `seccion_id` INT NOT NULL,
  PRIMARY KEY (`categoria_id`),
  INDEX `fk_CATEGORIA_SECCION1_idx` (`seccion_id` ASC),
  CONSTRAINT `fk_CATEGORIA_SECCION1`
    FOREIGN KEY (`seccion_id`)
    REFERENCES `BDpanaderialeos`.`SECCION` (`seccion_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`PRODUCTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`PRODUCTO` (
  `producto_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `nombre` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `presentacion` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `stock` INT NOT NULL,
  `imagen` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `pVenta` DECIMAL(9,2) NOT NULL,
  `descripcion` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `categoria_id` CHAR(5) NOT NULL,
  PRIMARY KEY (`producto_id`),
  INDEX `fk_PRODUCTO_CATEGORIA1_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_PRODUCTO_CATEGORIA1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `BDpanaderialeos`.`CATEGORIA` (`categoria_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`UNIDAD_MEDIDA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`UNIDAD_MEDIDA` (
  `unMedida_Id` INT NOT NULL AUTO_INCREMENT,
  `unidadMedida` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `unidadConversion` INT NULL,
  PRIMARY KEY (`unMedida_Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`MATERIA_PRIMA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`MATERIA_PRIMA` (
  `mPrima_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `pCompra` DATE NOT NULL,
  `stokUnd` INT NOT NULL,
  `descripcion` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `stockGramos` INT NOT NULL,
  `observacion` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `unMedida_Id` INT NOT NULL,
  PRIMARY KEY (`mPrima_id`),
  INDEX `fk_MATERIA_PRIMA_UNIDAD_MEDIDA1_idx` (`unMedida_Id` ASC),
  CONSTRAINT `fk_MATERIA_PRIMA_UNIDAD_MEDIDA1`
    FOREIGN KEY (`unMedida_Id`)
    REFERENCES `BDpanaderialeos`.`UNIDAD_MEDIDA` (`unMedida_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`DETALLE_VENTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`DETALLE_VENTA` (
  `venta_id` CHAR(10) NOT NULL,
  `producto_id` CHAR(10) NOT NULL,
  `cantidad` INT NOT NULL,
  `precio` DECIMAL(9,2) NOT NULL,
  `valorVena` DECIMAL(9,2) NOT NULL,
  INDEX `fk_DETALLE_VENTA_PRODUCTO1_idx` (`producto_id` ASC),
  INDEX `fk_DETALLE_VENTA_VENTA1_idx` (`venta_id` ASC),
  CONSTRAINT `fk_DETALLE_VENTA_PRODUCTO1`
    FOREIGN KEY (`producto_id`)
    REFERENCES `BDpanaderialeos`.`PRODUCTO` (`producto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_VENTA_VENTA1`
    FOREIGN KEY (`venta_id`)
    REFERENCES `BDpanaderialeos`.`VENTA` (`venta_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`CAJA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`CAJA` (
  `caja_id` INT NOT NULL AUTO_INCREMENT,
  `sucursal_id` INT NOT NULL,
  `fApertura` DATE NOT NULL,
  `hApertura` TIME NOT NULL,
  `mApertura` DECIMAL(9,2) NOT NULL,
  `mCierre` DECIMAL(9,2) NULL,
  `hCierre` DATETIME NULL,
  `estado` INT(1) NOT NULL,
  `observaciones` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  PRIMARY KEY (`caja_id`),
  INDEX `fk_CAJA_SUCURSAL1_idx` (`sucursal_id` ASC),
  CONSTRAINT `fk_CAJA_SUCURSAL1`
    FOREIGN KEY (`sucursal_id`)
    REFERENCES `BDpanaderialeos`.`SUCURSAL` (`sucursal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`TIPO_MOVIMIENTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`TIPO_MOVIMIENTO` (
  `tMovimiento_id` INT NOT NULL AUTO_INCREMENT,
  `tipoMovimiento` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `estado` INT(1) NULL,
  PRIMARY KEY (`tMovimiento_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`MOVIMIENTOS_CAJA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`MOVIMIENTOS_CAJA` (
  `movCaja_id` INT NOT NULL AUTO_INCREMENT,
  `caja_id` INT NOT NULL,
  `tMovimiento_id` INT NOT NULL,
  `tipoComprobante_id` INT NOT NULL,
  `nroComprobante` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `nombreEmpre_persona` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `monto` DECIMAL(9,2) NOT NULL,
  `observacion` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `estado` INT(1) NULL,
  INDEX `fk_MOVIMIENTOS_CAJA_TIPO_MOVIMIENTO1_idx` (`tMovimiento_id` ASC),
  INDEX `fk_MOVIMIENTOS_CAJA_TIPO_COMPROBANTE1_idx` (`tipoComprobante_id` ASC),
  PRIMARY KEY (`movCaja_id`),
  INDEX `fk_MOVIMIENTOS_CAJA_CAJA1_idx` (`caja_id` ASC),
  CONSTRAINT `fk_MOVIMIENTOS_CAJA_TIPO_MOVIMIENTO1`
    FOREIGN KEY (`tMovimiento_id`)
    REFERENCES `BDpanaderialeos`.`TIPO_MOVIMIENTO` (`tMovimiento_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MOVIMIENTOS_CAJA_TIPO_COMPROBANTE1`
    FOREIGN KEY (`tipoComprobante_id`)
    REFERENCES `BDpanaderialeos`.`TIPO_COMPROBANTE` (`tipoComprobante_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MOVIMIENTOS_CAJA_CAJA1`
    FOREIGN KEY (`caja_id`)
    REFERENCES `BDpanaderialeos`.`CAJA` (`caja_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`PERMISO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`PERMISO` (
  `permiso_id` INT NOT NULL AUTO_INCREMENT,
  `permiso` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `descripcion` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `fCreacion` TIMESTAMP NULL,
  PRIMARY KEY (`permiso_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`MAQUINA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`MAQUINA` (
  `maquina_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `descripcion` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `uso` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `fCompra` DATE NOT NULL,
  `costo` DECIMAL(10,2) NOT NULL,
  `proveedor` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `celular` CHAR(9) NOT NULL,
  `contacto` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `celular2` CHAR(9) NULL,
  `imagen` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `sucursal_id` INT NOT NULL,
  PRIMARY KEY (`maquina_id`),
  INDEX `fk_MAQUINA_SUCURSAL1_idx` (`sucursal_id` ASC),
  CONSTRAINT `fk_MAQUINA_SUCURSAL1`
    FOREIGN KEY (`sucursal_id`)
    REFERENCES `BDpanaderialeos`.`SUCURSAL` (`sucursal_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`PRODUCCCION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`PRODUCCCION` (
  `produccion_id` CHAR(10) NOT NULL,
  `fProduccion` DATE NOT NULL,
  `cantidad` INT NOT NULL,
  `observaciones` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `turno_id` INT NOT NULL,
  `colaborador_id` INT NOT NULL,
  PRIMARY KEY (`produccion_id`),
  INDEX `fk_PRODUCCCION_TURNO1_idx` (`turno_id` ASC),
  INDEX `fk_PRODUCCCION_COLABORADOR1_idx` (`colaborador_id` ASC),
  CONSTRAINT `fk_PRODUCCCION_TURNO1`
    FOREIGN KEY (`turno_id`)
    REFERENCES `BDpanaderialeos`.`TURNO` (`turno_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PRODUCCCION_COLABORADOR1`
    FOREIGN KEY (`colaborador_id`)
    REFERENCES `BDpanaderialeos`.`COLABORADOR` (`colaborador_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`FICHA_PRODUCCION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`FICHA_PRODUCCION` (
  `produccion_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `producto_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `latasCompletas` INT NOT NULL,
  `canpanxLatasIcompletas` INT NULL,
  `canTotal` INT NOT NULL,
  `observacion` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  INDEX `fk_DETALLE_PRODUCCION_PRODUCTO1_idx` (`producto_id` ASC),
  INDEX `fk_DETALLE_PRODUCCION_PRODUCCCION1_idx` (`produccion_id` ASC),
  CONSTRAINT `fk_DETALLE_PRODUCCION_PRODUCTO1`
    FOREIGN KEY (`producto_id`)
    REFERENCES `BDpanaderialeos`.`PRODUCTO` (`producto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_PRODUCCION_PRODUCCCION1`
    FOREIGN KEY (`produccion_id`)
    REFERENCES `BDpanaderialeos`.`PRODUCCCION` (`produccion_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`PROVEEDOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`PROVEEDOR` (
  `proveedor_id` CHAR(5) NOT NULL,
  `rason` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `ruc` CHAR(11) NOT NULL,
  `direccion` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `contacto` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `email` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `nCelular` CHAR(9) NOT NULL,
  `nFono` CHAR(9) NULL,
  `referencia` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  PRIMARY KEY (`proveedor_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`PEDIDO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`PEDIDO` (
  `pedido_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `fecha` DATE NOT NULL,
  `monto` DECIMAL(9,2) NOT NULL,
  `observaciones` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `estado` INT(1) NOT NULL,
  `registroElab` TIMESTAMP NOT NULL,
  `cliente_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `turno_id` INT NOT NULL,
  `colaborador_id` INT NOT NULL,
  PRIMARY KEY (`pedido_id`),
  INDEX `fk_PEDIDO_CLIENTE1_idx` (`cliente_id` ASC),
  INDEX `fk_PEDIDO_TURNO1_idx` (`turno_id` ASC),
  INDEX `fk_PEDIDO_COLABORADOR1_idx` (`colaborador_id` ASC),
  CONSTRAINT `fk_PEDIDO_CLIENTE1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `BDpanaderialeos`.`CLIENTE` (`cliente_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PEDIDO_TURNO1`
    FOREIGN KEY (`turno_id`)
    REFERENCES `BDpanaderialeos`.`TURNO` (`turno_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PEDIDO_COLABORADOR1`
    FOREIGN KEY (`colaborador_id`)
    REFERENCES `BDpanaderialeos`.`COLABORADOR` (`colaborador_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`CANT_VENTA_PAN`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`CANT_VENTA_PAN` (
  `cant_venta_pan_id` INT NOT NULL AUTO_INCREMENT,
  `cantidad_x_sol` INT NOT NULL,
  `detalles` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  PRIMARY KEY (`cant_venta_pan_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`DETALLE_PEDIDO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`DETALLE_PEDIDO` (
  `pedido_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `producto_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `cant_venta_pan_id` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `crearegistro` TIMESTAMP NULL,
  INDEX `fk_DETALLE_PEDIDO_PEDIDO1_idx` (`pedido_id` ASC),
  INDEX `fk_DETALLE_PEDIDO_PRODUCTO1_idx` (`producto_id` ASC),
  INDEX `fk_DETALLE_PEDIDO_CANT_VENTA_PAN1_idx` (`cant_venta_pan_id` ASC),
  CONSTRAINT `fk_DETALLE_PEDIDO_PEDIDO1`
    FOREIGN KEY (`pedido_id`)
    REFERENCES `BDpanaderialeos`.`PEDIDO` (`pedido_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_PEDIDO_PRODUCTO1`
    FOREIGN KEY (`producto_id`)
    REFERENCES `BDpanaderialeos`.`PRODUCTO` (`producto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_PEDIDO_CANT_VENTA_PAN1`
    FOREIGN KEY (`cant_venta_pan_id`)
    REFERENCES `BDpanaderialeos`.`CANT_VENTA_PAN` (`cant_venta_pan_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`DETALLES_MAQUINA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`DETALLES_MAQUINA` (
  `fDetalle` DATE NOT NULL,
  `concepto` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `observacion` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `costo` DECIMAL(9,2) NULL,
  `maquina_id` INT NOT NULL,
  INDEX `fk_DETALLES_MAQUINA_MAQUINA_idx` (`maquina_id` ASC),
  CONSTRAINT `fk_DETALLES_MAQUINA_MAQUINA`
    FOREIGN KEY (`maquina_id`)
    REFERENCES `BDpanaderialeos`.`MAQUINA` (`maquina_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`PERMISO_COLABORADOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`PERMISO_COLABORADOR` (
  `permiso_id` INT NOT NULL,
  `colaborador_id` INT NOT NULL,
  INDEX `fk_PERMISO_COLABORADOR_PERMISO1_idx` (`permiso_id` ASC),
  INDEX `fk_PERMISO_COLABORADOR_COLABORADOR1_idx` (`colaborador_id` ASC),
  CONSTRAINT `fk_PERMISO_COLABORADOR_PERMISO1`
    FOREIGN KEY (`permiso_id`)
    REFERENCES `BDpanaderialeos`.`PERMISO` (`permiso_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PERMISO_COLABORADOR_COLABORADOR1`
    FOREIGN KEY (`colaborador_id`)
    REFERENCES `BDpanaderialeos`.`COLABORADOR` (`colaborador_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`USO_MPRIMA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`USO_MPRIMA` (
  `produccion_id` CHAR(10) NOT NULL,
  `mPrima_id` INT NOT NULL,
  `cantidad` DECIMAL(9,2) NOT NULL,
  `observacion` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  INDEX `fk_PRODUCTO_MPRIMA_MATERIA_PRIMA1_idx` (`mPrima_id` ASC),
  INDEX `fk_USO_MPRIMA_PRODUCCCION1_idx` (`produccion_id` ASC),
  CONSTRAINT `fk_PRODUCTO_MPRIMA_MATERIA_PRIMA1`
    FOREIGN KEY (`mPrima_id`)
    REFERENCES `BDpanaderialeos`.`MATERIA_PRIMA` (`mPrima_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USO_MPRIMA_PRODUCCCION1`
    FOREIGN KEY (`produccion_id`)
    REFERENCES `BDpanaderialeos`.`PRODUCCCION` (`produccion_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`COMPRAS_INGRESOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`COMPRAS_INGRESOS` (
  `ingresos_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `proveedor_id` CHAR(5) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `nroComprobante` CHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `fecha` DATE NOT NULL,
  `montoCompra` DECIMAL(10,2) NOT NULL,
  `igv` DECIMAL(10,2) NOT NULL,
  `subtotal` DECIMAL(10,2) NOT NULL,
  `tipoComprobante_id` INT NOT NULL,
  `colaborador_id` INT NOT NULL,
  PRIMARY KEY (`ingresos_id`),
  INDEX `fk_COMPRAS_INGRESOS_PROVEEDOR1_idx` (`proveedor_id` ASC),
  INDEX `fk_COMPRAS_INGRESOS_TIPO_COMPROBANTE1_idx` (`tipoComprobante_id` ASC),
  INDEX `fk_COMPRAS_INGRESOS_COLABORADOR1_idx` (`colaborador_id` ASC),
  CONSTRAINT `fk_COMPRAS_INGRESOS_PROVEEDOR1`
    FOREIGN KEY (`proveedor_id`)
    REFERENCES `BDpanaderialeos`.`PROVEEDOR` (`proveedor_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMPRAS_INGRESOS_TIPO_COMPROBANTE1`
    FOREIGN KEY (`tipoComprobante_id`)
    REFERENCES `BDpanaderialeos`.`TIPO_COMPROBANTE` (`tipoComprobante_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMPRAS_INGRESOS_COLABORADOR1`
    FOREIGN KEY (`colaborador_id`)
    REFERENCES `BDpanaderialeos`.`COLABORADOR` (`colaborador_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`DETALLE_MATPRIMA_PROVEEDOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`DETALLE_MATPRIMA_PROVEEDOR` (
  `ingresos_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `mPrima_id` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `precio` DECIMAL(9,2) NOT NULL,
  `observacion` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL,
  `fVencimiento` DATE NOT NULL,
  INDEX `fk_PROVEEDOR_MPRIMA_MATERIA_PRIMA1_idx` (`mPrima_id` ASC),
  INDEX `fk_PROVEEDOR_MPRIMA_COMPRAS_INGRESOS1_idx` (`ingresos_id` ASC),
  CONSTRAINT `fk_PROVEEDOR_MPRIMA_MATERIA_PRIMA1`
    FOREIGN KEY (`mPrima_id`)
    REFERENCES `BDpanaderialeos`.`MATERIA_PRIMA` (`mPrima_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PROVEEDOR_MPRIMA_COMPRAS_INGRESOS1`
    FOREIGN KEY (`ingresos_id`)
    REFERENCES `BDpanaderialeos`.`COMPRAS_INGRESOS` (`ingresos_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `BDpanaderialeos`.`DETALLE_ABARROTES_PROVEEDOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDpanaderialeos`.`DETALLE_ABARROTES_PROVEEDOR` (
  `producto_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `cantidad` INT NOT NULL,
  `pCompra` DECIMAL(9,2) NOT NULL,
  `fVencimiento` DATE NOT NULL,
  `valorCompra` DECIMAL(9,2) NOT NULL,
  `ingresos_id` CHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  INDEX `fk_DETALLE_PROD_PROVEEDOR_PRODUCTO1_idx` (`producto_id` ASC),
  INDEX `fk_DETALLE_PROD_PROVEEDOR_COMPRAS_INGRESOS1_idx` (`ingresos_id` ASC),
  CONSTRAINT `fk_DETALLE_PROD_PROVEEDOR_PRODUCTO1`
    FOREIGN KEY (`producto_id`)
    REFERENCES `BDpanaderialeos`.`PRODUCTO` (`producto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_PROD_PROVEEDOR_COMPRAS_INGRESOS1`
    FOREIGN KEY (`ingresos_id`)
    REFERENCES `BDpanaderialeos`.`COMPRAS_INGRESOS` (`ingresos_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;