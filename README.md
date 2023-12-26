# Laravel Appointment System

This is a simple Laravel application that illustrates appointment system concepts. The application provides CRUD operations for Officers, Activities, Visitors, and WorkDays.

## Features

- Officer CRUD: Fields include Name, Post, Status, WorkStartTime, WorkEndTime. Status can be Active or Inactive.
- Activity CRUD: Fields include OfficerId, VisitorId, Name, Type, Status, date, StartTime, EndTime, AddedOn. Type can be Leave, Appointment, and Break. Status can be Active, Cancelled, or Deactivated.
- Visitor CRUD: Fields include Name, Mobile No, Email Address, Status. Status can be Active or Inactive.
- WorkDays CRUD: Fields include OfficerId, DayOfWeek.

## Limitations

This project does not consist of things like authentication, authorization, and other advanced features. It only consists of a straightforward implementation of the logic mentioned in the notes section.


## Notes

- User should be able to add/update work days of officer while creating or updating officer.
- User should be able to create appointment for a guest with any officer.
- User should be able to create leave for an officer.
- User should be able to add break for an officer.
- Updating Officer should not update status.
- Updating Activity should not allow change type or status change.
- Updating Visitor should not allow change in Status.
- When an officer or a visitor is activated, related activities which were deactivated should be turned back active again.
- There Is no Delete Functionality in any entity.
- Ability to filter activities based on type, status, officer, visitor, date range, and time range.
- User Should only be able to add activity if it falls between officer’s work start and end time.
- User Should not be able to add activity if it does not falls in officer’s work days.

## Installation

1. Clone the repository: `git clone https://github.com/thekubera/appointment-system.git`
2. Navigate to the project directory: `cd repository`
3. Install dependencies: `composer install`
4. Copy the example env file and make the required configuration changes in the .env file: `cp .env.example .env`
5. Generate a new application key: `php artisan key:generate`
6. Run the database migrations: `php artisan migrate`
7. Start the local development server: `php artisan serve`

You can now access the server at http://localhost:8000

## Contributing

Contributions, issues, and feature requests are welcome!