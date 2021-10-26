# Hanja_Learner
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
