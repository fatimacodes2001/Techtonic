insert into addresses(street_address,city,country,postal_code) values("67 Daisy Road","Rawalpindi","Pakistan",2910);
insert into addresses(street_address,city,country,postal_code) values("69 Palsy Road","New York","USA",2930);
insert into addresses(street_address,city,country,postal_code) values("21 Street 9","Sydney","Austrailia",2110);

insert into users() values("fatima@abc.com","Fatima","Zehra","random",false,1,"path");
insert into users() values("maaz@abc.com","Muhammad","Maaz","random",false,2,"path");

insert into categories(name, description, pic_path) values("Smartphones", "From luxury to necessity", "path");
insert into categories(name, description, pic_path) values("WATCHES", "The essence of time", "path");

insert into product_colors(name, hex) values("Red","#FF0000");
insert into product_colors(name, hex) values("Blue","#0000FF");
insert into product_colors(name, hex) values("Green","#00FF00");

insert into products (name,description,price,color_id,stock_quantity,category_id)values("iPhone 13","Best Phone In the Market",2000,1,22,1);
insert into products (name,description,price,color_id,stock_quantity,category_id)values("HTC Aspire","Best Phone In the Market",2000,1,22,1);
insert into products (name,description,price,color_id,stock_quantity,category_id)values("Rolex Pro","Best Watch Ever",3400,1,24,2);
insert into products (name,description,price,color_id,stock_quantity,category_id)values("Versace Pro","Best Watch in the Mart",3400,1,94,2);

insert into product_specs(spec,product_id) values("5G",1);
insert into product_specs(spec,product_id) values("Dual SIM",1);
insert into product_specs(spec,product_id) values("Quad Core",1);

insert into product_specs(spec,product_id) values("5G",2);
insert into product_specs(spec,product_id) values("Dual SIM",2);
insert into product_specs(spec,product_id) values("Quad Core",2);

insert into product_specs(spec,product_id) values("Gold Plated",3);
insert into product_specs(spec,product_id) values("Digital",3);

insert into cart(customer_email) values ("fatima@abc.com");
insert into cart(customer_email) values ("maaz@abc.com");

insert into cart_has_products (cart_id,product_id,quantity) values (1,1,2);
insert into cart_has_products (cart_id,product_id,quantity) values (1,3,2);
insert into cart_has_products (cart_id,product_id,quantity) values (2,2,3);