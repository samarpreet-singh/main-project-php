/*Samarpreet Singh
200510621
CMPG (Computer Programming)
Main Project - PHP
Professor: Jeremy McCulley
This is the SQL file I used to create tables and add games */

CREATE table registered_users(
	user_id int not null auto_increment,
	email varchar (255),
	username varchar (255),
	password varchar (255),
    primary key (user_id)
);
CREATE table games_catalogue(
	ID int not null auto_increment,
	game_name varchar (255),
	developer varchar (255),
	release_date DATE,
	game_description varchar (255),
    primary key (ID)
);
INSERT INTO games_catalogue (game_name, developer, release_date, game_description)
VALUES
('The Witcher 3: Wild Hunt', 'CD Projekt Red', '2015-05-22', 'As war rages on throughout the Northern Realms, you take on the greatest contract of your life — tracking down the Child of Prophecy, a living weapon that can alter the shape of the world.'),
('God of War: Ragnarok', 'Santa Monica Studios', '2022-11-09', 'Embark on an epic and heartfelt journey as Kratos and Atreus struggle with holding on and letting go.'),
('A Plague Tale: Requiem', 'Asobo Studios', '2022-10-21', 'Embark on a heartrending journey into a brutal, breathtaking world, and discover the cost of saving those you love in a desperate struggle for survival. Strike from the shadows or unleash hell with a variety of weapons, tools and unearthly powers.');