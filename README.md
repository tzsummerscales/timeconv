# timeconv
GPS Time Converter Website - converts between GPS and human time

The code behind the time conversion website at https://www.andrews.edu/~tzs/timeconv/timeconvert.php

Converts from human time to GPS time or from GPS time to human time.  Also outputs UNIX time.

## Files
timeconvert.php - Collects information on the time to be converted

timedisplay.php - Performs the requested conversion and displays the results.  (The hard-coded list of [leap seconds](https://en.wikipedia.org/wiki/Leap_second) lives here.)

timealgorithm.html - Explainer page that shows the code within timedisplay.php
