# Event Management System API
Laravel 9 event management system with Vue.js front end.
[Link to front end](https://github.com/Lakshan-Madushanka/event-management-system-front-end)

## Requirements
- Enable google calendar API and obtain the key needed to access holidays API.

## Installation

1. create a .env file. (copy .env.example file).

2. Replace GOOGLE_CALANDER_API_KEY

3. Create a database.
```
MySQL -u root -p
create database hotel_app;
exit;
```
2. create a DB event_management in MySQL server. (name can be changed but make sure DB name and DB_DATABASE attribute value in .env file are identical).

3. Run PHP artisan serve in the console.
```
PHP artisan serve
```
Note: *Back end and front end both should be in the same domain but the port address can be changed (as Laravel sanctum is used as authentication)*

#### Admin Credentials
- User name - testadmin@mail.com
- password  - 123Admin*

#### Regular user credentials
- User name - testuser@mail.com
- password  - 123User*

## Architecture
- MVC
- Domain-driven

## Roles
- Regular user(unauthenticated)
- Authenticated user
- Admin

## Functionality

### Dashboard
- The total number of events for the current month.
- Number of canceled events.
- Number of upcoming events.
- Number of overdue events.
- **Zombie events (private events that don't have any participants or all participants rejected to participate).**

### Calander
- Access scope: *any*

- Calendar with holidays accordingly to region.

- While authenticated users only have access to events assigned to them and public events, the admin users can see all events in the calendar.

### Event Management
- Access scope: *admin*

- Create

- Invite users (registered) to an event.

- Remove users from an event.

- Read
    - Pagination
    - Search
        - By name
        - By event id
    - Filters
        - By date time
        - By status
        - By event type
        - By number of participants
        - Zombie events
- Update
- Delete (soft delete and permanent / delete many once)

## Event
- Has 4 status
    - UPCOMING
    - CANCELLED
    - HELD
    - OVERDUE

- Has two types
    - PRIVATE
    - PUBLIC

- Public events don't have particular participants. Anyone can participate in these events.

- Private events can only be accessed by participants and admins.

- After all, participants rejected to participate in the private event will become zombie events and admins will be notified via mail.
- After creating, updating,deleting an event admins and participants are notified via mail.

- As above event state changes (CANCELLED AND UPCOMING) also be notified.

- Event status must be updated to canceled or held by admin otherwise automatically changes to OVERDUE status.

- Event can be set to be notified to participants before commencing via email.

## Users Events
- Authenticated users can check only events that are assigned to them.

- User or admin can change participation status that is default UNKNOWN.

- Admin can check all events.

- Admin can assign or remove a user from an event.

## Database Schema
![DB Schema](https://user-images.githubusercontent.com/47297673/173300456-32951856-73d5-45d5-abc6-5fe6f01fb630.png "DB Schema")

