# Lab 2: Deploy RDS

Now that we have a VPC to place our resources into, we will create a database for the backend of our web application. Our database will start off very simple: just a single RDS instance to support the initial deployment of our app. Future labs will build on this database to add additional functionality.

**Estimated time to complete:** 30 minutes

Cost - RDS incurs a cost. Consult the [RDS Pricing Website](https://aws.amazon.com/rds/pricing/) for complete information.

**Estimated time to complete:** 30 minutes

## Step 1: Create a security group for MySQL

Before we can deploy an RDS instance, it helps to have a defined security group to allow MySQL traffic. For now, we will create a very permissive group and then later refine these permissions during later labs.

Perform the following from the VPC console.

1. Create a security group with the following attributes:
    * Name tag: Lab Allow MySQL
    * Group name: Lab Allow MySQL
    * Description: Provide something descriptive for the security group
    * VPC: specify your lab VPC
2. Edit the inbound rules of the newly created security group:
    * Allow MySQL/Aurora traffic from your public lab subnet: 10.10.100.0/24

## Step 2: Create a Subnet group

Perform the following from the RDS console.

1. Create a new Subnet group with the following attributes:
    * Name: lab-subnet-group
    * Description: Provide something descriptive for your subnet group
    * VPC ID: Specify the Lab VPC created earlier
2. Add both private subnets to the group

## Step 3: Launch an RDS Instance

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
      * Specify the subnet group created previously
      * Specify the same availability zone as the AZ created for your public subnet
      * Specify the security group created previously
    * Publicly accessible - no
5. Configure the database name as: testapp
6. Leave the remaining settings at their default values

## Documentation

Document the information below about your environment. This documentation will be useful during later labs.

| RDS Instance Identifier    | Endpoint                                        | Master Username | Master Password |
| :------------------------- | :---------------------------------------------- | :-------------- | :-------------- |
| lab-db                     | lab-db.xxxxxxxxxxxx.us-east-1.rds.amazonaws.com |                 |                 |

**Be sure to keep the master username and password private**

## Teardown Information

You will incur fees if you do not terminate the RDS instance created during this lab. The teardown process is below.

1. Delete the RDS instance from the RDS console.

## Questions

1. What is a DB subnet group?

2. What is multi-AZ? Is it used for increased capacity or availability? Are there different endpoints for each database instance in a multi-AZ configuration?

3. There was an option for configuring a parameter group. This option was left at its default value. Explain what a parameter group is.

4. Do you have any access to the underlying operating system of an RDS instance?
