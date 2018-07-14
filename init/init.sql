/* TODO: create tables */
CREATE TABLE 'users' (
  'id' INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  'email' TEXT NOT NULL UNIQUE,
  'password' TEXT NOT NULL
);

CREATE TABLE 'inventory' (
  'id' INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  'instrument_type' TEXT NOT NULL,
  'quantity' INTEGER NOT NULL DEFAULT 0
);

CREATE TABLE 'instruments' (
  'id' INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  'location' TEXT NOT NULL
);

CREATE TABLE 'inventory_instrument' (
  'id' INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  'instrument_id' INTEGER NOT NULL UNIQUE,
  'inventory_id' INTEGER NOT NULL
);

CREATE TABLE 'members' (
  'id' INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  'name' TEXT NOT NULL,
  'year' INTEGER NOT NULL,
  'major' TEXT NOT NULL,
  'file_ext' TEXT
);

/* TODO: initial seed data */
INSERT INTO users (email, password) VALUES ('rk542@cornell.edu', '$2y$10$m91TxMG63KSR7/KHxIzm/eHjDyzYNi865WdnwWy7EhpQ9YwZ5XRHW'); /*rk542*/
INSERT INTO users (email, password) VALUES ('jk2344@cornell.edu', '$2y$10$1kdxRcRmI.QU.4knpc7I2unx4my.3ch5aBogg0EcuqkQUqpBOLqqS'); /*jk2344*/
INSERT INTO users (email, password) VALUES ('yk489@cornell.edu', '$2y$10$1i0ZylBBIUo3dJ0lP4FnYO7ca4O3TnZu/Xv/LrOm7Xpu9qLd9dm4y'); /*yk489*/
INSERT INTO users (email, password) VALUES ('sy549@cornell.edu', '$2y$10$bmhcWlDJy4uR0ksEa0bvn..0THpQh/ZKhxUz.7jjIXw2Q.GPB8bgm'); /*sy549*/
INSERT INTO users (email, password) VALUES ('sp2296@cornell.edu', '$2y$10$f45a5jz7MaAWYNcYHXRuh.XmIx21xNxS3/auMwXuGnTScgtxruwTS'); /*sp2296*/

INSERT INTO inventory (instrument_type, quantity) VALUES ("janggu", 21);
INSERT INTO inventory (instrument_type, quantity) VALUES ("buk", 8);
INSERT INTO inventory (instrument_type, quantity) VALUES ("kkwaenggwari", 5);
INSERT INTO inventory (instrument_type, quantity) VALUES ("jing", 2);
INSERT INTO inventory (instrument_type, quantity) VALUES ("taepyeongso", 2);
INSERT INTO inventory (instrument_type, quantity) VALUES ("sogo", 7);
INSERT INTO inventory (instrument_type, quantity) VALUES ("gung chae", 20);
INSERT INTO inventory (instrument_type, quantity) VALUES ("yeol chae", 44);
INSERT INTO inventory (instrument_type, quantity) VALUES ("buk chae", 10);
INSERT INTO inventory (instrument_type, quantity) VALUES ("kkwaenggwari chae", 19);
INSERT INTO inventory (instrument_type, quantity) VALUES ("sogo chae", 9);
INSERT INTO inventory (instrument_type, quantity) VALUES ("jing chae", 5);

INSERT INTO instruments (location) VALUES ("lincoln hall");
INSERT INTO instruments (location) VALUES ("lincoln hall");
INSERT INTO instruments (location) VALUES ("lincoln hall");
INSERT INTO instruments (location) VALUES ("lincoln hall");
INSERT INTO instruments (location) VALUES ("lincoln hall");
INSERT INTO instruments (location) VALUES ("lincoln hall");
INSERT INTO instruments (location) VALUES ("lincoln hall");
INSERT INTO instruments (location) VALUES ("lincoln hall");
INSERT INTO instruments (location) VALUES ("lincoln hall");
INSERT INTO instruments (location) VALUES ("lincoln hall");
INSERT INTO instruments (location) VALUES ("lincoln hall");
INSERT INTO instruments (location) VALUES ("lincoln hall");

INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (1, 1);
INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (2, 2);
INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (3, 3);
INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (4, 4);
INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (5, 5);
INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (6, 6);
INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (7, 7);
INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (8, 8);
INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (9, 9);
INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (10, 10);
INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (11, 11);
INSERT INTO inventory_instrument (instrument_id, inventory_id) VALUES (12, 12);

INSERT INTO members (name, year, major, file_ext) VALUES ("Joo Yeon Chae", 2019, "Electrical Engineering", 'jpg');
INSERT INTO members (name, year, major, file_ext) VALUES ("Richard Kan", 2019, "Chemistry", 'jpg');
INSERT INTO members (name, year, major, file_ext) VALUES ("Jennie (Seok Eun) Yi", 2020, "Human Biology, Health, and Society", 'jpg');
INSERT INTO members (name, year, major, file_ext) VALUES ("Jin Gyu Lee", 2019, "Chemical and Biomolecular Engineering", 'jpg');
INSERT INTO members (name, year, major, file_ext) VALUES ("Alicia Wang", 2021, "ILR", 'jpg');
INSERT INTO members (name, year, major, file_ext) VALUES ("Caroline Yeo", 2021, "Computer Science", 'jpg');
INSERT INTO members (name, year, major, file_ext) VALUES ("Elaine Kim", 2017, "Psychology", 'jpg');
INSERT INTO members (name, year, major, file_ext) VALUES ("Esther Kim", 2017, "Psychology", 'jpg');
INSERT INTO members (name, year, major, file_ext) VALUES ("Eunah Song", 2021, "Chemistry", 'jpg');
INSERT INTO members (name, year, major, file_ext) VALUES ("Jenny Yeon", 2020, "Physics", 'jpg');
INSERT INTO members (name, year, major, file_ext) VALUES ("Jeong Hyun Lee", 2020, "Mathematics", 'jpg');
INSERT INTO members (name, year, major, file_ext) VALUES ("Jinwook Lee", 2021, "English", 'jpg')
