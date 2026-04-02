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
5. On Mac, install missing tools with Homebrew if needed:
   `brew install php`
   `brew install mysql`

All SQL, HTML, and PHP source files must include comments with:
1. Student Name
2. Date
3. Course + Section
4. Assignment Name
5. Email

## Current Phase 4 State

Current repo state for the semester project:
1. Inventory name: `clock`
2. Three required categories exist as `clock_types`
3. Fifteen required items exist as `clocks`
4. Phase 4 website styling is served from `website/ih_styles.css`
5. Local images and favicon are in `website/images`
6. A ready-to-import phase 4 database backup is in `scripts/clock_phase4_backup.sql`
7. A full screenshot walkthrough is in `../phase4_submission_checklist.md`

Mac quick start:
```bash
cd /path/to/project/hp627-IT202-Lecture
mysql -u root -p < scripts/clock_phase4_backup.sql
cd website
php -S localhost:3000
```

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

## Phase 3 - HTML Website Layout

Goal:
1. Build a full phase 3 clock website layout with login, navigation, type pages, clock pages, search pages, and update workflow.

Phase 3 required files:
1. `website/index.php`
2. `website/header.inc.php`
3. `website/nav.inc.php`
4. `website/footer.inc.php`
5. `website/main.inc.php`
6. `website/validate.inc.php`
7. `website/logout.inc.php`
8. `website/clocktype.php`
9. `website/clock.php`
10. `website/listclocktypes.inc.php`
11. `website/newclocktype.inc.php`
12. `website/addclocktype.inc.php`
13. `website/displayclocktype.inc.php`
14. `website/listclocks.inc.php`
15. `website/newclock.inc.php`
16. `website/addclock.inc.php`
17. `website/updateclock.inc.php`
18. `website/changeclock.inc.php`
19. `phase3_submission_checklist.md`
20. `scripts/clock_phase3_backup.sql` (generated export)

Phase 3 setup:
```powershell
cd d:\study\hitarth\project\hp627-IT202-Lecture
mysql -u root -p clock -e "source scripts/UsersStatements.sql"
mysql -u root -p clock -e "source scripts/ClockTypesStatements.sql"
mysql -u root -p clock -e "source scripts/ClocksStatements.sql"
```

Phase 3 run:
```powershell
cd d:\study\hitarth\project\hp627-IT202-Lecture\website
php -S localhost:3000
```

Phase 3 test and verify:
1. Log in with a seed user and confirm the welcome page shows navigation links.
2. Open `List Clock Types` and verify the dropdown renders correctly.
3. Open `Add New Clock Type` and test empty and non-numeric `clockTypeID` validation.
4. Add a valid clock type and confirm the success message appears.
5. Open `List Clocks` and verify the dropdown renders correctly with formatted prices.
6. Open `Add New Clock` and test empty and non-numeric `clockID` validation.
7. Test invalid `clockTypeID` handling on the add clock form.
8. Add a valid clock and confirm the success message appears.
9. Use the clock search form and verify empty, non-numeric, and missing ID errors.
10. Search for an existing clock ID and verify the update form loads.
11. Select `Cancel` on the update form and verify the cancellation message appears.
12. Update an existing clock and verify the new value appears in `List Clocks`.
13. Use the clock type search form and verify empty, non-numeric, and missing ID errors.
14. Search for an existing clock type ID and verify the matching clocks appear.

Phase 3 screenshot checklist:
1. `Phase03Assignment_Step01.YOURUCID.png` (login page)
2. `Phase03Assignment_Step02.YOURUCID.png` (login page with email and password entered)
3. `Phase03Assignment_Step03.YOURUCID.png` (welcome page with navigation links)
4. `Phase03Assignment_Step04A.YOURUCID.png` (add new clock type form before submit)
5. `Phase03Assignment_Step04B.YOURUCID.png` (successful add clock type message)
6. `Phase03Assignment_Step05.YOURUCID.png` (list clock types)
7. `Phase03Assignment_Step06A.YOURUCID.png` (add new clock form before submit)
8. `Phase03Assignment_Step06B.YOURUCID.png` (successful add clock message)
9. `Phase03Assignment_Step07.YOURUCID.png` (list clocks showing the new clock)
10. `Phase03Assignment_Step08A.YOURUCID.png` (search for clock before find)
11. `Phase03Assignment_Step08B.YOURUCID.png` (update page showing clock data)
12. `Phase03Assignment_Step08C.YOURUCID.png` (edited clock values before update)
13. `Phase03Assignment_Step08D.YOURUCID.png` (successful clock update message)
14. `Phase03Assignment_Step09.YOURUCID.png` (list clocks showing the updated clock)
15. `Phase03Assignment_Step10A.YOURUCID.png` (search for clock type before find)
16. `Phase03Assignment_Step10B.YOURUCID.png` (clock type page showing matching clocks)

Phase 3 data requirements before export:
1. At least 3 clock types exist in `clock_types`.
2. Clock descriptions contain at least 2 full sentences.
3. `clock_buy_price` and `clock_sell_price` must be different for each clock.
4. Visible prices must be formatted with commas and 2 decimal places.

Phase 3 database export:
```powershell
cd d:\study\hitarth\project\hp627-IT202-Lecture
mysqldump -u root -p clock > scripts\clock_phase3_backup.sql
```

## Phase 4 - Input Security and CSS Styling

Goal:
1. Upgrade the phase 3 clock website with safer input handling, HTML validation, external CSS styling, image assets, and a phase 4 database backup.

Phase 4 required files:
1. `website/index.php`
2. `website/header.inc.php`
3. `website/nav.inc.php`
4. `website/main.inc.php`
5. `website/footer.inc.php`
6. `website/validate.inc.php`
7. `website/newclocktype.inc.php`
8. `website/addclocktype.inc.php`
9. `website/listclocktypes.inc.php`
10. `website/newclock.inc.php`
11. `website/addclock.inc.php`
12. `website/listclocks.inc.php`
13. `website/updateclock.inc.php`
14. `website/changeclock.inc.php`
15. `website/displayclocktype.inc.php`
16. `website/ih_styles.css`
17. `website/images/logo.svg`
18. `website/images/clock-showcase.svg`
19. `website/images/favicon.svg`
20. `scripts/clock_phase4_backup.sql`
21. `../phase4_submission_checklist.md`

Phase 4 setup:
```bash
cd /path/to/project/hp627-IT202-Lecture
mysql -u root -p < scripts/clock_phase4_backup.sql
```

Phase 4 run:
```bash
cd /path/to/project/hp627-IT202-Lecture/website
php -S localhost:3000
```

Phase 4 login accounts:
1. `alex@clocks.com` / `BassBoost!123`
2. `riley@clocks.com` / `StudioMix!456`
3. `jordan@clocks.com` / `NoiseCancel!789`

Phase 4 data included in `clock_phase4_backup.sql`:
1. 3 clock types:
   `101 / WALL / Modern Wall Clocks / Aisle B1`
   `102 / DIGI / Digital Display Clocks / Aisle C2`
   `103 / ALRM / Bedroom Alarm Clocks / Aisle D4`
2. 15 clocks already seeded across those three types
3. Two-sentence descriptions for each clock
4. Different buy and sell prices for each clock

Phase 4 implementation summary:
1. Login email format is checked with `filter_var()`
2. Numeric IDs and prices are filtered with `filter_input()`
3. Numeric server-side checks use integer and float validation paths
4. Form output is safely encoded with `htmlspecialchars()` through `safeText()`
5. Browser-side validation uses `required`, `minlength`, `maxlength`, `min`, `max`, and `step`
6. The site uses an external stylesheet, themed color palette, logo, showcase image, and favicon

Phase 4 screenshot walkthrough:
1. Follow `../phase4_submission_checklist.md`
2. The checklist includes Mac screenshot instructions and exact values for each screenshot
3. The checklist also includes the extra type `104 / SMART` and extra item `3016` used during the screenshot flow

Phase 4 final export:
```bash
cd /path/to/project/hp627-IT202-Lecture
mysqldump -u root -p clock > scripts/clock_phase4_backup.sql
```

