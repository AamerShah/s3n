# s3n
Search-Scan-Save-Notify

A program to scrape online web-content (APIs, RSS Feeds, or Websites) and notify if search term was hit. It is based on PHP.
* Due to security concern, all errors are logged via email 📧 and are not displayed at GUI. To configure email and other requirements, keep reading. 

The goal was to scrape News sites and custom RSS feeds and notify if any search criteria was hit or if a change on the site was made.
The program uses free API keys for translation. I used IBM's Watson. You may choose google or other.

## Requirement
* PHP Server
* php curl
* php mailer
* cron job to automate

## What does the program do?
* Fetch a hardcoded URL (using php curl) and store the contents in a temp file in the comp (comparison) directory.
* After a specified interval (use cron job), reopen the same URL and compare this new response to the response stored in comp directory.
* If the results are same, do nothing.
* If the results differ; then perform a search of the terms mentioned in search.php
* If the search terms do not match, do nothing; otherwise replace the temp file in comp directory and store the file (name of the file is the date and time of curl) in dumps directory and send an email notification (can be replaced by Telegram / Slack notofication) to the hardcoded address.
* Repeat the process.

## What else can the program do?
* Translate the the site using IBM's Watson API.
Here the contents from the site (let's say in Russian) will be sent to Watson's API and the response (let's say in English) will be searched for the search term and subsequently notified via mail.

## Example
You can integrate for xss.is (Russian hacking platform; in Russian language).

## Changes are required before you begin
* watsonlate.php (IBM wWatson Translator) file requires $turl (line 2), language translation model like ru-en (line 3), auth token (line 12). The token requires signup at Watson service. Watson can translate 20K words per month for free trial account. Be judicious in its use. You may set frequesncy of cron twice a day at max. 
* search.php contains the list of terms you want to be notified about. Add new line for the new term (it is case insensitive as it is done in principal file in line 20). The $qq. variable will be displayed in the subject line of the email.
* principal.php is the main file for a particular website. Create multiple copies for different websites. Change Line 6 to your target domain. Change email in line 11 to yours.
* index.php is the one which a cron job should request in order for the entire above mentioned to commence. To be precise line 6 to 9 are important. The first and last lines are just calculating the round trip time of the entire program for debugging purpose.

## Finally Enjoy!
* If you have a bug to report or suggest an efficient way for any of the various modules, send me a message via the contact form on https://aamershah.com.
* I have uploaded this code and removed sensitive info. I hope I didn't remove any important artifact.
