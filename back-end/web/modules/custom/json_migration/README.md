# Migration & Custom tweaks provider

This module provides the migration configuration, listing the data of users and company.

## Installation

1. Run ```Composer install``` command. ( which installs one patch & library for geofield )

2. Execute ```ddev drush cim``` command. ( Imports the configuration required for our site )

3. Now For Executing migration run below command

   For migrating COMPANY data

   ``` ddev drush mim company_data_migration --update ```

   For migrating USERS data

   ``` ddev drush mim user_data_migration --update ```


## Listing data

To view the content of Users & Company

Navigate to ```/data``` url

