# Lab 5: Create an RDS Read Replica and Amazon Machine Image

The publicly accessible webservers will be placed into an auto scaling group. These instances will have access to an RDS Read Replica, which will provide these publicly accessible servers with read-only access to the MySQL database. Auto scaling groups launch instances based on a launch configuration, which specifies the Amazon Machine Image (AMI) used to launch the instance.

To build this part of the infrastructure, we must first create an RDS read replica that our public instances will connect to. Then we will modify our existing instance to use this read replica and create an AMI based on the instance.

Cost - RDS Read Replicas will incur a cost. So will instances launched in an auto scaling group.

**Estimated time to complete:** 45 minutes

## Step 1: Create an RDS Read Replica

We must first create an RDS read replica that will be configured in our AMI.

Perform the following from the RDS console.

1. Select your existing RDS instance
2. From the "Instance Actions" dropdown, select "Create Read Replica"
3. Set the DB Instance Identifier to lab-db-rr
4. Leave all other values at their defaults
5. Create the read replica. This may take several minutes

## Step 2: Modify the web application to use the read replica

We must now configure the web app on our existing EC2 instance to use the read replica. We will revert this configuration back once we have created the AMI for our publicly accessible auto scaling group.

Connect to your instance over SSH and perform the following.

1. Open /var/www/config.php in your text editor of choice
2. Change the $server FQDN to the endpoint of your newly created Read Replica

## Step 3: Test the reconfigured web application

Our web application is now (temporarily) configured to use a read-only MySQL database. Any attempt to add new images to our site should fail. Before proceeding, let's test this out to confirm.

Perform the following from a browser.

1. Navigate to the public DNS name or IP address of your instance
2. Navigate to the "Admin" section of the interface
3. Try to link a new photo, as done in previous labs
    * The upload attempt should fail and a MySQL message should be displayed indicating that the server is read-only

## Step 4: Create an AMI

We will create an Amazon Machine Image (AMI) to launch copies of our public instances into our Auto Scaling Group. Perfom the following from the EC2 console.

1. Select your App Master instance
2. Select Actions > Image > Create Image and create an image with the following attributes:
    * Image name: app-public-image
    * Image description: Provide something descriptive for the AMI
3. Create the image
    * Note: creating an AMI will cause your instance to reboot, and you will lose connectivity during the reboot process.

## Step 5: Revert the web app configuration

Now that we have created an AMI for our auto scaling group, it is safe to revert the configuration of the web application to use the master database. Remember, the current EC2 instance will be used to manage the web application, and access to the interface will be restricted by IP address.

Connect to your instance over SSH and perform the following.

1. Open /var/www/config.php in your text editor of choice
2. Change the $server FQDN to the endpoint of your original RDS instance
    * This will allow for write operations

## Documentation

Document the information below about your environment. This documentation will be useful during later labs.

| RDS Instance Identifier    | Endpoint                                           |
| :------------------------- | :------------------------------------------------- |
| lab-db                     | lab-db-rr.xxxxxxxxxxxx.us-east-1.rds.amazonaws.com | 

| AMI Name         | AMI ID       |
| :--------------- | :----------- |
| app-public-image | ami-xxxxxxxx |

## Teardown Information

You will incur fees if you do not delete the RDS Read Replica and AMI created during this lab. The teardown process is below.

1. Delete the Read Replica and Master RDS instances from the RDS Dashboard
2. Deregister the AMI from the EC2 Dashboard
3. Delete the snapshot created for the AMI from the "Snapshots" section on the EC2 Dashboard

## Questions

1. When deploying the read replica, there was an option for enhanced monitoring. This option was also present when deploying the original RDS instance. Explain what Enhanced Monitoring can provide. What is the difference between using Enhanced Monitoring versus the standards CloudWatch metrics that could be collected?

2. Should read replicas be used for increased availability or increased database performance?

3. Imagine that you create a read replica for your application, but later discover that you would like to use the instance as a normal database with read and write permissions. How can you achieve this?

4. Why did the attempt to publish an image during step 3 fail?

5. Describe some different ways that you could share an AMI with others.

6. Do the public DNS name and IP address of an instance change during reboot?
