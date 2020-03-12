<!--
Numan Ibn Mazid
NCC ID: 00160542
-->
<?php
//**************************************************SETUP PAGE 00160542_Numan Ibn Mazid**********************************************

	//Include dB connection file
	include_once '../dbCon.php';
	//Create connection object without database name;
	$con = connect(FALSE);

	//SQL to drop database;
	$sqlToCreateDB = "DROP DATABASE IF EXISTS bdguitarzone;";
	if ($con->query($sqlToCreateDB) === TRUE) {
		echo "|bdguitarzone| Database has been Droped Successfully<br><br>";
	} else {
		echo "Error: " . $sqlToCreateDB . "<br>" . $con->error. "<br>";
	}

	//SQL to create database;
	$sqlToCreateDB = "CREATE DATABASE bdguitarzone;";
	if ($con->query($sqlToCreateDB) === TRUE) {
		echo "|bdguitarzone| Database has been Created Successfully<br><br>";
	} else {
		echo "Error: " . $sqlToCreateDB . "<br>" . $con->error. "<br>";
	}
	
	//Creating connection object with database name;
	$con = connect();
	

	//SQL Queries=======================================================================================================================
	


//SQL to create table users***************************************************

	$sql = "CREATE TABLE IF NOT EXISTS `users` (
	  `user_id` int(11) NOT NULL AUTO_INCREMENT,
	  `user_type` int(3) NOT NULL DEFAULT '1' COMMENT '0- Admin, 1-Visitor',
      `name` varchar(20) NOT NULL,
	  `lName` varchar(30) NOT NULL,	  	  
	  `gender` varchar(3) NOT NULL,
	  `age` date NOT NULL,
	  `address` varchar(100) NOT NULL,
	  `post_cd` varchar(6) NOT NULL,
	  `mobile` varchar(11) NOT NULL,
	  `more` LONGTEXT,
	  `email` varchar(60) NOT NULL,	  
	  `password` varchar(25) NOT NULL,
	  `code` varchar(25) NOT NULL,
	PRIMARY KEY (`user_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;";

	if ($con->query($sql) === TRUE) {
		echo "---|users| Table has been Created Successfully<br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}
	

	$sql = "INSERT INTO `bdguitarzone`.`users` 
	(name, user_type, email, password,code) 
	VALUES 
	('ADMIN', '0', 'admin@bdguitarzone.com', 'admin123','xyz00160542');";

	if ($con->query($sql) === TRUE) {
		echo "----------user |admin| has been Created Successfully ******************ADMIN 1****************<br><br>
		----------------------------------------------------------------------------------- Email: [admin@bdguitarzone.com] ---  Password: [admin123]<br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}
	
	
	$sql = "INSERT INTO `bdguitarzone`.`users` 
	(user_type,name,lName,gender,age,address,post_cd,mobile,more,email,password) 
	VALUES 
	('1', 'Numan', 'Ibn Mazid',  'M', '1994-01-25', 'Kalabagan,Dhaka,Bangladesh', '1205', '01685238317', 'Hi, I am Numan Ibn Mazid', 'numanworkstation@gmail.com', '12345');";

	if ($con->query($sql) === TRUE) {
		echo "----------user |Numan| has been Created Successfully<br><br>
		----------------------------------------------------------------------------------- Email: [numanworkstation@gmail.com] ---  Password: [12345]<br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}
	

	$sql = "INSERT INTO `bdguitarzone`.`users` 
	(user_type,lName,name,gender,age,address,post_cd,mobile,more,email,password) 
	VALUES 
	('1', 'Mazid', 'Mazid', 'M', '1989-06-22', 'Manikganj Sadar', '1800', '01718635336', 'Hi, I am Abdul Mazid', 'mazid@gmail.com', '12345');";

	if ($con->query($sql) === TRUE) {
		echo "----------user |Mazid| has been Created Successfully<br><br>
		----------------------------------------------------------------------------------- Email: [mazid@gmail.com] ---  Password: [12345]<br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}


	$sql = "INSERT INTO `bdguitarzone`.`users` 
	(user_type,lName,name,gender,age,address,post_cd,mobile,more,email,password,code) 
	VALUES 
	('0', 'GuitarZone', 'BD', 'O', '1999-09-19', 'Bangladesh', '0000', '00000000000', 'Hi, I am Admin2', 'bdguitarzone@gmail.com', 'admin123','xyz00160542');";

	if ($con->query($sql) === TRUE) {
		echo "----------user |BDguitarZone| has been Created Successfully ***********************ADMIN 2**************<br><br>
		----------------------------------------------------------------------------------- Email: [bdguitarzone@gmail.com] ---  Password: [admin123]<br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}
	
	//************************************************************************************************

		//SQL to create table 'category'
	$sql = "CREATE TABLE IF NOT EXISTS `category` (
	 `cat_id` int(11) NOT NULL AUTO_INCREMENT,
	 `cat_name` varchar(30) NOT NULL,
	 `cat_image` varchar(150) NOT NULL,
	PRIMARY KEY (`cat_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;";

	if ($con->query($sql) === TRUE) {
		echo "---|category| Table has been Created Successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}


	//sql to insert into category
	$sql = "INSERT INTO `bdguitarzone`.`category` 
		(`cat_id`, `cat_name`, `cat_image`) VALUES
			(101, 'Electric Guitar', 'electric.png'),
			(102, 'Acoustic Guitar', 'acoustic.png'),
			(103, 'Bass Guitar', 'bass.png'),
			(104, 'Guitalele', 'guitalele.png'),
			(105, 'Classical Guitar', 'classical.png'),
			(106, 'Ukulele', 'ukulele.png');";

	if ($con->query($sql) === TRUE) {
		echo "----------|category values| has been inserted Successfully<br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}

	//************************************************************************************************	

		//************************************************************************************************

		//SQL to create table 'brand'
	$sql = "CREATE TABLE IF NOT EXISTS `brand` (
	 `brand_id` int(11) NOT NULL AUTO_INCREMENT,
	 `brand_name` varchar(30) NOT NULL,
	 `brand_image` varchar(150) NOT NULL,
	 `brand_description` LONGTEXT,
	PRIMARY KEY (`brand_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;";

	if ($con->query($sql) === TRUE) {
		echo "---|brand| Table has been Created Successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}


	//sql to insert into brand
	$sql = "INSERT INTO `bdguitarzone`.`brand` 
		(`brand_id`, `brand_name`, `brand_image`, `brand_description`) VALUES
			(101, 'Ibanez', 'Ibanez GRG121EXSM.png', 'Ibanez guitars are great'),
			(102, 'Ovation', 'Ovation Celebrity Elite Plus CE44P-8TQ.png', 'Ovation guitars are great'),
			(103, 'Taylor', 'Taylor-814ce.png', 'Taylor guitars are great'),
			(104, 'Yamaha', 'Yamaha TRBX304 4-String.png', 'Yamaha guitars are great'),
			(105, 'Luna', 'Luna Tattoo Concert.png', 'Luna Ukuleles are great');";

	if ($con->query($sql) === TRUE) {
		echo "----------|brand values| has been inserted Successfully<br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}

	//************************************************************************************************

		//SQL to create table 'product'
	$sql = "CREATE TABLE IF NOT EXISTS `product` (
	 `product_id` int(11) NOT NULL AUTO_INCREMENT,
	 `product_name` varchar(100) NOT NULL,
  	 `brands` int(11) NOT NULL,
  	 `cat` int(11) NOT NULL,
	 `product_price` float(8,2) NOT NULL,
	 `product_image` varchar(150) NOT NULL,
	 `product_video` LONGTEXT,
	 `product_description` LONGTEXT,
	 `stock_quantity` int(10) NOT NULL,
	PRIMARY KEY (`product_id`),
	FOREIGN KEY (`brands`) REFERENCES `brand` (`brand_id`)
	ON UPDATE CASCADE
    ON DELETE CASCADE,
    FOREIGN KEY (cat) REFERENCES category(cat_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;";

	if ($con->query($sql) === TRUE) {
		echo "---|product| Table has been Created Successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}


		//sql to insert into product
	$sql = "INSERT INTO `bdguitarzone`.`product` 
		(`product_id`, `product_name`, `brands`, `cat`, `product_price`, `product_image`, `product_video`, `product_description`, `stock_quantity`) VALUES
			(101, 'IBANEZ GRGR121EX', 101, 101, 98089.55, 'Ibanez GRG121EXSM.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/PkXt7HDyL6Q\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'As an industry leader in the use of exotic tonewoods, Ibanez continues to innovate with their new AEW Series. This fresh approach is manifest in the AEW40AS-NT, with a figured ash top, back and sides', 20),
			(102, 'Ovation Celebrity Elite Plus CE44P-8TQ', 102, 102, 49027.33, 'Ovation Celebrity Elite Plus CE44P-8TQ.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/VFOEVimhB04\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'The Lyrachord body is a durable, lightweight alternative to wood backs and has a smooth interior surface, specifically designed to enhance the reflections inside your instrument', 15),
			(103, 'Taylor 814ce', 103, 102, 312473.30, 'Taylor-814ce.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/otVpfp7O_p4\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'Like all 800 Series Taylors, the 814ce Grand Auditorium comes with Expression System 2 electronics and ships in a Taylor deluxe hardshell case', 1),
			(104, 'Yamaha TRBX304 4-String', 104, 103, 67008.24, 'Yamaha TRBX304 4-String.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/h-MkOP7Oy-U\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'The TRBX304 is built around a simple principle - your performance. The perfectly balanced, ultra-comfortable solid mahogany body provides the optimum tonal foundation while the Performance EQ active circuitry gives instant access to perfectly dialed-in stage-ready tones coupled with the expressive control you need.', 15),
			(105, 'Luna Tattoo Concert', 105, 106, 21999.76, 'Luna Tattoo Concert.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GDqXHJ5pHkc\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'This Tattoo Concert Uke takes its design from traditional Hawaiian body ornamentation. The designs were monochromatic, tattooed in black against brown skin. The patterns and layout were strongly geometric and there were many shapes and symbols representing the natural island world: stones, waves, fish, sharks, turtles, rain, sun, and birds. This design is based on a Hawaiian turtle (honu), a symbol of longevity and endurance rendered in a Polynesian tattoo style. The fret markers are stylized sharks teeth. This concert uke boasts a clear, resonate sound both by virtue of its Concert body and Mahogany construction. Beautiful sound - tremendous value.', 21),
			(106, 'Ibanez AEW40AS', 101, 102, 37999.32, 'Ibanez AEW40AS.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JKPiR1Xqut0\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>', 'As an industry leader in the use of Exotic tonewoods, Ibanez continues to innovate with their new AEW series. This fresh approach merges a classic Spruce top with an elegant exotic tonewood back-and-sides. The thinner, amplification-friendly body of these new acoustic/electrics make them the perfect choice for gigging singer-songwriters.', 25),
			(107, 'Taylor 412ce-n', 103, 105, 189473.23, 'taylor-412ce-n.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Oil35KBX_m8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'Taylorâ€™s nylon-string models make the distinctive classical sound more accessible to steel-string players with ultra-playable necks and modern features like a cutaway and onboard electronics. The Grand Concert 412ce-N captures African ovangkolâ€™s rosewood-like tone, which pairs well with Sitka spruce and can accommodate a range of playing styles. White binding applies a crisp counterpoint against the all-gloss body, while Taylorâ€™s ES-N pickup brings nylonâ€™s evocative tonal flavors into a clear amplified acoustic sound. The guitar ships in a Taylor deluxe hardshell case.', 7),
			(108, 'Yamaha Guitalele GL1', 104, 104, 7279.76, 'Yamaha Guitalele GL1.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/1atus_kFLGQ\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'Introducing the Yamaha GL1 Guitalele, now officially available for the first time in the USA! Half guitar, half ukuleleâ€¦100% fun. A unique mini 6-string nylon guitar that is sized like a baritone ukulele (17â€ scale) and plays like a standard tune guitar. The guitaleleâ€™s tuning is pitched up to â€œAâ€ (or up a 4th) at A/D/G/C/E/A.', 4),
			(109, 'Yamaha TRBX304 4-String Electric Bass', 104, 103, 28844.60, 'Yamaha TRBX304.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/h-MkOP7Oy-U\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'Giving you access to 5 performance-tuned EQ curves optimized for different performance styles, the pewter TRBX304 4-String Electric Bass from Yamaha has a solid mahogany body with a 5-piece maple/mahogany neck. Its dual ceramic pickups feature a hum-cancelling design to provide clean, noise-free performance while its bass and treble controls help to further shape your sound.', 16),
			(110, 'Luna Athena 501', 105, 101, 41125.33, 'Luna Athena 501.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ezo4sw6qhPE\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'Looking for a great Electric Guitar for Rock, Blues, Rockabilly, Alternative or other? The Athena 501 is a great choice. This full Semi-Hollowbody series has incredible tone and features a Flame maple top, Set V Neck, Rosewood Fret board, Maple Body, Gold Satin Hardware, Dual Humbucking Covered Pickups and a Clear Gloss finish.', 18),
			(111, 'Ibanez EWP14OPN Exotic Wood Piccolo', 101, 104, 15233.82, 'Ibanez EWP14OPN.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/aLsHnVQOVY8\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'Smaller scale instruments have increased in popularity over the past few years, because not only do students seem to be starting younger than ever, but also the easy-to-transport guitar has become recognized as an excellent companion for the weary traveler. From the on-the-go businessperson who needs a guitar that can fit in a planeâ€™s overhead compartment, to the happy wanderer just looking to animate his sojourn with a song, the compact travel guitar can be an uplifting addition to any expedition. \r\nThe EWP14OPN is a 1/3-size, steel string Piccolo acoustic guitar. Similar in scale to a Baritone ukulele (17â€), the EWP14 sports an EW style cutaway body. The top, back, and sides are made of ovangkol, a wood found in Western Africa, known for its beautiful figuring and rosewood-like tone. An Open Pore Natural finish allows the body to resonate more freely for improved tone and projection. Other features include an abalone rosette, rosewood fretboard, bridge and chrome die-cast tuners.', 14),
			(112, 'Taylor 214ce Deluxe Grand Auditorium Cutaway', 103, 102, 107057.73, 'Taylor 214ce Deluxe Grand Auditorium Cutaway.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gQHOPaLzgqw\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 'With a solid Sitka spruce top and layered Indian rosewood back and sides, this Grand Auditorium guitar delivers a rich, nuanced tone profile punctuated by high-end sparkle and midrange punch. The patented Taylor neck and Venetian cutaway provide a comfortable playing experience across a broad range of musical styles, and with an Expression System 2 pickup and preamp highlighting the quality and depth of the guitarâ€™s natural sound, the 214ce DLX is ready to perform in any environment. Itâ€™s appointed with white binding, Italian acrylic Small Diamond inlays, and a full-gloss body, and ships in a deluxe hardshell case.', 0);";

	if ($con->query($sql) === TRUE) {
		echo "----------|product values| has been inserted Successfully<br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}
	

	//************************************************************************************************	


	//SQL to create table 'booking'
	$sql = "CREATE TABLE IF NOT EXISTS `booking` (
	  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
	  `booking_status` varchar(13) DEFAULT 'Pending',
	  `user_id` varchar(100) NOT NULL,
	  `order_total` float(15,2) NOT NULL,
	  `shift` varchar(15) NOT NULL,
	  `gift` varchar(50),
	  `date_of_purchase` date NOT NULL,
	  `name` varchar(20) NOT NULL,
	  `lName` varchar(30) NOT NULL,  
	  `gender` varchar(3) NOT NULL,
	  `age` int(4) NOT NULL,
	  `address` varchar(100) NOT NULL,
	  `post_cd` varchar(10) NOT NULL,
	  `mobile` varchar(11) NOT NULL,
	  `more` LONGTEXT,
	  `email` varchar(60) NOT NULL,	
	PRIMARY KEY (`booking_id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;";

	if ($con->query($sql) === TRUE) {
		echo "---|booking| Table has been Created Successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}


	//sql to insert into booking
	$sql = "INSERT INTO `bdguitarzone`.`booking` 
		(`booking_id`, `booking_status`, `user_id`, `order_total`, `shift`, `gift`, `date_of_purchase`, `name`, `lName`, `gender`, `age`, `address`, `post_cd`, `mobile`, `more`, `email`) VALUES
			(101, 'Pending', '104', 56359.15, 'Evening', 'Capo', '2018-01-12', 'BD', 'GuitarZone', 'O', 100, 'Bangladesh', '0000', '00000000000', 'Hi, I am Admin2', 'bdguitarzone@gmail.com'),
			(102, 'Pending', '103', 118997.26, 'Afternoon', 'Belt', '2018-01-25', 'Abdul', 'Mazid', 'M', 55, 'Manikganj Sadar', '1800', '01718635336', 'Hi, I am Abdul Mazid', 'mazid@gmail.com'),
			(103, 'Pending', '-883534629', 15233.82, 'Afternoon', '0', '2018-01-25', 'Ahmed', 'Atik', 'M', 30, 'Manikganj Sadar Upazilla, Manikganj', '1800', '01564356786', 'Hi, I am Kana', '1000049@daffodil.ac');";

	if ($con->query($sql) === TRUE) {
		echo "----------|booking values| has been inserted Successfully<br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}

	//************************************************************************************************
	


	//SQL to create table 'booking_details'
	$sql = "CREATE TABLE IF NOT EXISTS `booking_details` (
	 `booking_details_id` int(11) NOT NULL AUTO_INCREMENT,
	 `booking_id` int(11) NOT NULL,
	 `product_id` int(11) NOT NULL,
	 `unit_price` float(9,2) NOT NULL,
	 `order_quantity` int(5) NOT NULL,
	 `subtotal` float(15,2) NOT NULL,
	 `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`booking_details_id`),
	FOREIGN KEY (booking_id) REFERENCES booking(booking_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;";

	if ($con->query($sql) === TRUE) {
		echo "---|booking_details| Table has been Created Successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}


	//sql to insert into booking_details
	$sql = "INSERT INTO `bdguitarzone`.`booking_details` 
		(`booking_details_id`, `booking_id`, `product_id`, `unit_price`, `order_quantity`, `subtotal`, `timestamp`) VALUES
			(101, 101, 111, 15233.82, 1, 15233.82, '2018-01-15 22:08:17'),
			(102, 101, 110, 41125.33, 1, 41125.33, '2018-01-15 22:08:18'),
			(103, 102, 110, 41125.33, 1, 41125.33, '2018-01-15 22:09:02'),
			(104, 102, 109, 28844.60, 1, 28844.60, '2018-01-15 22:09:02'),
			(105, 102, 102, 49027.33, 1, 49027.33, '2018-01-15 22:09:02'),
			(106, 103, 111, 15233.82, 1, 15233.82, '2018-01-15 22:10:41');";

	if ($con->query($sql) === TRUE) {
		echo "----------|booking_details values| has been inserted Successfully<br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}

	//************************************************************************************************
?>