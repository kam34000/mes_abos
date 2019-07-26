-- CREATE DATABASE IF NOT EXISTS `db_name` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE DATABASE IF NOT EXISTS `mes_abos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;


#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table:  subscription
#------------------------------------------------------------

CREATE TABLE subscription(
        subscription_id       Int  Auto_increment  NOT NULL ,
        subscription_name     Varchar (80) NOT NULL ,
        subscription_price    Varchar (6) NOT NULL ,
        subscription_period   Date NOT NULL ,
        subscription_commited Char (5) NOT NULL ,
        subscription_comments Text NOT NULL
	,CONSTRAINT subscription_PK PRIMARY KEY (subscription_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: USER
#------------------------------------------------------------

CREATE TABLE USER(
        user_id         Int  Auto_increment  NOT NULL ,
        user_name       Varchar (70) NOT NULL ,
        user_nickname   Varchar (70) NOT NULL ,
        user_email      Varchar (70) NOT NULL ,
        user_number     Char (10) NOT NULL ,
        user_password   Text NOT NULL ,
        subscription_id Int NOT NULL
	,CONSTRAINT USER_PK PRIMARY KEY (user_id)

	,CONSTRAINT USER_subscription_FK FOREIGN KEY (subscription_id) REFERENCES subscription(subscription_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CATEGORY
#------------------------------------------------------------

CREATE TABLE CATEGORY(
        category_id   Int  Auto_increment  NOT NULL ,
        categorie_nom Varchar (255) NOT NULL
	,CONSTRAINT CATEGORY_PK PRIMARY KEY (category_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ROLE
#------------------------------------------------------------

CREATE TABLE ROLE(
        role_id   Int  Auto_increment  NOT NULL ,
        role_name Varchar (100) NOT NULL ,
        user_id   Int NOT NULL
	,CONSTRAINT ROLE_PK PRIMARY KEY (role_id)

	,CONSTRAINT ROLE_USER_FK FOREIGN KEY (user_id) REFERENCES USER(user_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CONTAINS
#------------------------------------------------------------

CREATE TABLE CONTAINS(
        subscription_id      Int NOT NULL ,
        category_id          Int NOT NULL ,
        category_id_CONTAINS Int NOT NULL
	,CONSTRAINT CONTAINS_PK PRIMARY KEY (subscription_id,category_id,category_id_CONTAINS)

	,CONSTRAINT CONTAINS_subscription_FK FOREIGN KEY (subscription_id) REFERENCES subscription(subscription_id)
	,CONSTRAINT CONTAINS_CATEGORY0_FK FOREIGN KEY (category_id) REFERENCES CATEGORY(category_id)
	,CONSTRAINT CONTAINS_CATEGORY1_FK FOREIGN KEY (category_id_CONTAINS) REFERENCES CATEGORY(category_id)
)ENGINE=InnoDB;

