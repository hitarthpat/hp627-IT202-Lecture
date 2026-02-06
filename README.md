Phase 1 status: completed for `Clock` inventory.
Inventory details:
- Type 1: Wall
- Type 2: Digital
- Type 3: Alarm
- Column 1: Style
- Column 2: Power Source

Submission-required files are ready:
- `website/database.php`
- `website/index.php`
- `website/main.inc.php`
- `website/validate.inc.php`
- `website/logout.inc.php`
- `scripts/UsersStatements.sql`
- `scripts/phasel_backup.sql`

Setup steps
1. Import `scripts/UsersStatements.sql` into MySQL.
2. Serve the `website` folder from your PHP server (for example XAMPP htdocs).
3. Open `website/index.php` in browser.

Seed login accounts
1. `alex@clocks.com` / `BassBoost!123`
2. `riley@clocks.com` / `StudioMix!456`
3. `jordan@clocks.com` / `NoiseCancel!789`

Screenshot checklist from assignment
1. Login page.
2. Login form filled for user #1 before click.
3. Welcome page for user #1.
4. Login form filled for user #2 before click.
5. Welcome page for user #2.
6. Login form filled for user #3 before click.
7. Welcome page for user #3.
8. Invalid login form before click.
9. Sorry page after invalid login.

Final git commands
```bash
git add website scripts
git commit -m "Phase 1 login/logout complete"
git tag IT202-Phase01
git push
git push --tags
```


