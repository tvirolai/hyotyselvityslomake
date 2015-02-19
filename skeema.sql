CREATE TABLE tietueet (                                                                                                                                                                   
    ID INTEGER PRIMARY KEY autoincrement,
    AINEISTO TEXT NOT NULL,
    TAPAUS TEXT NOT NULL,
    OSAKOHTEET TEXT,
    AIKA INTEGER NOT NULL,
    KOMMENTTI TEXT
);