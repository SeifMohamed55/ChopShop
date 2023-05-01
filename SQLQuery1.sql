create table user_type(
	ID int primary key ,
	[type] nvarchar(15)
)
create table [user](
	ID int primary key identity(1,1),
	email nvarchar(50),
	[password] nvarchar(70),
	fname nvarchar(30),
	lname nvarchar(30),
	ban_state int,
	user_type int references user_type(ID),
	phone_num nvarchar(20)
)
create table followed_sellers(
	[user_id] int references [user](id),
	[seller_id] int references [user](id),
	primary key ([user_id],seller_id)
)

create table product (
	barcode nvarchar(50) primary key,
	prod_name nvarchar(50),
	add_date DATE,
	price float,
	quantity int,
	[description] nvarchar(300),
	auction_duration date,
	seller_ID int references [user](ID)
)
create table categories(
	ID int primary key identity(1,1),
	category nvarchar(20) NOT NULL UNIQUE
)
create table prod_category(
	barcode nvarchar(50) references product(barcode),
	category nvarchar(20) references categories(category),
	primary key (barcode, category)
)
create table user_wishlists(
	[user_ID] int references [user](ID),
	prod_barcode nvarchar(50) references product(barcode),
	primary key([user_ID], prod_barcode)
)
create table followed_categories(
	[user_ID] int references [user](ID),
	category nvarchar(20) references categories(category)
	primary key([user_ID], category)
)
create table prod_pics(
	prod_barcode nvarchar(50) references product(barcode),
	pic_name nvarchar(100) NOT NULL UNIQUE,
	primary key(prod_barcode, pic_name)
)
create table report_user(
	report_ID int primary key identity(1,1),
	[user_ID] int references [user](ID),
	reported_userID int references [user](ID),
	[description] nvarchar(300)
)
create table [order] (
	order_ID int primary key identity(1,1),
	[user_ID] int references [user](ID),
	buy_date date,
	shipping_address nvarchar(100)
)
create table [order_items](
	prod_barcode nvarchar(50) references product(barcode),
	order_ID int references [order](order_ID),
	primary key (prod_barcode, order_ID)
)
create table feedback(
	feedback_ID int primary key identity(1,1),
	[user_ID] int references [user](ID),
	prod_barcode nvarchar(50) references product(barcode),
	feedback_rating int,
	[description] nvarchar(300)
)
create table payment(
	pay_ID int primary key identity(1,1),
	[user_ID] int references [user](ID),
	order_ID int references [order](order_ID),
	pay_method nvarchar(30),
	pay_status int,
	pay_amount float,
	pay_date date
)
