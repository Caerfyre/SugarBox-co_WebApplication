<p style="text-align: center">
  <img src="https://raw.githubusercontent.com/Caerfyre/IM2-Project/main/assets/sblogo-2.svg"/> 
</p>

# Sugarbox&co.
Sugarbox&co is a growing small-scale pastry business based on Cebu, Philippines that specializes in creating custom desserts such as cakes, cupcakes, cookies and more.

## Project Description
The primary objective of this project is to successfully create an Information System for Sugarbox&co using the database approach. This system is expected to contain functionalities of managing data that is received, processed, stored, or sent from transactions and other business-related activities. These functions will be focused on allowing the client user to have better data management, time-saving processes, and other benefits brought by the database approach.

## Screenshots
Coming soon

## Contribution
Guidelines for creating an _enhancement_ issue:
- Issue must contain two sections: **Overview** and **To-do**
- **Overview** provides an introduction to the feature/enhancement request
- **To-do** provides a task list in order to achieve the requested feature/enhancement
- Self-assign issue if you don't want other contributors to work on it
- Provide additional sections and/or details as needed

## Project Setup
### XAMPP
1. Install node modules
```sh-session
npm install
```
2. Run Apache and MySQL server on XAMPP
3. Create `sugarbox_db` schema in phpMyAdmin
4. Import `sugarbox_db.sql` to phpMyAdmin
5. Access app on http://localhost:8080/

### Docker
1. Download Docker-LAMP
```
docker pull mattrayner/lamp
```
2. Run services in `docker-compose.yml`
3. Create `sugarbox_db schema` from the query console
```
create schema sugarbox_db;
use sugarbox_db;
```
4. Run `sugarbox_db.sql`
5. Access app on http://localhost:8080/

## Links
* [Figma Prototype](https://www.figma.com/file/YdoiT4VOOJoGmICwCWTRmv/CIS-1202-Exercise-2-WebDev-and-Design-YBAS?node-id=104%3A14172)
* [Proposal Document](https://docs.google.com/document/d/1fKh0n3eTiV8IhbUMKo7PGqCGzXXHRrAM/edit?usp=sharing&ouid=108013498313349699134&rtpof=true&sd=true)

## Contributors
**IM-2 Group 9**
  - Niña Therese Ybas
  - Edwin Bartlett
  - Vladimir Roman
  - Eloisa Españo

## Project Status
Ongoing
