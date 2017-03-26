# Lab 2: Deploy RDS

Now that we have a VPC to place our resources into, we will create a database for the backend of our web application. Our database will start off very simple: just a single RDS instance to support the initial deployment of our app. Future labs will build on this database to add additional functionality.

Cost - .017/hour in NoVA + .01 per GB of data transfer to EC2 instance, also in NoVA (different AZs). Latter not applicable if deployed in same AZ + .0115 per GB-month (need to calc based on hours/size of 5GB minimum)

**Estimated time to complete:** 30 minutes

Create a DB subnet group - may not be necessary**
  Obtain the AZ of your private subnet from the VPC screen
  Question: Explain what a DB subnet group is

## Step 1: Create a security group for MySQL

Before we can deploy an RDS instance, it helps to have a defined security group to allow MySQL traffic. For now, we will create a very permissive group and then later refine these permissions during later labs.

Perform the following from the VPC console.

1. Create a security group with the following attributes:
    * Name tag: Allow MySQL
    * Group name: Allow MySQL
    * Description: Provide something descriptive for the security group
    * VPC: specify your lab VPC
2. Edit the inbound rules of the newly created security group:
    * Allow MySQL/Aurora traffic from any source
    * We will further refine these rules during later labs

## Step2: Launch an RDS Instance

Perform the following from the RDS console.

1. Launch an RDS instance with the following attributes:
    * Engine: MySQL
    * DB instance class: db.t2.micro
    * No multi-AZ
    * Leave remaining settings at their defaults
2. Set the instance identifier to lab-db
3. Set the username and password to your desired values
    * Be sure to write down this information
4. Configure the Advanced Settings with the following attributes:
    * Network & Security
      * Set the VPC to your Lab VPC
      * Specify your two private subnets <--- TODO: check this
      * Specify the security group created in step 1
    * Publicly accessible - no
5. Configure the database name as: testapp

## Documentation

Document the information below about your environment. This documentation will be useful during later labs.

| RDS Instance Identifier    | Endpoint                                        | Master Username | Master Password |
| :------------------------- | :---------------------------------------------- | :-------------- | :-------------- |
| Lab-DB                     | lab-db.xxxxxxxxxxxx.us-east-1.rds.amazonaws.com |                 |                 |

**Be sure to keep the master username and password private**

## Teardown Information

You will incur fees if you do not terminate the RDS instance created during this lab. The teardown process is below.

1. Delete the RDS instance from the RDS console.

## Questions

1. What is a DB subnet group? Why didn't we need one when deploying our RDS instance?

2. What is multi-AZ? Is it used for increased capacity or availability? Are there different endpoints for each database instance in a multi-AZ configuration?

3. There was an option for configuring a parameter group. This option was left at its default value. Explain what a parameter group is.

4. Do you have any access to the underlying operating system of an RDS instance?
