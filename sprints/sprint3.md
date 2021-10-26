# Sprint 3

## Requirements
- Implement at least three of the following requirements:
    - [x] Use array(s), may be 1D array or multi-dimensional arrays
    - [x] Use expressions
    - [x] Use control structures
    - [x] Use predefined/standard/built-in functions
- [x] Implement at least two user-defined functions
- Use the following implicit objects
    - [x] ```$_GET``` - for sending and handling HTTP GET requests
    - [x] ```$_POST``` - for sending and handling HTTP POST requests

- Perform server-side input validation
    - [x] Validate form data
    - [x] Provide user-appropriate error messages
    - [ ] Use at least one regular expression
- [x] Implement form submission and handling
- [x] Support multiple users, using a server-side ```$_SESSION``` object to 
maintain state of the application on the server
- Use at least one of the following state maintenance mechanisms.
    - [ ] ```$_COOKIE``` - stores information on the client
    - [ ] URL rewriting
    - [x] Hidden form fields
- Support multiple sessions, using a relational database to persist data.
    - [x] Returning users must be able to access their existing data, records, or
    previous states; (*recent searches, my wordbook, language preferences,
    profile, etc)
    - [x] Users must be able to retrieve and view data previously stored in a 
    databse and use them in some ways to serve some purposes
    - [x] Users must be able to add data to the database; i.e., data being stored
    must reflect the user inputs and / or the application states. (*adding favorite
    character to my wordbook)
    - [x] Users must be able to update and / or delete data stored in the database
    (*deleting saved character from my wordboook)
- [x] Implement at least one query that returns JSON instead of HTML
    * Create a JSON report of my wordbook
- Use good coding style
 - [x] Make identifier names understandable 
 - [x] Use proper and consistent indentation
 - [x] Use comments
 - [x] Use new lines in your output ```\n```
 - Deploy your app (.htm, .css, .php) to our cs4640 server.
    - [x] Include the URL for your app in a comment in the header of your 
    ```index.html``` or ```index.php``` file.

---
## Remaining Features to be completed in this sprint
- [x] Search and Search Result
    - [x] search form
    - [x] display search result
- [x] My Wordbook
    - [x] enable add button in search result page to actually add a character
    to the user's "my wordbook"
    - [x] display my wordbook page
    - [x] enable deleting a character from my wordbook page
    - [x] add a new "export to JSON" button to convert my wordbook into JSON report
- [ ] Username and Password validation (using regular expression)
    - [ ] username validataion (what are the rules?)
    - [ ] password validataion (what are the rules?)
- [ ] Recent Searches
    - [ ] display a user's recent search history
    - [ ] create a "clear" button to clear the search history
