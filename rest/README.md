# Pirate Journal Application
The Pirate Journal application is a simple, web-based journal or diary application that allows users to add and view journal entries. It utilizes PHP for the backend, with a SQLite database to store journal entries, and serves the front end using PHP's built-in server. Docker and Docker Compose are used to containerize the application and its environment for easy setup and deployment.

## Project Structure
Dockerfile: Defines the PHP environment with the necessary extensions to interact with a SQLite database.
docker-compose.yml: Orchestrates the setup, linking the PHP service with a volume for persistent storage of the SQLite database.
carnet.php: The PHP script that handles GET and POST requests to interact with the SQLite database.
index.html: An HTML file (if you have it) that provides a user interface for adding and viewing journal entries.

## Requirements
Docker and Docker Compose installed on your machine.
## How to Run the Application
### Prepare Your Environment:

Ensure Docker and Docker Compose are installed on your system.
Clone or download the project to your local machine.
Build and Start the Container:

Open a terminal and navigate to the project directory.

Run the following command to build and start the container:

Copy code
docker-compose up --build
This command will build the PHP Docker image if it hasn't been built and start the service defined in docker-compose.yml. The --build option ensures that the latest version of your application is used.

## Access the Application:

Once the container is up and running, open a web browser.
Navigate to http://localhost:8080/ (or whichever port and file you are using) to access the front end of the application.
You can now add new journal entries and view existing ones.
How the PHP Script Works
Error Handling: The script starts by setting up error reporting to help debug issues during development.

Database Connection: It defines the path to the SQLite database and attempts to connect to it, creating the database file if it doesn't exist.

Table Creation: If the journal table does not exist, it's created with columns for id, date, title, and story.

Request Handling:

GET Requests: The script fetches and returns all journal entries as a JSON response.
POST Requests: It accepts JSON data containing date, title, and story fields, adds a new entry to the database, and returns a success message.
Other request methods return a 405 Method Not Allowed status.
Note on Persistence
The SQLite database file is stored in a Docker volume, as defined in docker-compose.yml, ensuring data persistence across container rebuilds and restarts.

