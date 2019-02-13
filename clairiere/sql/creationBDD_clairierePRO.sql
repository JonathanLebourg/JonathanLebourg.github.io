#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: clair_userTypes
#------------------------------------------------------------

CREATE TABLE clair_userTypes(
        idUserType Int  Auto_increment  NOT NULL ,
        type       Varchar (50) NOT NULL
	,CONSTRAINT clair_userTypes_PK PRIMARY KEY (idUserType)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: clair_users
#------------------------------------------------------------

CREATE TABLE clair_users(
        idUser     Int  Auto_increment  NOT NULL ,
        nickName   Varchar (50) NOT NULL ,
        lastName   Varchar (50) NOT NULL ,
        firstName  Varchar (50) NOT NULL ,
        password   Varchar (50) NOT NULL ,
        mail       Varchar (50) NOT NULL ,
        idUserType Int NOT NULL
	,CONSTRAINT clair_users_PK PRIMARY KEY (idUser)

	,CONSTRAINT clair_users_clair_userTypes_FK FOREIGN KEY (idUserType) REFERENCES clair_userTypes(idUserType)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: clair_specialities
#------------------------------------------------------------

CREATE TABLE clair_specialities(
        idSpeciality Int  Auto_increment  NOT NULL ,
        speciality   Varchar (2000)
	,CONSTRAINT clair_specialities_PK PRIMARY KEY (idSpeciality)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: clair_biographies
#------------------------------------------------------------

CREATE TABLE clair_biographies(
        idBiography    Int  Auto_increment  NOT NULL ,
        present        Varchar (2000) ,
        profilePicture Varchar (100) NOT NULL ,
        idSpeciality   Int NOT NULL ,
        idUser         Int NOT NULL
	,CONSTRAINT clair_biographies_PK PRIMARY KEY (idBiography)

	,CONSTRAINT clair_biographies_clair_specialities_FK FOREIGN KEY (idSpeciality) REFERENCES clair_specialities(idSpeciality)
	,CONSTRAINT clair_biographies_clair_users0_FK FOREIGN KEY (idUser) REFERENCES clair_users(idUser)
	,CONSTRAINT clair_biographies_clair_users_AK UNIQUE (idUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: clair_workStyles
#------------------------------------------------------------

CREATE TABLE clair_workStyles(
        idWorkStyle Int  Auto_increment  NOT NULL ,
        workstyle   Varchar (50) NOT NULL
	,CONSTRAINT clair_workStyles_PK PRIMARY KEY (idWorkStyle)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: modalities
#------------------------------------------------------------

CREATE TABLE modalities(
        idModality   Int  Auto_increment  NOT NULL ,
        modalityType Varchar (200) NOT NULL
	,CONSTRAINT modalities_PK PRIMARY KEY (idModality)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: clair_artworks
#------------------------------------------------------------

CREATE TABLE clair_artworks(
        idArtwork            Int  Auto_increment  NOT NULL ,
        title                Varchar (200) NOT NULL ,
        picture              Varchar (200) NOT NULL ,
        technicalDescription Varchar (2000) NOT NULL ,
        optionalDescription  Varchar (2000) NOT NULL ,
        date                 Year NOT NULL ,
        price                Int NOT NULL ,
        idUser               Int NOT NULL ,
        idWorkStyle          Int NOT NULL ,
        idModality           Int NOT NULL
	,CONSTRAINT clair_artworks_PK PRIMARY KEY (idArtwork)

	,CONSTRAINT clair_artworks_clair_users_FK FOREIGN KEY (idUser) REFERENCES clair_users(idUser)
	,CONSTRAINT clair_artworks_clair_workStyles0_FK FOREIGN KEY (idWorkStyle) REFERENCES clair_workStyles(idWorkStyle)
	,CONSTRAINT clair_artworks_modalities1_FK FOREIGN KEY (idModality) REFERENCES modalities(idModality)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: artWorkInterest
#------------------------------------------------------------

CREATE TABLE artWorkInterest(
        idArtWorkInterest Int  Auto_increment  NOT NULL ,
        idArtwork         Int NOT NULL ,
        idUser            Int NOT NULL
	,CONSTRAINT artWorkInterest_PK PRIMARY KEY (idArtWorkInterest)

	,CONSTRAINT artWorkInterest_clair_artworks_FK FOREIGN KEY (idArtwork) REFERENCES clair_artworks(idArtwork)
	,CONSTRAINT artWorkInterest_clair_users0_FK FOREIGN KEY (idUser) REFERENCES clair_users(idUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: clair_messages
#------------------------------------------------------------

CREATE TABLE clair_messages(
        idMessage                 Int  Auto_increment  NOT NULL ,
        message                   Varchar (5000) NOT NULL ,
        idArtWorkInterest         Int NOT NULL ,
        idArtWorkInterest_recieve Int NOT NULL
	,CONSTRAINT clair_messages_PK PRIMARY KEY (idMessage)

	,CONSTRAINT clair_messages_artWorkInterest_FK FOREIGN KEY (idArtWorkInterest) REFERENCES artWorkInterest(idArtWorkInterest)
	,CONSTRAINT clair_messages_artWorkInterest0_FK FOREIGN KEY (idArtWorkInterest_recieve) REFERENCES artWorkInterest(idArtWorkInterest)
)ENGINE=InnoDB;

