# Hall Management System

## Project Overview
The **Hall Management System** is designed to streamline the process of booking academic halls for club events. The system provides a common platform where club heads can plan and organize events, ensuring no overlaps in hall usage. The application automates the allocation of halls based on user requirements like hall capacity, AC availability, and time slot preferences.

## Features
- Book academic block halls based on event requirements.
- Avoid hall conflicts by checking availability in real-time.
- Automatically assigns a hall that meets the event criteria.
- Ensures no two events are scheduled for the same hall at the same time.

## Problem Statement
Club heads faced difficulties in booking halls for meetings or events due to scheduling conflicts. The system addresses this by providing a platform where they can enter event details, and the system checks hall availability to avoid overlapping bookings.

## Objectives
The key objectives of the Hall Management System are:
- To allow club heads to input event details such as hall capacity, AC requirement, date, and time slot.
- To automatically allocate a suitable hall based on the availability and user requirements.
- To prevent conflicts between different events scheduled for the same hall.

## Entities and Relationships
The system operates on the following core entities:
1. **Club Head**: Organizes events and inputs personal and event details.
2. **Event**: Represents the club event, including attributes like type, capacity, date, and time slot.
3. **Hall**: Contains the available halls in the academic block, each with unique capacity and AC availability.
4. **Occupied**: Stores the details of booked halls to ensure no overlap between events.

### Entity Relationships
- **Club Head organizes Event**: One-to-one relationship since a club head can organize only one event at a time.
- **Event occurs in Hall**: One-to-one relationship as only one event can take place in a hall at a given time.
- **Hall can have multiple bookings (Occupied)**: One-to-many relationship, as halls can be booked for different events at different times.

## ER Diagram
- Club Head → Event (One-to-One)
- Event → Hall (One-to-One)
- Hall → Occupied (One-to-Many)

## Database Schema
The system uses the following tables:
1. **Club_Head Table**:
    - Attributes: Roll No (Primary Key), Student Name, Club Name, Email, Mobile No
2. **Club_Event Table**:
    - Attributes: Event ID (Primary Key), Event Type, AC requirement, Capacity, Time start/end, Date
3. **Hall Table**:
    - Attributes: Hall No (Primary Key), Hall Capacity, AC availability
4. **Occupied Table**:
    - Attributes: Hall No (Foreign Key), Event ID (Foreign Key), Time start/end, Date

## Booking Workflow
1. The club head inputs event details including capacity, AC requirement, and preferred time slot.
2. The system checks the availability of halls that meet the entered requirements.
3. If a hall is available, it is booked for the event and stored in the **Occupied** table.
4. If no hall is available, a notification is displayed indicating that no hall matches the requested criteria.

## Example Scenario
- User: Rishit Rastogi, head of the **CS Club**, wishes to book a hall for a cultural event with 100 seats and no AC on **2023-11-18** from **17:30 to 18:30**. The system generates an **Event ID: 42**.
- Unfortunately, no hall meets the requirements for that specific time, so the event is not booked.

## Web Interface
The user interacts with the system via a simple web interface where they input event details. Based on these inputs, the system provides real-time feedback on hall availability.

## SQL Queries
- **Insert Event Details**:
    ```sql
    INSERT INTO club_event (EventType, ACrequirement, Capacity, Date, TimeStart, TimeEnd)
    VALUES ('$EventType', '$ACrequirement', '$Capacity', '$Date', '$TimeStart', '$TimeEnd');
    ```
- **Check Hall Availability**:
    ```sql
    SELECT hall.HallNo 
    FROM club_event AS event, hall AS hall 
    WHERE hall.HallCapacity >= $Capacity 
    AND hall.ACavailability = '$ACrequirement' 
    AND hall.HallNo NOT IN (SELECT HallNo FROM occupied WHERE ('occupied.date' = 'event.date' AND 'occupied.TimeStart' >= 'event.TimeEnd'))
    LIMIT 1;
    ```

## Conclusion
The Hall Management System simplifies the process of event planning by ensuring efficient and conflict-free hall bookings, allowing clubs to organize events smoothly without double bookings or scheduling clashes.

