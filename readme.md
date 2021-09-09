# Sprint 1
## Things to Do
- [ ] Write a project proposal
    - Explain our project concept
    - Satisfy the project requirements (specify which satisfies which)
- [ ] Create a UI design
    - Include at least 3 screens
    - Explain our design, justify design decision, discuss how our design affects
    the usability

## Write a project proposal
### Project Concepts
It is a web application that help users learn Hanja (Chinese Character) in three
different langues: English, Japanese, Korean.

### Project requirements

- [x] It must include dynamic behavior, where the front end responds to user 
input events or web service and updates the interface accordingly.
- A user type in keyword to search Hanja. When the user presses enter, all 
Hanja that match keyword will be displayed in a list
- Clicking "+" symbol placed along with the character will add the character
to the user's My Wordbook list and "+" symbol turns into check symbol
- Clicking a user's name/icon on the left top shows the list of option the
user can choose from to update profile and view My Wordbook
- Clicking a user's name/icon on the left top shows the list of options the
user can choose from to update profile and view My Wordbook
- Clicking "+" in My Wordbook page will take a user to the landing/search page
---

- [x] It must include at least 3 functionalities (or scenarios), providing 
services to the users.  
- For each functionality (or scenario), be sure to describe its purpose, 
what it does, how it is used, and what the users can expect from using it. 
Later, you will implement each of these functionalities (or scenarios).
    1. Search Hanja in a search bar
    2. Add a character to a user's own wordbook
    3. Create a randomly sorted list of quizzes using the user's wordbook

---
- [x] It must include logic that will execute both (i) client side in a web 
browser, and (2) backend component on a web server.
- Client Side
    > Examples: logic that executes on a client side
    Validate the form data (client-side input validation)
    Auto complete some information
    Auto correct typos or misspelling words
    Reformat the form data entries (textual, tabular, and graphical formats)
    Filter search results
    Sort the search results
    Build a visualization (textual, tabular, or graphical) from a 3rd-party API
    - Filter search results using keyword
    - Order search result by search frequency  
    - create a randomly sorted Hanja quiz from My Wordbook

- Server Side
    > Examples: logic that executes on a server side
    Validate the form data (server-side input validation)
    Add / update / delete / retrieve data (from files or database)
    Produce HTML documents; for example, reports or confirmation pages
    Perform business logic; for example, calculate tax, compute grade or GPA
    Handle HTTP requests from CURL command or URL rewriting (HTTP requests that 
    bypass the application’s interface or client-side input validation, and thus
    may break the execution flow of the app). Note: Bypassing the application’s 
    interface increases vulnerability and may lead to unauthorized access. 
    If your project involves sensitive information, a thorough server-side input 
    valiation is necessary.

    - Add Hanja character to user's separate wordbook list data
    - Add recent search keyword into the user's search history
---

- [x] It must support multiple users (i.e., maintain states of the application 
such that multiple users can access the application simultaneously and their 
sessions do not overlap or interfere with each other).
- Different users can log in with their own gmail addresses
- Once logged in, the user's own wordbook list and recent search list are 
load and can be viewed

---
- [x] It must support multiple sessions, allowing returning users to access / 
retrieve / manipulate their existing information or configuration (i.e., must 
include data persistence using a database).
- recent search, profile, my wordbook list are all stored and maintained throughout
different sessions to allow user to have consistent data set

---
- [x] The frontend and the backend must have an asynchronous component (Angular-PHP):
    The frontend (Angular) sends an asynchronous request to the backend (PHP).
    The backend (PHP) processes the request and produces a response.
    The backend (PHP) returns a response to the frontend (Angular).
    The frontend (Angular) appropriately uses the response from the backend 
    (PHP) in some way.
    Note: It may seem unclear at this point how the Angular frontend and the PHP
    backend components interact. This course will help you see how to properly implement and connect the frontend and the backend components.

#### Search
1. When the site loads for the first time, frontend sends the get request to the
backend, retrieving the list of all Hanja characters
2. The whole character data is filtered by the keyword the user types in
3. Only the characters relevant to the keyword is displayed to the user

#### Profile
1. When the user clicks Profile button under name/icon on the top left,
the frontend sends get request to the backend, retrieving user information
2. If user decides to update his or her profile, the user clicks save button in
the profile page
3. Then, the frontend sends post or put request to the backend to update the user
information stored in the database

### My Wordbook
1. From the search result, the user can click "+" symbol to add a character to
his or her wordbook list
2. This behavior sends post request to the backend to add a new character into
the user's my wordbook list
3. When the user clikcs My Wordbook, the frontend sends get request to the backend
to load the user's wordbook list
4. On My Wordbook page, the user can press "x" symbol on the top right corner
of the character cell to remove it from the list.
5. This sends delete request to the backend, updating the user's wordbook list

---
- [x] Overall, your app must be a single unit. It must not be disconnected. 
All parts / components must be properly connected.
    That is, once a user enters your app through a web browser, there is an 
    appropriate navigation system and/or an execution flow allowing a user to 
    achieve her/his goal(s) without (re)visiting another part of your app 
    manually (for example, by entering another URL in a web browser’s address bar).

Yes, every pages in the application can be navigated by clicking links/buttons

## Create a UI Design
- [x] Design at least three different screens or views (with respect to the three
functionalities or scenarios above) of your project.

Will be including screenshots of UI design

- [ ] Each screen must adequately demonstrate its purpose and functionality. 
You should include all necessary elements and justify your design decision. Note: you may revisit and update your UI design while implementing the components.

This should be done after finalizing UI design. Some modifications in design can
be needed when confirming functionality/logic requirements above
