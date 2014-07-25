#### WEBPAD :: a web text editor
=================================

1. What is it?

 -> It's rich text editor for web. 

2. What's unique in it?
 
 -> You can transform your text. This is the feature which is not available in many web based text editor.

3. Do I need to worry about other thing?
 
 -> Yes. You've to open it slightly other way in Google Chrome. As because Google Chrome does not allow an iframe
    to be editable at any cost, you've to open the Google Chrome browser with the "-disable-web-security" flag from
    the command line i.e. chrome.exe -disable-web-security
    When the webpad loads, hit one refresh in Google Chrome.

4. Doesn't work on mobile platforms.
 
 -> It's intended to work only in desktop platforms because of Google Chrome's security issue with iframe and also
    because of a feature used here - W3C's FileSave API which is only supported in Desktop platform, precisely in
    Chrome and Firefox. IE may not display the webapp correctly. Bad browser.

** Underline other than default, won't get displayed in Chrome version > 34 because of a bug. 

