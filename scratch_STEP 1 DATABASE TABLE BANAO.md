STEP 1: DATABASE TABLE BANAO

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`sql

CREATE TABLE IF NOT EXISTS city\_prayer\_content (

id INT AUTO\_INCREMENT PRIMARY KEY,

city\_slug VARCHAR(100) NOT NULL UNIQUE,

city\_name VARCHAR(100) NOT NULL,

country VARCHAR(50) NOT NULL DEFAULT 'Pakistan',

country\_code CHAR(2) NOT NULL DEFAULT 'PK',

\-- Article content (unique per city, 300-400 words)

article\_en TEXT NOT NULL,

article\_urdu TEXT,

\-- City Islamic info

famous\_mosques JSON COMMENT '\["Masjid X","Masjid Y"\]',

islamic\_history TEXT NOT NULL,

\-- Country-specific notes

calculation\_note TEXT,

eid\_prayer\_note TEXT,

jummah\_note TEXT,

special\_note TEXT COMMENT 'e.g. Dawateislami for Karachi, Awqaf for Dubai',

created\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP,

updated\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP ON UPDATE CURRENT\_TIMESTAMP,

INDEX idx\_slug (city\_slug),

INDEX idx\_country (country\_code)

) ENGINE=InnoDB CHARSET=utf8mb4;

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

