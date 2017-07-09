# Lab 0: Create an IAM user

AWS provides very powerful constructs for managing permissions across resources. Granular permissions can be assigned to users and groups, with the ability to create accounts for console access and API access. Additionally, specific roles can be created and assigned to resources, which provides the flexibility to manage permissions at the resource level.

**Estimated time to complete:** 10 minutes
**Cost:** No cost is associated with this lab

## Step 1: Create a group for lab use

Perform the following from the IAM console.

1. Create a new group with a descriptive name, such as "labgroup"
2. Attach full access policies for the following services:
    * VPC
    * EC2
    * Elastic File System
    * RDS

## Step 2: Create the user needed for lab activities

Perform the following from the IAM console.

1. Add a new user
2. Specify a desired user name
    * This user should only be used for this series of labs, so use something descriptive like "labuser"
3. Specify the Access Type as "AWS Management Console access"
4. Use a custom password of your choice
5. Uncheck the setting for "Require password reset"
6. Assign the user to the group created in Step 1

## Step 3: Log in as the newly created user

1. Navigate to the IAM users sign-in link
    * This can be found on the front page of the IAM console
2. Ensure that you can log in as your newly created IAM user
3. Perform subsequent lab activities using this user

## Documentation

Document the information below about your environment. This documentation will be useful during later labs.

**Be sure to keep the created username and password private**

| Username | Password | Group    |
| :------- | :------- | :------- |
| labuser  |          | labgroup |

| Group Name | Policies |
| :--------- | :------- |
| labgroup   |          |

## Teardown Information

None of the resources provisioned during this lab will incur any costs. However, the teardown process is below.

1. Delete the user that was created in the IAM console
2. Delete the group that was created in the IAM console

## Questions

1. What is the difference between programmatic access and AWS management console access? When would each type of access be appropriate?

2. Review the Policies page on the IAM console. What data format are policies written in?
