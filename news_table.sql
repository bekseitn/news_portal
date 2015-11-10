USE Test;

CREATE TABLE news (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        preview text NOT NULL,
        body text NOT NULL,
		date date NOT NULL,
		count int,
		author varchar(128) NOT NULL,
        PRIMARY KEY (id)
);