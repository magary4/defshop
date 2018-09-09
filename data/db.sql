CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, payment_method VARCHAR(255) NOT NULL, time DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE order_items (id INT AUTO_INCREMENT NOT NULL, order_id INT DEFAULT NULL, product_id INT NOT NULL, price INT NOT NULL, INDEX IDX_62809DB08D9F6D38 (order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, tax_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, price INT NOT NULL, INDEX IDX_B3BA5A5AB2A824D8 (tax_id), INDEX IDX_B3BA5A5A665648E9 (color), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE taxes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, tax DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_C28EA7F85E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, password_hash VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
ALTER TABLE order_items ADD CONSTRAINT FK_62809DB08D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id);
ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AB2A824D8 FOREIGN KEY (tax_id) REFERENCES taxes (id);
ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA76ED395 FOREIGN KEY (user_id) REFERENCES users (id);
CREATE INDEX IDX_E52FFDEEA76ED395 ON orders (user_id);
ALTER TABLE order_items ADD CONSTRAINT FK_62809DB06E48E3E9 FOREIGN KEY (product_id) REFERENCES products (id);
CREATE UNIQUE INDEX UNIQ_62809DB06E48E3E9 ON order_items (product_id);

insert into taxes (name, tax) values ('19%', 19);
insert into taxes (name, tax) values ('11%', 11);

insert into products (id, name, color, image, price, tax_id) values (5, 'Tea - English Breakfast', 'Red', 'http://dummyimage.com/150x150.png/dddddd/000000', 410438, 1);
insert into products (id, name, color, image, price, tax_id) values (6, 'Bagel - 12 Grain Preslice', 'Puce', 'http://dummyimage.com/150x150.bmp/dddddd/000000', 169604, 1);
insert into products (id, name, color, image, price, tax_id) values (7, 'Wine - Acient Coast Caberne', 'Red', 'http://dummyimage.com/150x150.png/5fa2dd/ffffff', 425085, 1);
insert into products (id, name, color, image, price, tax_id) values (8, 'Wine - Guy Sage Touraine', 'Violet', 'http://dummyimage.com/150x150.png/cc0000/ffffff', 55706, 1);
insert into products (id, name, color, image, price, tax_id) values (9, 'Appetizer - Shrimp Puff', 'Red', 'http://dummyimage.com/150x150.png/5fa2dd/ffffff', 103369, 1);
insert into products (id, name, color, image, price, tax_id) values (10, 'Sausage - Blood Pudding', 'Red', 'http://dummyimage.com/150x150.png/cc0000/ffffff', 105300, 2);
insert into products (id, name, color, image, price, tax_id) values (11, 'Glass Clear 7 Oz Xl', 'Red', 'http://dummyimage.com/150x150.jpg/ff4444/ffffff', 6425, 2);
insert into products (id, name, color, image, price, tax_id) values (12, 'Garlic - Primerba, Paste', 'Red', 'http://dummyimage.com/150x150.bmp/ff4444/ffffff', 153714, 2);
insert into products (id, name, color, image, price, tax_id) values (13, 'Sprouts - Onion', 'Yellow', 'http://dummyimage.com/150x150.bmp/dddddd/000000', 80793, 1);
insert into products (id, name, color, image, price, tax_id) values (14, 'Sultanas', 'Red', 'http://dummyimage.com/150x150.bmp/ff4444/ffffff', 119605, 2);
insert into products (id, name, color, image, price, tax_id) values (15, 'Table Cloth 54x54 Colour', 'Red', 'http://dummyimage.com/150x150.bmp/cc0000/ffffff', 492471, 1);
insert into products (id, name, color, image, price, tax_id) values (16, 'Tomatoes - Hot House', 'Red', 'http://dummyimage.com/150x150.png/ff4444/ffffff', 479428, 2);
insert into products (id, name, color, image, price, tax_id) values (17, 'Otomegusa Dashi Konbu', 'Aquamarine', 'http://dummyimage.com/150x150.bmp/dddddd/000000', 417335, 2);
insert into products (id, name, color, image, price, tax_id) values (18, 'Wine - Mas Chicet Rose, Vintage', 'Pink', 'http://dummyimage.com/150x150.png/dddddd/000000', 109210, 2);
insert into products (id, name, color, image, price, tax_id) values (19, 'Teriyaki Sauce', 'Pink', 'http://dummyimage.com/150x150.png/5fa2dd/ffffff', 378511, 2);
insert into products (id, name, color, image, price, tax_id) values (20, 'Veal - Nuckle', 'Violet', 'http://dummyimage.com/150x150.png/ff4444/ffffff', 337446, 2);
insert into products (id, name, color, image, price, tax_id) values (21, 'Cake - Pancake', 'Pink', 'http://dummyimage.com/150x150.png/cc0000/ffffff', 442573, 2);
insert into products (id, name, color, image, price, tax_id) values (22, 'Tortillas - Flour, 12', 'Crimson', 'http://dummyimage.com/150x150.jpg/5fa2dd/ffffff', 225532, 2);
insert into products (id, name, color, image, price, tax_id) values (23, 'Lettuce Romaine Chopped', 'Blue', 'http://dummyimage.com/150x150.png/cc0000/ffffff', 108771, 1);
insert into products (id, name, color, image, price, tax_id) values (24, 'Appetizer - Seafood Assortment', 'Red', 'http://dummyimage.com/150x150.png/5fa2dd/ffffff', 566243, 1);
insert into products (id, name, color, image, price, tax_id) values (25, 'Beef - Top Butt Aaa', 'Khaki', 'http://dummyimage.com/150x150.bmp/5fa2dd/ffffff', 357095, 1);
insert into products (id, name, color, image, price, tax_id) values (26, 'Cookie Dough - Chunky', 'Red', 'http://dummyimage.com/150x150.png/cc0000/ffffff', 403377, 1);
insert into products (id, name, color, image, price, tax_id) values (27, 'Beer - Molson Excel', 'Crimson', 'http://dummyimage.com/150x150.png/5fa2dd/ffffff', 116857, 2);
insert into products (id, name, color, image, price, tax_id) values (28, 'Cakes Assorted', 'Khaki', 'http://dummyimage.com/150x150.png/cc0000/ffffff', 445945, 1);
insert into products (id, name, color, image, price, tax_id) values (29, 'Wine - Red, Mouton Cadet', 'Maroon', 'http://dummyimage.com/150x150.jpg/cc0000/ffffff', 58558, 1);
insert into products (id, name, color, image, price, tax_id) values (30, 'Wine - Redchard Merritt', 'Red', 'http://dummyimage.com/150x150.png/cc0000/ffffff', 562494, 1);
insert into products (id, name, color, image, price, tax_id) values (31, 'Onions - Dried, Chopped', 'Puce', 'http://dummyimage.com/150x150.bmp/5fa2dd/ffffff', 332938, 2);
insert into products (id, name, color, image, price, tax_id) values (32, 'Strawberries', 'Red', 'http://dummyimage.com/150x150.bmp/5fa2dd/ffffff', 460793, 2);
insert into products (id, name, color, image, price, tax_id) values (33, 'Pie Shells 10', 'Teal', 'http://dummyimage.com/150x150.bmp/5fa2dd/ffffff', 431655, 2);
insert into products (id, name, color, image, price, tax_id) values (34, 'Cranberry Foccacia', 'Red', 'http://dummyimage.com/150x150.png/dddddd/000000', 201854, 1);
insert into products (id, name, color, image, price, tax_id) values (35, 'Pasta - Ravioli', 'Khaki', 'http://dummyimage.com/150x150.bmp/ff4444/ffffff', 564219, 2);
insert into products (id, name, color, image, price, tax_id) values (36, 'Wine - White, Schroder And Schyl', 'Orange', 'http://dummyimage.com/150x150.bmp/dddddd/000000', 372205, 2);
insert into products (id, name, color, image, price, tax_id) values (37, 'Mace', 'Red', 'http://dummyimage.com/150x150.png/5fa2dd/ffffff', 84023, 2);
insert into products (id, name, color, image, price, tax_id) values (38, 'Compound - Mocha', 'Red', 'http://dummyimage.com/150x150.png/ff4444/ffffff', 340611, 1);
insert into products (id, name, color, image, price, tax_id) values (39, 'Flour - Cake', 'Maroon', 'http://dummyimage.com/150x150.jpg/dddddd/000000', 229164, 2);
insert into products (id, name, color, image, price, tax_id) values (40, 'Icecream - Dibs', 'Crimson', 'http://dummyimage.com/150x150.bmp/dddddd/000000', 580927, 1);
insert into products (id, name, color, image, price, tax_id) values (41, 'Brandy - Orange, Mc Guiness', 'Red', 'http://dummyimage.com/150x150.bmp/5fa2dd/ffffff', 327120, 1);
insert into products (id, name, color, image, price, tax_id) values (42, 'Beef - Tenderloin', 'Red', 'http://dummyimage.com/150x150.bmp/ff4444/ffffff', 178068, 1);
insert into products (id, name, color, image, price, tax_id) values (43, 'Yoplait - Strawbrasp Peac', 'Blue', 'http://dummyimage.com/150x150.png/ff4444/ffffff', 240842, 2);
insert into products (id, name, color, image, price, tax_id) values (44, 'Contreau', 'Red', 'http://dummyimage.com/150x150.jpg/5fa2dd/ffffff', 503792, 1);
insert into products (id, name, color, image, price, tax_id) values (45, 'Beef - Tenderloin - Aa', 'Violet', 'http://dummyimage.com/150x150.png/5fa2dd/ffffff', 537733, 2);
insert into products (id, name, color, image, price, tax_id) values (46, 'Towel - Roll White', 'Aquamarine', 'http://dummyimage.com/150x150.bmp/ff4444/ffffff', 553196, 1);
insert into products (id, name, color, image, price, tax_id) values (47, 'Sugar - Monocystal / Rock', 'Aquamarine', 'http://dummyimage.com/150x150.png/ff4444/ffffff', 309882, 2);
insert into products (id, name, color, image, price, tax_id) values (48, 'Pepsi - 600ml', 'Orange', 'http://dummyimage.com/150x150.jpg/dddddd/000000', 419935, 2);
insert into products (id, name, color, image, price, tax_id) values (49, 'Extract - Almond', 'Khaki', 'http://dummyimage.com/150x150.jpg/ff4444/ffffff', 50420, 2);
insert into products (id, name, color, image, price, tax_id) values (50, 'Flavouring - Rum', 'Red', 'http://dummyimage.com/150x150.png/dddddd/000000', 175440, 2);
insert into products (id, name, color, image, price, tax_id) values (51, 'Lettuce - Red Leaf', 'Violet', 'http://dummyimage.com/150x150.jpg/cc0000/ffffff', 183604, 1);
insert into products (id, name, color, image, price, tax_id) values (52, 'Lettuce - Sea / Sea Asparagus', 'Red', 'http://dummyimage.com/150x150.bmp/ff4444/ffffff', 419095, 1);
insert into products (id, name, color, image, price, tax_id) values (53, 'Pork - Bacon,back Peameal', 'Red', 'http://dummyimage.com/150x150.bmp/dddddd/000000', 335606, 1);
insert into products (id, name, color, image, price, tax_id) values (54, 'C - Plus, Orange', 'Red', 'http://dummyimage.com/150x150.png/ff4444/ffffff', 424968, 2);
insert into products (id, name, color, image, price, tax_id) values (55, 'Gelatine Leaves - Bulk', 'Maroon', 'http://dummyimage.com/150x150.bmp/ff4444/ffffff', 574849, 1);
insert into products (id, name, color, image, price, tax_id) values (56, 'Beer - Camerons Auburn', 'Aquamarine', 'http://dummyimage.com/150x150.jpg/dddddd/000000', 560201, 2);
insert into products (id, name, color, image, price, tax_id) values (57, 'Ham - Black Forest', 'Yellow', 'http://dummyimage.com/150x150.jpg/ff4444/ffffff', 14176, 2);
insert into products (id, name, color, image, price, tax_id) values (58, 'Lid - 10,12,16 Oz', 'Pink', 'http://dummyimage.com/150x150.jpg/5fa2dd/ffffff', 259940, 2);
insert into products (id, name, color, image, price, tax_id) values (59, 'Mushroom - Shitake, Dry', 'Red', 'http://dummyimage.com/150x150.png/5fa2dd/ffffff', 290854, 2);
insert into products (id, name, color, image, price, tax_id) values (60, 'Grouper - Fresh', 'Blue', 'http://dummyimage.com/150x150.png/5fa2dd/ffffff', 486112, 1);
insert into products (id, name, color, image, price, tax_id) values (61, 'Anchovy Paste - 56 G Tube', 'Pink', 'http://dummyimage.com/150x150.jpg/cc0000/ffffff', 312955, 2);
insert into products (id, name, color, image, price, tax_id) values (62, 'Foie Gras', 'Khaki', 'http://dummyimage.com/150x150.bmp/5fa2dd/ffffff', 276534, 2);
insert into products (id, name, color, image, price, tax_id) values (63, 'Duck - Legs', 'Teal', 'http://dummyimage.com/150x150.bmp/ff4444/ffffff', 472598, 2);
insert into products (id, name, color, image, price, tax_id) values (64, 'Chicken Thigh - Bone Out', 'Orange', 'http://dummyimage.com/150x150.jpg/cc0000/ffffff', 223064, 1);
insert into products (id, name, color, image, price, tax_id) values (65, 'Ginger - Crystalized', 'Red', 'http://dummyimage.com/150x150.jpg/cc0000/ffffff', 512837, 1);
insert into products (id, name, color, image, price, tax_id) values (66, 'Vaccum Bag 10x13', 'Blue', 'http://dummyimage.com/150x150.jpg/ff4444/ffffff', 226307, 2);
insert into products (id, name, color, image, price, tax_id) values (67, 'Cornstarch', 'Red', 'http://dummyimage.com/150x150.bmp/5fa2dd/ffffff', 404212, 1);
insert into products (id, name, color, image, price, tax_id) values (68, 'Wine - Manischewitz Concord', 'Purple', 'http://dummyimage.com/150x150.bmp/5fa2dd/ffffff', 344615, 1);
insert into products (id, name, color, image, price, tax_id) values (69, 'Water - Perrier', 'Orange', 'http://dummyimage.com/150x150.jpg/dddddd/000000', 1900, 2);

