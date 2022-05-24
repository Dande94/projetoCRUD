
CREATE DATABASE cursos;
-- -----------------------------------------------------
-- Table `cursos`.`disciplinas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cursos`.`disciplinas` (
  `idDisciplinas` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cargaHoraria` INT NOT NULL,
  `sigla` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idDisciplinas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cursos`.`areas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cursos`.`areas` (
  `idAreas` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idAreas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cursos`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cursos`.`cursos` (
  `idCursos` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cargaHoraria` INT NOT NULL,
  `modalidade` VARCHAR(15) NOT NULL,
  `areas_idAreas` INT NOT NULL,
  PRIMARY KEY (`idCursos`),
  INDEX `fk_cursos_areas_idx` (`areas_idAreas` ASC) ,
  CONSTRAINT `fk_cursos_areas`
    FOREIGN KEY (`areas_idAreas`)
    REFERENCES `cursos`.`areas` (`idAreas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cursos`.`disciplinas_has_cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cursos`.`disciplinas_has_cursos` (
  `disciplinas_idDisciplinas` INT NOT NULL,
  `cursos_idCursos` INT NOT NULL,
  `ano` INT(4) NOT NULL,
  `semestre` INT(2) NOT NULL,
  PRIMARY KEY (`disciplinas_idDisciplinas`, `cursos_idCursos`),
  INDEX `fk_disciplinas_has_cursos_cursos1_idx` (`cursos_idCursos` ASC) ,
  INDEX `fk_disciplinas_has_cursos_disciplinas1_idx` (`disciplinas_idDisciplinas` ASC) ,
  CONSTRAINT `fk_disciplinas_has_cursos_disciplinas1`
    FOREIGN KEY (`disciplinas_idDisciplinas`)
    REFERENCES `cursos`.`disciplinas` (`idDisciplinas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_disciplinas_has_cursos_cursos1`
    FOREIGN KEY (`cursos_idCursos`)
    REFERENCES `cursos`.`cursos` (`idCursos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


