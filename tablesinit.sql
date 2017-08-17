CREATE TABLE news(
    id INT(10) NOT NULL AUTO_INCREMENT,
    time DATETIME,
    content TEXT,
    PRIMARY KEY(id)
);

CREATE TABLE commodities(
    name TEXT,
    current DECIMAL(10, 2),
    difference DECIMAL(10, 2),
    percentage DECIMAL(10, 2),
    description TEXT,
    ovalue DECIMAL(10, 2)
);

CREATE TABLE cryptocurrencies(
    name TEXT,
    current DECIMAL(10, 2),
    difference DECIMAL(10, 2),
    
);

CREATE TABLE stocks(
    name TEXT,
    sector TEXT,
    current DECIMAL(10, 2),
    difference DECIMAL(10, 2),
    percentage DECIMAL(10, 2),
    description TEXT,
    pclose DECIMAL(10, 2),
    ovalue DECIMAL(10, 2),
    dividend DECIMAL(10, 2)
);