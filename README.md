# COSC 4351 Web Application Project
## Admin Portal
### Due Date: November 30, 2018 23:59:59

![alt text](/se_portal_demo.gif)


Description: 
You have been asked to build an admin portal that will allow your company internal employees to access the portal and perform admin functions on behalf of company clients.

Here are additional details:

(a) Application is accessible only on company network. 
(b) Access to the links is role based i.e. only authenticated internal admins are able to access the portal and what links you can access once on the portal is determined based on what roles you have. So, same link will not be visible to other admin who doesn't have appropriate role to access the link.
(c) There are some global links that are available to all admins.
(d) The links redirect users to the admin application that is not developed by you.


Based on above requirements provide followings:

1. You have 5 weeks to implement this system. You and your partner will have 1 week sprints. At the end of each sprint you should push the code to SVN for the stories you completed in that sprint.
2. Demo with TA. Details for demo will be posted on google groups. 
3. Each partner must be present for the demo to discuss their peice. 10 -15 minutes demo par pair.


## Description 
We have been asked to build an admin portal that will allow your company internal employees to access the portal and perform admin functions on behalf of company clients.

## Project Scope
The scope of the web portal is to create a site that has links to third party application for each admin with login credentials. We will make the portal in a way such that admins will have views that are necessary for them only and are able to have links directly assigned to any given admin. The links within the portal will not be in the scope of the project and will redirect to other independent companies. There will be a login system that takes a user name and password that will identify which user is accessing the portal and will display the links that are intended for that certain admin to see. The customers motivation is to provide access to internal admins to outside applications through the portal. 

## Risk Analysis and Recommendations
Our risk analysis identifies functions that could cause problems or delays and include quantified values that indicated the risk and how these risks would mitigated.


## Resourcing Plan
### Principal Project Participants
Md Nabil Ahsan will act as primary front end developer of the user interface and login system. He will work on making the interface of the portal seamless and intuitive, to avoid overloading the user’s memory or cognitive load while the user performs tasks in the portal.

Johnny Soto will as primary back end developer of the portal and will work in assuring that the correct page is loaded when the user logs on. He will also be responsible for the links that are displayed for each admin user.

Reusable resources for this project are:
* The login module be reused for future projects. Subcondition: None.
* Font-end portal software can be reused for similar content management systems. Subcondition: Design standard may vary.
* Environmental resources for this project are the TA’s by email or office visit and the professor by email, if we encounter an issue that cannot be mitigated after online research than, we will use these environmental resources as well.


## Implementation Plan (discuss development methodology, technologies, etc)
We will be using Scrum Methodology for developing the login portal. With Scrum we will divide the development into manageable tasks and components that are listed in this document. The beginning of the will be the login system and will be developed in PHP and HTML only; CSS will be added once the database is set up. 

Secondly, the logic will be developed so that the login system recognizes the roles of the admins. After logic, the configuration will be developed so that the admin will editing privileges can add or remove links and other admin users. The last module of the portal will be services that redirect to third parties which will be written in html and retrieved via a mysql database. 

## Project Schedule
Project timeline: 5 weekly sprints
### Sprint 1
Wireframes and Minimum design work.
Create Database that will hold Admin account information, such as Username and Password for 1 admin.
Create configuration file to connect Database to PHP application.
Testing to see if one admin is able to log in.
Make note of any issues at the end of current sprint to be taken care of in the next sprint

### Sprint 2
Analyze and fix issues from last sprint.
Initial HTML/PHP code for login form. 
Same for welcome page that will contain the links to third party application.
Make note of any issues at the end of current sprint to be taken care of in the next sprint

### Sprint 3
Analyze and fix issues from last sprint.
Start testing application for 2 admins
Make note of any issues at the end of current sprint to be taken care of in the next sprint

### Sprint 4
Analyze and fix issues from last sprint.
Redesign login page to match modern design principles.
Make note of any issues at the end of current sprint to be taken care of in the next sprint

### Sprint 5
Analyze and fix issues from last sprint.
Final round of testing 

### Schedule tracking mechanisms are:
* Project Board feature on Github to create tasks that will have a due date based on our scheduling plans.
These tasks will then be tracked throughout the sprint where the team members will keep each other updated through quick meetings, discussing progress, potential issues, and solutions.
* Scheduling for the project will be done in the weekly scrum meeting that are part of Agile methodology. The schedule will be composed of tasks from the Scrum backlog and weekly goals that are compartmentalized to each milestone.

## Solution Architecture
![alt text](/Screen%20Shot%202018-09-23%20at%205.29.35%20PM.png)
### Using Multi-tier: 
Multi-tier architecture allows us to divide an application into different components that can be developed separately. It is perfect for enterprise-level application, such as the one we are working on. It includes a presentation, logic and database tier. This adds modularity and allows change and replacement in certain tiers that will not affect the other ones. 

It fits the principles of Agile methodology that accounts for alterations and improvements. It also makes more sense in this case as we are only building the admin login portal, which redirects the admin to another application that is not developed by us.

### Tier 1:The first tier is the Presentation tier. 
This is the User Interface and is what every admin will interact with. 
It will have input sections for Username and Password and a button to log in.

### Tier 2: This is the Business Logic tier. 
Once the admin logs in on Tier 1, the business logic determines what kind of access they get. This is crucial to our application. 
Certain admins will have a certain amount of access based on their role. For example, Admin 1 can strictly access Link 1 and Link 3, but only Admin 2 can strictly access Link 2 and Link 4.
There will also be Developer role who is takes with assigning the admins their roles and the kind of access they will have.

### Tier 3: 
We are not concerned with what happens here as the links on our login portal leads the admins to a software application that is not developed by us. 
This once again highlights the advantages of an n-tier application, where our work on tier 1 and tier 2 does not interfere with the separate software application.

## User Stories
### Login
As an admin, I must have the ability to log in to gain access to my assigned links.
Resources: Developer + tester.
Effort Estimate: medium
Release Target: week 1

### Logic
As an admin, I must be able to view the links that are assigned to me.
Resources: Developer + tester.
Effort Estimate: large
Release Target: week 2

### Configuration
As a developer, I must have the ability to assign and remove links for certain admins.
Resources: Developer + tester.
Effort Estimate: large
Release Target: week 3

### Services
As an admin, I must be able to click on the assigned links that will take me to the main application.
Resources: Developer.
Effort Estimate: low
Release Target: week 4

## Testing Plan
The plan for testing will begin with conducting technical reviews to check for errors before beginning component level outward integration of each module. The testing technique will begin with unit testing when writing the code, as stated in Scrum. 

After unit testing we’ll use integration testing to check interfacing amongst the modules. Once the system is put together and functioning correctly, Validation Testing will be done to check that the software meet all reasonable expectations of the customer, in our case, the assignment instructions.

## Quality Measurement Plan
We will measure the quality of the portal so that all content, functions, and features are as they should be to measure errors and defects. There are four categories that we will measure for quality by measuring each category from 1 - 100 and dividing by the total to get the avg. percentage quality:

### Correctness
How well the program performs the required functions.

### Maintainability
To measure how difficult it is to correct any errors encountered.

### Integrity
To check it ability to withstand attacks to the login module.

### Usability
To qualify the ease of use so that it is not unnecessarily complex.

## Deployment Plan
For the portal, deployment will be local and we’ll be using a deployment checklist make sure page load time and database performance are working correctly. We will also maintain a rollback strategy in case something goes wrong. This strategy will sufficient since we are not using additional features such as continuous delivery or automated development processes. 

## Maintenance Plan
Our maintenance is going to be done use version control software Git and GitHub. We will maintain all changes to the portal in a GitHub repo. As features are added or changes, Git will be used to address bug fixes, adaptation request, or enhancements to the portal.
