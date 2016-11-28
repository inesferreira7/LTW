.mode column
.nullvalue null
.headers on

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Owner;
DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS Review;

CREATE TABLE User(
  user_id INTEGER PRIMARY KEY AUTOINCREMENT,
  email TEXT NOT NULL UNIQUE,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL,
  first_name TEXT NOT NULL,
  surname TEXT NOT NULL
);
--podemos acrescentar imagens

CREATE TABLE Restaurant(
  restaurant_id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  descricao TEXT NOT NULL
);
--podemos acrescentar imagens e tipo

CREATE TABLE Owner(
  owner_id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  restaurant_id INTEGER NOT NULL,
  FOREIGN KEY(user_id) REFERENCES User(user_id),
  FOREIGN KEY(restaurant_id) REFERENCES Restaurant(restaurant_id)
);

CREATE TABLE Review(
  review_id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  restaurant_id INTEGER NOT NULL,
  stars INTEGER NOT NULL,
  FOREIGN KEY(user_id) REFERENCES User(user_id),
  FOREIGN KEY(restaurant_id) REFERENCES Restaurant(restaurant_id)
);

INSERT INTO User VALUES (NULL, '123@gmail.com', '123', '1234', 'joao', 'chaves');
