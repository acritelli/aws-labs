# Lab 0: Create an IAM user

AWS provides very powerful constructs for managing permissions across resources. Granular permissions can be assigned to users and groups, with the ability to create accounts for console access and API access. Additionally, specific roles can be created and assigned to resources, which provides the flexibility to manage permissions at the resource level.

## Step 1: Create a group for lab use

Perform the following from the IAM console.

## Step 2: Create the user needed for lab activities

Perform the following from the IAM console.

1. Add a new user
2. Specify a desired user name.
    * This user should only be used for this series of labs, so use something descriptive like "labuser"
3. Specify the Access Type as "AWS Management Console access"
4. Use a custom password of your choice
5. Uncheck the setting for "Require password reset"

## Step 3: Log in as the newly created user

Create a user with the correct permissions for all other labs.

Permissions:
  Create VPCs, subnets, IGs, SGs
  Create AMIs
  Create EC2 instances
  Create ASGs
  Create ELBs
  Create RDS DBs and RRs
  Create EFS

## Questions

1. What is the difference between programmatic access and AWS management console access? When would each type of access be appropriate?
