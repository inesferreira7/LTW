.mode column
.nullvalue null
.headers on

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Owner;
DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS Review;

CREATE TABLE User(
  user_id INTEGER PRIMARY KEY AUTOINCREMENT,
  first_name TEXT NOT NULL,
  lastname TEXT NOT NULL,
  email TEXT NOT NULL UNIQUE,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL,
  image TEXT
);
--podemos acrescentar imagens

CREATE TABLE Reviewer(
  reviewer_id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  FOREIGN KEY(user_id) REFERENCES User(user_id)
);

CREATE TABLE Restaurant(
  restaurant_id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  descricao TEXT NOT NULL,
  morada TEXT NOT NULL,
  owner_id INTEGER NOT NULL,
  FOREIGN KEY(owner_id) REFERENCES Owner(owner_id)
);
--podemos acrescentar imagens e tipo

CREATE TABLE Owner(
  owner_id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  FOREIGN KEY(user_id) REFERENCES User(user_id)
);

CREATE TABLE Review(
  review_id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  restaurant_id INTEGER NOT NULL,
  stars INTEGER NOT NULL,
  FOREIGN KEY(user_id) REFERENCES User(user_id),
  FOREIGN KEY(restaurant_id) REFERENCES Restaurant(restaurant_id)
);
