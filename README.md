# IT202 Semester Project - Clock

Selected inventory details:
1. Inventory name: `clock`
2. Type 1: `Wall`
3. Type 2: `Digital`
4. Type 3: `Alarm`
5. Column 1: `Style`
6. Column 2: `Power Source`

Common prerequisites:
1. MySQL server running locally.
2. MySQL client available (`mysql --version`).
3. PHP installed (`php -v`).
4. VS Code REST Client extension (for `.http` files in Phase 2).

All SQL, HTML, and PHP source files must include comments with:
1. Student Name
2. Date
3. Course + Section
4. Assignment Name
5. Email

## Phase 1 - Login and Logout

Goal:
1. Create login/logout pages backed by a `clock` database and users table.

Phase 1 required files:
1. `scripts/UsersStatements.sql`
2. `scripts/phasel_backup.sql`
3. `website/database.php`
4. `website/index.php`
5. `website/main.inc.php`
6. `website/validate.inc.php`
7. `website/logout.inc.php`

Phase 1 setup:
```powershell
cd d:\study\hitarth\project\hp627-IT202-Lecture
mysql -u root -p clock -e "source scripts/UsersStatements.sql"
```

Phase 1 run:
```powershell
cd d:\study\hitarth\project\hp627-IT202-Lecture\website
php -S localhost:3000
```

Seed login accounts:
1. `alex@clocks.com` / `BassBoost!123`
2. `riley@clocks.com` / `StudioMix!456`
3. `jordan@clocks.com` / `NoiseCancel!789`

Phase 1 screenshot checklist:
1. `Phase01Assignment_Step01_YOURUCID.png` (login page)
2. `Phase01Assignment_Step02_YOURUCID.png` (user #1 credentials entered)
3. `Phase01Assignment_Step03_YOURUCID.png` (user #1 welcome page)
4. `Phase01Assignment_Step04_YOURUCID.png` (user #2 credentials entered)
5. `Phase01Assignment_Step05_YOURUCID.png` (user #2 welcome page)
6. `Phase01Assignment_Step06_YOURUCID.png` (user #3 credentials entered)
7. `Phase01Assignment_Step07_YOURUCID.png` (user #3 welcome page)
8. `Phase01Assignment_Step08_YOURUCID.png` (invalid credentials entered)
9. `Phase01Assignment_Step09_YOURUCID.png` (sorry/error page)

Phase 1 database export:
```powershell
cd d:\study\hitarth\project\hp627-IT202-Lecture
mysqldump -u root -p clock > scripts\phasel_backup.sql
```

## Phase 2 - CRUD Clock Types and Clocks

Goal:
1. Add full CRUD for `clock_types` and `clocks` using PHP classes and test pages.

Phase 2 required files:
1. `scripts/ClockTypesStatements.sql`
2. `scripts/ClocksStatements.sql`
3. `scripts/crud_clockTypes.http`
4. `scripts/crud_clocks.http`
5. `website/clocktype.php`
6. `website/clock.php`
7. `website/addclocktype.test.php`
8. `website/listclocktypes.test.php`
9. `website/changeclocktype.test.php`
10. `website/removeclocktype.test.php`
11. `website/addclock.test.php`
12. `website/listclocks.test.php`
13. `website/changeclock.test.php`
14. `website/removeclock.test.php`
15. `scripts/clockTypes.sql` (generated export)
16. `scripts/clocks.sql` (generated export)
17. `scripts/clock_phase2_backup.sql` (generated export)

Phase 2 setup:
```powershell
cd d:\study\hitarth\project\hp627-IT202-Lecture
mysql -u root -p clock -e "source scripts/ClockTypesStatements.sql"
mysql -u root -p clock -e "source scripts/ClocksStatements.sql"
```

Phase 2 run:
```powershell
cd d:\study\hitarth\project\hp627-IT202-Lecture\website
php -S localhost:3000
```

Phase 2 test inputs:
1. Run requests from `scripts/crud_clockTypes.http`
2. Run requests from `scripts/crud_clocks.http`

Phase 2 screenshot checklist:
1. `Phase02Assignment_Step01.YOURUCID.png` (create type)
2. `Phase02Assignment_Step02A.YOURUCID.png` (read types page)
3. `Phase02Assignment_Step02B.YOURUCID.png` (`SELECT * FROM clock_types` including `date_time_created`)
4. `Phase02Assignment_Step03.YOURUCID.png` (update type)
5. `Phase02Assignment_Step04A.YOURUCID.png` (read types page)
6. `Phase02Assignment_Step04B.YOURUCID.png` (`SELECT * FROM clock_types` including `date_time_updated`)
7. `Phase02Assignment_Step05.YOURUCID.png` (delete type)
8. `Phase02Assignment_Step06A.YOURUCID.png` (read types page)
9. `Phase02Assignment_Step06B.YOURUCID.png` (`SELECT * FROM clock_types`)
10. `Phase02Assignment_Step07.YOURUCID.png` (create clock)
11. `Phase02Assignment_Step08A.YOURUCID.png` (read clocks page)
12. `Phase02Assignment_Step08B.YOURUCID.png` (`SELECT * FROM clocks` including `date_time_created`)
13. `Phase02Assignment_Step09.YOURUCID.png` (update clock)
14. `Phase02Assignment_Step10A.YOURUCID.png` (read clocks page)
15. `Phase02Assignment_Step10B.YOURUCID.png` (`SELECT * FROM clocks` including `date_time_updated`)
16. `Phase02Assignment_Step11.YOURUCID.png` (delete clock)
17. `Phase02Assignment_Step12A.YOURUCID.png` (read clocks page)
18. `Phase02Assignment_Step12B.YOURUCID.png` (`SELECT * FROM clocks`)

Phase 2 data requirements before export:
1. At least 3 clock types in `clock_types`.
2. At least 15 clocks in `clocks`.
3. Descriptions contain at least 2 full sentences.
4. `clock_buy_price` and `clock_sell_price` must be different for each clock.

Phase 2 database exports:
```powershell
cd d:\study\hitarth\project\hp627-IT202-Lecture
mysqldump -u root -p clock clock_types > scripts\clockTypes.sql
mysqldump -u root -p clock clocks > scripts\clocks.sql
mysqldump -u root -p clock > scripts\clock_phase2_backup.sql
```


