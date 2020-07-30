
# NLUIS - National Land Use Information System #


- [x] Management Of System Users (Including Users Authentication).
- [x] Management Of Stakeholders and their Profiles.
- [x] Location Management.
- [x] Management of Roles and Permissions.
- [x] System Settings.
### add other information here

**COMPANY THAT THE SYSTEM WAS DEVELOPED FOR**

1. NLUIS - National Land Use Plan Commission

**SYSTEM INSTALLATION PROCEDURES**


***- Tools:***

  1. PHP - 7.3
  
  2. NGINX - web server
  
  3. Postgresql 
  
  4. Composer - PHP Package Manager
  
  5. Git 
  
***- Server Requirements (Testing Server)***
  
- Clone The Project In Github


**IF YOUR INSTALLING THE SYSTEM ONLINE**

- Install NGINX and Postgresql (Most Recommended For NLUIS)

- Run the following command to change the the permission of the whole system project to be owned by web services.
  "sudo chown -R :www-data /var/www/WID"
- Run the Command to Change The Permission Of The Storage Folder And Files and Bootstrap Cache.
  (Navigate To The System And Check All The Folders That Files Will Be Written And Run This Command).
   "sudo chmod -R 775 /var/www/WID/storage"
   "sudo chmod -R 775 /var/www/WID/public" and others.   
   
  
