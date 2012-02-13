DROP TABLE IF EXISTS "user";
CREATE TABLE "user" (
	"id"    INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	"root"  INTEGER NOT NULL DEFAULT 0,
	"name"     TEXT NOT NULL,
	"pass"     TEXT NOT NULL,
	"date" DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO "user" VALUES (1, 1, 'et0r', '4d94759c09a4d51a514a9f1866c53ec3', '2012-02-12 22:57:50');

DROP TABLE IF EXISTS "session";
CREATE TABLE "session" (
	"user" INTEGER NOT NULL REFERENCES "user"("id") ON UPDATE CASCADE ON DELETE CASCADE PRIMARY KEY UNIQUE ON CONFLICT REPLACE,
	"uuid"    TEXT NOT NULL
)