CREATE TABLE MENU_PAGE (
  PK_MENU_PAGE int(11) NOT NULL,
  MENU_NAME varchar(100) NOT NULL,
  MENU_MAIN varchar(100) NOT NULL,
  MENU_URL varchar(200) NOT NULL,
  MENU_CREATED_BY varchar(100) NOT NULL,
  MENU_CREATED_DATE date NOT NULL,
  MENU_ICON varchar(100) NOT NULL,
  FK_LOOKUP_MENU int(11),
  PRIMARY KEY (PK_MENU_PAGE),
  FOREIGN KEY (FK_LOOKUP_MENU) REFERENCES LOOKUP(PK_LOOKUP)
);