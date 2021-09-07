# Spring 1
## Things to Do
- [ ] Write a project proposal
    - Explain our project concept
    - Satisfy the project requirements (specify which satisfies which)
- [ ] Create a UI design
    - Include at least 3 screens
    - Explain our design, justify design decision, discuss how our design affects
    the usability

## Write a project proposal
### Project requirements

- [ ] It must include dynamic behavior, where the front end responds to user 
input events or web service and updates the interface accordingly.
- [ ] It must include at least 3 functionalities (or scenarios), providing 
services to the users.  
    - For each functionality (or scenario), be sure to describe its purpose, what it does, how it is used, and what the users can expect from using it. Later, you will implement each of these functionalities (or scenarios).
- [ ] It must include logic that will execute both (i) client side in a web browser, and (2) backend component on a web server.
    > Examples: logic that executes on a client side
    Validate the form data (client-side input validation)
    Auto complete some information
    Auto correct typos or misspelling words
    Reformat the form data entries (textual, tabular, and graphical formats)
    Filter search results
    Sort the search results
    Build a visualization (textual, tabular, or graphical) from a 3rd-party API

    > Examples: logic that executes on a server side
    Validate the form data (server-side input validation)
    Add / update / delete / retrieve data (from files or database)
    Produce HTML documents; for example, reports or confirmation pages
    Perform business logic; for example, calculate tax, compute grade or GPA
    Handle HTTP requests from CURL command or URL rewriting (HTTP requests that bypass the application’s interface or client-side input validation, and thus may break the execution flow of the app). Note: Bypassing the application’s interface increases vulnerability and may lead to unauthorized access. If your project involves sensitive information, a thorough server-side input valiation is necessary.

- [ ] It must support multiple users (i.e., maintain states of the application such that multiple users can access the application simultaneously and their sessions do not overlap or interfere with each other).
- [ ] It must support multiple sessions, allowing returning users to access / retrieve / manipulate their existing information or configuration (i.e., must include data persistence using a database).
- [ ] The frontend and the backend must have an asynchronous component (Angular-PHP):
    The frontend (Angular) sends an asynchronous request to the backend (PHP).
    The backend (PHP) processes the request and produces a response.
    The backend (PHP) returns a response to the frontend (Angular).
    The frontend (Angular) appropriately uses the response from the backend (PHP) in some way.
    Note: It may seem unclear at this point how the Angular frontend and the PHP backend components interact. This course will help you see how to properly implement and connect the frontend and the backend components.
- [ ] Overall, your app must be a single unit. It must not be disconnected. All parts / components must be properly connected.
    That is, once a user enters your app through a web browser, there is an appropriate navigation system and/or an execution flow allowing a user to achieve her/his goal(s) without (re)visiting another part of your app manually (for example, by entering another URL in a web browser’s address bar).

## Create a UI Design
- [ ] Design at least three different screens or views (with respect to the three functionalities or scenarios above) of your project.

- [ ] Each screen must adequately demonstrate its purpose and functionality. You should include all necessary elements and justify your design decision. Note: you may revisit and update your UI design while implementing the components.
