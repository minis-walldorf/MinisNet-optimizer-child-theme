# MinisNet-optimzer-child-theme
This is a custom WordPress child theme of Optimzer theme for Minis Walldorf

## Purpose
Modifying Optimzer theme to better fit the need of Minis Walldorf

## Modifications
### PHP/Templates
* `/frontpage/slider-static.php`: Replace static header image with shortcode to Smart Sliders 3 plugin imgage Slider "Front Page Slider"
* `/template_parts/post-layout4.php`: Replace not working translation of "Read More" with hard coded "Mehr Lesen"
* `/template_parts/post-layout4.php`: Remove Link to Author Page and comment count
* `/tribe-events/single-event.php`: Remove links to next and prevoius Events
* `/tribe-events/single-event.php`: Add Logic to restrict access based on category and user roles
* `/error_page/access_denied-event.php`: Template part which shows "access denied" message with reason if passed by caller
* `single.php`: Remove author link and comment count

### CSS
`style.css`:
* edit design for **sticky posts** in post layout4 (Frontpage list)
* make **footer stick to bottom**, even if content is not long enough
* change **font-family of logo** in header
* edit design of different **calendar** parts
* edit **main menu** style
* hide **pacing wheel** in top right corner
* hide **Widgets in Footer**
* change **WPPA photo gallery** style

## Deploy Modifications
### PHP/Templates
1. commit changes
2. push to deployment remote (the web server hosts a git repo in theme folder)

**OR**

push changes via FTP

### CSS
Because WordPress and/or this child/parent theme combo is weird af, you cannot simply push the style sheet to the server
1. push updated style sheet to server
2. go into Dashboard->Tools->Child themes
3. change child theme's version number
4. manually overwrite functions.php on server with the one in this repo 