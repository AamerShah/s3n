# s3n: Search-Scan-Save-Notify

Search-Scan-Save-Notify  
A program to scrape online web-content (APIs, RSS Feeds, or Websites) and notify if search term was hit.  
*Due to security concern, all errors are logged via email 📧 and are not displayed at GUI.*

## Goal
Scrape news sites and custom RSS feeds, detect keyword hits or page changes.  
Optional: translate with IBM Watson (or Google) before searching.

## Requirement
- PHP Server  
- `php-curl`  
- PHPMailer  
- Cron job

## What does the program do?
1. Fetch a hardcoded URL via cURL; save snapshot in `comparison/`
2. After interval (cron), fetch again & compare to last snapshot
3. If identical → exit
4. If changed → search `search.php` terms
   - No match → exit  
   - Match → archive new snapshot in `dumps/` (timestamped filename) + send email (or Slack/Telegram)  
5. Repeat

## What else can it do?
- Translate site content via IBM Watson API, then search the translated text.

## Example
Integrate with xss.is (Russian hacking platform).

## Before you begin
- **watsonlate.php**  
  - Line 2: set `$turl`  
  - Line 3: translation model (e.g. `ru-en`)  
  - Line 12: your auth token (free trial: 20 000 words/mo; max 2 runs/day)
- **search.php**  
  - One keyword per line (case-insensitive). `$qq` appears in email subject.
- **principal.php**  
  - Line 6: target URL  
  - Line 11: your email
- **index.php**  
  - Hit via cron; lines 6–9 drive the process. First/last lines log runtime.

## Enjoy!
Bugs or optimizations → contact form on [aamershah.com](mailto:aamer@pm.me).  
Code uploaded with sensitive info removed; hope nothing critical got stripped.  
