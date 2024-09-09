```open /Applications/Google\ Chrome.app --args --use-angle=gl
```

chrome://flags/#use-angle

Use OpenGL over Metal.

https://github.com/dortania/OpenCore-Legacy-Patcher/issues/1145

-----

An issue has been identified impacting Chrome 125+ and some Electron based applications (e.g. Discord) on AMD GCN 1.0 based GPUs. Issue occurs with heavy UI glitching and/or complete freezing. Latest versions of other major Chromium based browsers have so far been tested working, however it is not out of the question that the issue may occur on them later. Additionally, this issue may manifest on Electron applications as being unable to interact with the UI.

The issue is under investigation, however no ETAs for a fix can be provided. You may use the workarounds listed below.

Following hardware is impacted:

AMD HD 7000 series
FirePro D300/D500/D700 (Mac Pro Late 2013 / MacPro6,1)
R9 M370X (MacBook Pro 15" 2015 / MacBookPro11,5)
Issue manifests as follows:

Screenshot 2024-08-07 at 3 17 39 PM
Semi-automated workaround:

Patches Chrome and all Electron apps

See comment below: Experimental OpenGL Patcher
Manual workarounds:

These have to be made per-app.

open /Applications/Google\ Chrome.app --args --use-angle=gl
After you've launched it and it is no longer glitching, you can navigate to chrome://flags/#use-angle and switch it to "OpenGL" to make OpenGL a permanent rendering backend.

Other options:

Use another browser
Downgrade Chrome to version 124 or older and block updates
Electron apps:

Since Discord and other Electron based applications may not support setting flags, you may want to create an Automator app to launch them. Create a shell script in Automator with the proper path (in this case Discord), then save the app and use the icon you created to launch it.

open /Applications/Discord.app --args --use-angle=gl
Thank you to @Jazzzny and @ParaDoX1994 for detailing this report and work-arounds.

@khronokernel
Member
Author
khronokernel commented last month
An experimental script has been developed to force the OpenGL renderer on Chrome and Chromium-based software such as Electron (includes software like Discord).

Prerequisites:
Install Python 3.11 or newer (ex. python.org)
Download electron_patcher.py script (gist.github: electron_patcher.py)
Usage:
Open Terminal and run the following (adjust electron_patcher.py to where it exists, ex. ~/Downloads/electron_patcher.py:

python3 electron_patcher.py
Screenshot 2024-08-11 at 6 42 00 PM