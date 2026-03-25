# Rename Script

A simple PHP script to batch rename files in a directory by padding their leading numbers to 3 digits. 
This is particularly useful for properly sorting numbered files (like video tutorials) in the file explorer, so that `2` doesn't come after `10`.

## Features
- Finds files starting with 1 or 2 digits (e.g., `1-video.mp4`, `12 tutorial.mp4`).
- Pads the starting number with zeros until it's 3 digits long (e.g., `001-video.mp4`, `012 tutorial.mp4`).
- Skips files that are already correctly named.
- Prevents accidentally overwriting existing files.
- Cross-platform compatible (supports both Windows and Linux/Mac paths).

## Usage
1. Open `rename.php`.
2. Edit the `$directory` variable at the top to point to your target folder holding the files. 
   *(By default, it is set to `C:\Users\ehmdy\Videos`)*
3. You can also adjust the `$padLength` variable to control the number of digits in the file names (defaults to `3`).
4. Open your terminal or command prompt.
5. Run the script:
   ```bash
   php rename.php
   ```

## Requirements
- PHP installed and accessible via command line.
