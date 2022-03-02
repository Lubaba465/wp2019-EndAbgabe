<?php

try {

$sql = "CREATE TABLE IF NOT EXISTS gc_users (
    userid VARCHAR(50) PRIMARY KEY,
	email VARCHAR(200) NOT NULL,
	fname VARCHAR(50) NOT NULL,
	lname VARCHAR(50) NOT NULL,
	password VARCHAR(255),
	active VARCHAR(1) DEFAULT 'Y' CHECK(active='N' OR active='Y'),
	create_date DATETIME,
    update_date DATETIME
    )";
$conn->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS gc_counties (
        countyid VARCHAR(3) NOT NULL,
        name VARCHAR(100) NOT NULL,
        location VARCHAR(1) CHECK(location='N' OR location='S' OR location='E' OR location='W'),
        PRIMARY KEY (countyid)
    )";
$conn->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS gc_castles (
        castleid INTEGER " . $pk_field . ",
	    userid VARCHAR(50) NOT NULL,
        name VARCHAR(255) NOT NULL,
        description VARCHAR(2000),
        construction_year INTEGER,
        castle_size INTEGER,
        county VARCHAR(2),
        city VARCHAR(100),
        street VARCHAR(100),
        type varchar(20),
        lat float(10,6) DEFAULT NULL,
        lng float(10,6) DEFAULT NULL,
        zipcode VARCHAR(5),
        near_mountain VARCHAR(1) DEFAULT 'N' CHECK(near_mountain='N' OR near_mountain='Y'),
        near_desert VARCHAR(1) DEFAULT 'N' CHECK(near_desert='N' OR near_desert='Y'),
        near_forest VARCHAR(1) DEFAULT 'N' CHECK(near_forest='N' OR near_forest='Y'),
        near_sea VARCHAR(1) DEFAULT 'N' CHECK(near_sea='N' OR near_sea='Y'),
        disabled_access VARCHAR(1) DEFAULT 'N' CHECK(disabled_access='N' OR disabled_access='Y'),
        parking VARCHAR(1) DEFAULT 'N' CHECK(parking='N' OR parking='Y'),
        gastronomy VARCHAR(1) DEFAULT 'N' CHECK(gastronomy='N' OR gastronomy='Y'),
        email VARCHAR(100),
        website VARCHAR(100),
        facebook VARCHAR(100),
        instagram VARCHAR(100),
        twitter VARCHAR(100),
        create_date DATE,
        update_date DATE,
        FOREIGN KEY (county) REFERENCES gc_counties(countyid)
    )";
$conn->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS gc_castle_fotos (
        fotoid INTEGER " . $pk_field . ",
        castleid INTEGER,
    	userid VARCHAR(50),
    	file_name VARCHAR(255), 
        fotodata BLOB,
        mimetype VARCHAR(100),
        upload_on DATE,
		FOREIGN KEY (userid) REFERENCES gc_users(userid)
    )";
$conn->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS gc_castle_videos (
        videoid INTEGER " . $pk_field . ",
        castleid INTEGER NOT NULL,
    	userid VARCHAR(50) NOT NULL,
        url VARCHAR(500),
        FOREIGN KEY (castleid) REFERENCES gc_castles(castleid),
		FOREIGN KEY (userid) REFERENCES gc_users(userid)
    )";
$conn->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS gc_castle_magazin (
        magazinid INTEGER " . $pk_field . ",
        castleid INTEGER,
    	userid VARCHAR(50),
    	magazin_type VARCHAR(1) CHECK(magazin_type='E' OR magazin_type='N'),
    	magazin_name VARCHAR(255),
    	magazin_desc VARCHAR(1000),
        magazin_date DATE,
        url VARCHAR(255),
        active VARCHAR(1) DEFAULT 'Y' CHECK(active='N' OR active='Y'),
        countyid VARCHAR(3),
        city VARCHAR(100),
        create_date DATE,
        update_date DATE,
		FOREIGN KEY (userid) REFERENCES gc_users(userid)
    )";
$conn->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS gc_rating_fotos(
        ratingid INTEGER " . $pk_field . ",
    	userid VARCHAR(50),
        fotoid INTEGER,
        rate INTEGER,
        rating_date DATE,
        update_date DATE,
		FOREIGN KEY (userid) REFERENCES gc_users(userid),
		FOREIGN KEY (fotoid) REFERENCES gc_castle_fotos(fotoid)
    )";
$conn->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS gc_rating_castles(
        ratingid INTEGER " . $pk_field . ",
    	userid VARCHAR(50),
        castleid INTEGER,
        rate INTEGER,
        rating_date DATE,
        update_date DATE,
		FOREIGN KEY (userid) REFERENCES gc_users(userid),
		FOREIGN KEY (castleid) REFERENCES gc_castles(castleid)
    )";
$conn->exec($sql);


$sql = " CREATE TABLE IF NOT EXISTS gc_comments (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
	c_text TEXT NOT NULL,
	name VARCHAR(50) NOT NULL,
	time Date NOT NULL ,
    castleid INTEGER,
    userid VARCHAR(50),
    FOREIGN KEY (userid) REFERENCES gc_users(userid),
	FOREIGN KEY(castleid) REFERENCES gc_castles(castleid)
    )";
$conn->exec($sql);

$sql = " CREATE TABLE IF NOT EXISTS gc_pages (
        page_id INTEGER PRIMARY KEY AUTOINCREMENT,
	page_title VARCHAR(255) NOT NULL, 
	page_desc text  
    )";
$conn->exec($sql);

//    --SQLite Syntax
//    $sql = "INSERT IGNORE INTO gc_counties (countyid, name, location) VALUES
$sql = "INSERT OR IGNORE INTO gc_counties (countyid, name, location) VALUES
            ('BW', 'Baden-Wuerttemberg', 'S'),
            ('BY', 'Bayern', 'S'),
            ('BE', 'Berlin', 'E'),
            ('BB', 'Brandenburg', 'E'),
            ('HB', 'Bremen', 'N'),
            ('HH', 'Hamburg', 'N'),
            ('HE', 'Hessen', 'W'),
            ('MV', 'Mecklenburg-Vorpommern', 'N'),
            ('NI', 'Niedersachsen', 'N'),
            ('NRW', 'Nordrhein-Westfalen', 'W'),
            ('RP', 'Rheinland-Pfalz', 'W'),
            ('SL', 'Saarland', 'W'),
            ('SN', 'Sachsen', 'E'),
            ('ST', 'Sachsen-Anhalt', 'E'),
            ('SH', 'Schleswig-Holstein', 'N'),
            ('TH', 'Thueringen', 'E')
            ";
//$conn->exec($sql);


} catch (PDOException $e) {
    echo $dsn;
    echo 'Fehler: ' . htmlspecialchars($e->getMessage());
    exit();
}

?>