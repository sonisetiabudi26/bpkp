CREATE TABLE users (
  PK_USER int(11) NOT NULL,
  USER_NAME varchar(50) NOT NULL,
  USER_PASSWORD varchar(50) NOT NULL,
  FK_LOOKUP_ROLE int(11) NOT NULL,
  PRIMARY KEY (PK_USER),
  FOREIGN KEY (FK_LOOKUP_ROLE) REFERENCES LOOKUP(PK_LOOKUP)
)