# Lab 5: Create an RDS Read Replica and Amazon Machine Image

The publicly accessible webservers will be placed into an auto scaling group. These instances will have access to an RDS Read Replica, which will provide these publicly accessible servers with read-only access to the MySQL database. Auto scaling groups launch instances based on a launch configuration, which specifies the Amazon Machine Image (AMI) used to launch the instance.

To build this part of the infrastructure, we must first create an RDS read replica that our public instances will connect to. Then we will modify our existing instance to use this read replica and create an AMI based on the instance.

**Estimated time to complete:** 45 minutes

## Step 1: Create an RDS Read Replica

We must first create an RDS read replica that will be configured in our AMI.

Perform the following from the RDS console.

1. Select your existing RDS instance.
2. From the "Instance Actions" dropdown, select "Create Read Replica"
3. Set the DB Instance Identifier to lab-db-rr
4. Leave all other values at their defaults.
5. Create the read replica. This may take several minutes.
6. Once the read replica has been deployed, record the relevant information in the lab documentation section.

## Step 2: Modify the web application to use the read replica

We must now configure the web app on our existing EC2 instance to use the read replica. We will revert this configuration back once we have created the AMI for our publicly accessible auto scaling group.

Connect to your instance over SSH and perform the following.

## Step 3: Test the reconfigured web application

Perform the following from a browser.

1. Navigate to the public DNS name or IP address of your instance.
2. Navigate to the "Admin" section of the interface.
3. Try to link a new photo, as done in previous labs.
    * The upload attempt should fail and a MySQL message should be displayed.

## Step 4: Create an AMI

Note: creating an AMI will cause your instance to reboot, and you will lose connectivity during the reboot process.

## Step 5: Revert the web app configuration

Now that we have created an AMI for our auto scaling group, it is safe to revert the configuration of the web application to use the master database. Remember, the current EC2 instance will be used to manage the web application, and access to the interface will be restricted by IP address.

Connect to your instance over SSH and perform the following.

## Documentation

## Teardown Information

Don't forget to delete snapshot after deregistering AMI.

## Questions

1. When deploying the read replica, there was an option for enhanced monitoring. This option was also present when deploying the original RDS instance. Explain what Enhanced Monitoring can provide. What is the difference between using Enhanced Monitoring verus the standards CloudWatch metrics that could be collected?

2. Should read replicas be used for increased availability or increased database performance?

3. Imagine that you create a read replca for your application, but later discover that you would like to use the instance as a normal database with read and write permissions. How can you achieve this?

4. Why did the attempt to publish an image during step 3 fail?

5. Describe some different ways that you could share an AMI with others.

6. Do the public DNS name and IP address of an instance change during reboot?
