create table gc_counties
(
    countyid VARCHAR(3)   not null
        primary key,
    name     VARCHAR(100) not null,
    location VARCHAR(1),
    check (location = 'N' OR location = 'S' OR location = 'E' OR location = 'W')
);

create table gc_castles
(
    castleid          INTEGER
        primary key autoincrement,
    userid            VARCHAR(50)  not null,
    name              VARCHAR(255) not null,
    description       VARCHAR(2000),
    construction_year INTEGER,
    castle_size       INTEGER,
    county            VARCHAR(2)
        references gc_counties,
    street            VARCHAR(100),
    zipcode           VARCHAR(5),
    near_mountain     VARCHAR(1)   default 'N',
    near_desert       VARCHAR(1)   default 'N',
    near_forest       VARCHAR(1)   default 'N',
    near_sea          VARCHAR(1)   default 'N',
    disabled_access   VARCHAR(1)   default 'N',
    parking           VARCHAR(1)   default 'N',
    gastronomy        VARCHAR(1)   default 'N',
    email             VARCHAR(100),
    website           VARCHAR(100),
    facebook          VARCHAR(100),
    instagram         VARCHAR(100),
    twitter           VARCHAR(100),
    create_date       DATE,
    update_date       DATE,
    city              varchar(100),
    type              varchar(20),
    lat               float(10, 6) default NULL,
    lng               float(10, 6) default NULL,
    check (disabled_access = 'N' OR disabled_access = 'Y'),
    check (gastronomy = 'N' OR gastronomy = 'Y'),
    check (near_desert = 'N' OR near_desert = 'Y'),
    check (near_forest = 'N' OR near_forest = 'Y'),
    check (near_mountain = 'N' OR near_mountain = 'Y'),
    check (near_sea = 'N' OR near_sea = 'Y'),
    check (parking = 'N' OR parking = 'Y')
);

create table gc_pages
(
    page_id    INTEGER
        primary key autoincrement,
    page_title VARCHAR(255) not null,
    page_desc  text
);

create table gc_users
(
    userid   VARCHAR(50)
        primary key,
    email    VARCHAR(200) not null,
    fname    VARCHAR(50)  not null,
    lname    VARCHAR(50)  not null,
    password VARCHAR(255)
);

create table gc_castle_fotos
(
    fotoid    INTEGER
        primary key autoincrement,
    castleid  INTEGER,
    userid    VARCHAR(50)
        references gc_users,
    file_name VARCHAR(255),
    fotodata  BLOB,
    mimetype  VARCHAR(100),
    upload_on DATE,
    is_main   varchar(1) default 'N',
    check (is_main == 'N' or is_main == 'Y')
);

create table gc_castle_magazin
(
    magazinid    INTEGER
        primary key autoincrement,
    castleid     INTEGER,
    userid       VARCHAR(50)
        references gc_users,
    magazin_type VARCHAR(1),
    magazin_name VARCHAR(255),
    magazin_desc VARCHAR(1000),
    magazin_date DATE,
    url          VARCHAR(255),
    active       VARCHAR(1) default 'Y',
    countyid     VARCHAR(3),
    city         VARCHAR(100),
    create_date  date,
    update_date  date,
    check (active = 'N' OR active = 'Y'),
    check (magazin_type = 'E' OR magazin_type = 'N')
);

create table gc_castle_videos
(
    videoid  INTEGER
        primary key autoincrement,
    castleid INTEGER     not null
        references gc_castles,
    userid   VARCHAR(50) not null
        references gc_users,
    url      VARCHAR(500)
);

create table gc_comments
(
    id       INTEGER
        primary key autoincrement,
    c_text   TEXT        not null,
    name     VARCHAR(50) not null,
    time     Date        not null,
    castleid INTEGER
        references gc_castles,
    userid   VARCHAR(20)
        references gc_users
);

create table gc_rating_castles
(
    ratingid    INTEGER
        primary key autoincrement,
    userid      VARCHAR(50)
        references gc_users,
    castleid    INTEGER
        references gc_castles,
    rate        INTEGER,
    rating_date DATE,
    update_date DATE
);

create table gc_rating_fotos
(
    ratingid    INTEGER
        primary key autoincrement,
    userid      VARCHAR(50)
        references gc_users,
    fotoid      INTEGER
        references gc_castle_fotos,
    rate        INTEGER,
    rating_date DATE,
    update_date DATE
);


