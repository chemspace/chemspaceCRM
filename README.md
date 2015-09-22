##ChemspaceCRM 1.0

### What's in this repository ###

This is the git repository for the ChemspaceCRM project, a fork of SuiteCRM which is in turn a fork of the fully open source & supercharged SugarCRM Community Edition.

This repository has been created to allow company members/developers to collaborate and contribute to the project, helping to develop the ChemspaceCRM ecosystem.


### Installing ChemspaceCRM ###


If you are installing ChemspaceCRM for the first time, follow the instructions in this section. If you have an earlier version of SuiteCRM installed, refer to the upgrade section for instructions on how to upgrade your SuiteCRM instance. Follow the steps listed below to install ChemspaceCRM:

    Install the platform-appropriate (Linux or Windows) version of PHP, web server, and database on your machine.
    Download the SuiteCRM files from suitecrm.com(see “Downloading the latest SuiteCRM files” section).
    Copy the SuiteCRM files to your web server.
    Install SuiteCRM by following the SuiteCRM installation wizard.

### Download the latest ChemspaceCRM files ###


### Copying ChemspaceCRM files to web server ###

Once your ChemspaceCRM package has downloaded, you will need to unzip the files and set permissions required for the installation process. The following steps explain in detail the prerequisites to setting up your ChemspaceCRM files for installation:

    Locate the directory on the web server in which the ChemspaceCRM directory will be located(most commonly the root directory, or within a subdirectory).
    Unzip ChemspaceCRM into the directory selected in Step 1. This creates a “ChemspaceCRM” directory within your selected parent directory.
    At this stage, you may wish to rename the default “ChemspaceCRM” directory.
    Set ownership of the ChemspaceCRM directory:
        chgrp ApacheUser.ApacheGroup <chemspacecrmroot> -R recursively sets ownership for root directory to Apache user and group.
    The system user that your web server uses varies depending on your operating system. Common web server users are as follows:
        apache (Linux/Apache)
        nobody (Linux/Apache)
        IUSR_computerName (Windows/IIS)

If you are unsure how to set your web server user on your operating system, contact your web server host.

    Set the following permissions on the SuiteCRM directory(Linux):
        sudo chown -R www-data:www-data .
        sudo chmod -R 755 .
        sudo chmod -R 775 cache custom modules themes data upload config_override.php

The commands/steps taken to setting permissions differs dependant on your operating system. If you are experiencing issues with setting permissions on your SuiteCRM instance, visit our support forums.
Recommended installation pre-requisites

    PHP
    JSON
    XML Parsing
    MB Strings Module
    Writable SugarCRM Configuration File (config.php)
    Writeable Custom Directory
    Writable Modules Sub-Directories and Files
    Writable Upload Directory
    Writable Data Sub-Directories
    Writable Cache Sub-Directories
    PHP Memory Limit (at least 128M)
    ZLIB Compression Module
    ZIP Handling Module
    PCRE Library
    IMAP Module
    cURL Module
    Upload File Size
    Sprite Support

### Installing ChemspaceCRM ###

Once you have successfully copied the ChemspaceCRM files to your web server, you need to install ChemspaceCRM by following the on-screen installation wizard. You can navigate to the wizard by entering the following in your web browser: http://<yourServer>/<yourChemspaceCRMDirectory>/install.php. You can perform a typical installation or a custom installation. Typical installation is recommended, but you can choose custom installation for the following reasons: The same Database Admin User should not be used as the ChemspaceCRM database administrator Locale settings should be specified during installation instead of after logging into ChemspaceCRM
### Performing a typical installation of ChemspaceCRM ###

 Launch your browser and enter the following URL: http://<yourServer>/<yourChemspaceCRMDirectory>/install.php
This displays the Welcome page.
  Click Next.
The Installer displays installation instructions and requirements to help determine successful SuiteCRM 
installation.
  Review the information and click Next.
This displays the SuiteCRM License Agreement.
Review the license, check I Accept, and click Next. The installer checks the system for compatibility and then 
displays the Installation Options page.
  Note: 
You can modify any of your settings at any time prior to clicking Install in the Confirm Setting menu. 
To modify any settings, click the Back button on your browser to return to the appropriate page.
  Select Typical Install.
  Click Next. This displays the Database Type page.
  Select the database that is installed on your system and click Next. This displays the Database Configuration 
page.

* a. Enter the database name. The Installer uses “suitecrm” as the default name for the database. You can specify a new name.
* b. Enter the Host Name or the Host Instance for the MySQL, MariaDB or SQL Server. The host name is, by default, set to localhost if your database server is running on the same machine as your web server.
* c. Enter the username and password for the Database Administrator and specify the SuiteCRM Database Username.
* d. Ensure that the Database Administrator you specify has the permissions to create and write to the ChemspaceCRM database.
For My SQL, MariaDB and SQL Server, by default, the Installer selects the Admin User as the ChemspaceCRM Database User. The ChemspaceCRM application uses ChemspaceCRM Database User to communicate with the ChemspaceCRM database. 

To select an existing user, choose Provide existing user from the ChemspaceCRM Database Username drop-down list. To create a new ChemspaceCRM Database user, choose Define user. Enter the database username and password in the relevant fields. Re-enter the password to confirm it. The new user information is displayed in System Credentials on the Confirm Settings page at the end of the installation process.

* e. Accept No as the default value if you do not want the SuiteCRM Demo data. Select Yes to populate the database with the SuiteCRM Demo data.
        

* Click Next. 
The Installer validates the credentials of the specified administrator. If a database with that name already exists, it displays a dialog box asking you to either accept the database name or choose a new database. If you use an existing database name, the database tables will be dropped.
* Click Accept to accept the database name or click Cancel and enter a new name in the Database Name field.
This displays the Site Configuration page.
* Enter a name for the SuiteCRM administrator.
The SuiteCRM administrator (default name admin) has administrative privileges in SuiteCRM. You can change the default username.
* Enter a password for the ChemspaceCRM admin, re-enter it to confirm the password, and click Next.
This displays the Confirm Settings page. The Confirm Settings page displays a summary of the specified settings. 

* Click Back on your browser to navigate to previous pages if you want to change the settings.
* Click Print Summary for a printout of the settings for your records.
* Click Show Passwords and then click Print Summary to include the database user password and the SuiteCRM admin password in the printout. When you click Show Passwords, the system displays the passwords and changes the button name to Hide Passwords. You can click this button to hide the passwords again.
* Click Install.
This displays the Perform Setup page with the installation progress.
* Click Next when the setup is complete.
This displays the Registration page(registration is optional).

* Enter the necessary information and click Send Registration to register your SuiteCRM instance with SuiteCRM; or click No Thanks to skip registration.
This displays the SuiteCRM login page. You can now log into SuiteCRM with the SuiteCRM admin name and password that you specified during installation.
