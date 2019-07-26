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
# Table: category
#------------------------------------------------------------

CREATE TABLE category(
        category_id   Int  Auto_increment  NOT NULL ,
        categorie_nom Varchar (255) NOT NULL
	,CONSTRAINT category_PK PRIMARY KEY (category_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: category_subscription
#------------------------------------------------------------

CREATE TABLE category_subscription(
        category_id     Int NOT NULL ,
        subscription_id Int NOT NULL
	,CONSTRAINT category_subscription_PK PRIMARY KEY (category_id,subscription_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        user_id         Int  Auto_increment  NOT NULL ,
        user_name       Varchar (70) NOT NULL ,
        user_firstname  Varchar (70) NOT NULL ,
        user_email      Varchar (70) NOT NULL ,
        user_number     Char (10) NOT NULL ,
        user_password   Text NOT NULL ,
        subscription_id Int  ,
        role_id         Int 
	,CONSTRAINT user_PK PRIMARY KEY (user_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        role_id   Int  Auto_increment  NOT NULL ,
        role_name Varchar (100) NOT NULL ,
        user_id   Int NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (role_id)
)ENGINE=InnoDB;




ALTER TABLE category_subscription
	ADD CONSTRAINT category_subscription_category0_FK
	FOREIGN KEY (category_id)
	REFERENCES category(category_id);

ALTER TABLE category_subscription
	ADD CONSTRAINT category_subscription_subscription1_FK
	FOREIGN KEY (subscription_id)
	REFERENCES subscription(subscription_id);

ALTER TABLE user
	ADD CONSTRAINT user_subscription0_FK
	FOREIGN KEY (subscription_id)
	REFERENCES subscription(subscription_id);

ALTER TABLE user
	ADD CONSTRAINT user_role1_FK
	FOREIGN KEY (role_id)
	REFERENCES role(role_id);

ALTER TABLE user 
	ADD CONSTRAINT user_role0_AK 
	UNIQUE (role_id);

ALTER TABLE role
	ADD CONSTRAINT role_user0_FK
	FOREIGN KEY (user_id)
	REFERENCES user(user_id);

ALTER TABLE role 
	ADD CONSTRAINT role_user0_AK 
	UNIQUE (user_id);
