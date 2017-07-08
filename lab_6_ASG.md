# Lab 6: Create an Auto Scaling Group

The publicly accessible webservers that host our application will be placed into an auto scaling group (ASG). This will allow the number of instances to dynamically scale during periods of increased demand.

**Estimated time to complete:** 1 hour

Cost - 

## Step 1: Create a security group

Our auto scaling group is designed to be publicly accessible. To accomplish this, we must create a security group that permits inbound web traffic.

Perform the following from the VPC console.

1. Create a security group with the following attributes:
    * Security Group name: Lab Public Web Access
    * Description: Provide something descriptive for the security group
    * VPC: specify your lab VPC
2. Edit the inbound rules of the newly created security group:
    * Allow web (HTTP) traffic from any source
    * Allow SSH from only your IP address

*Fun fact:* as of this writing, the security group must be configured from the EC2 console, even though the launch configuration wizard provides an option to create a new security group. The launch configuration wizard's security group does **not** provide the ability to select the VPC for the security group, and this results in a subnet/security group mismatch when you try to save the final launch configuration.

## Step 2: Create a launch configuration

Auto scaling groups must be associated with a specific launch configuration. The launch configuration can be changed as needed without recreating the entire ASG.

Perform the following from the launch configuration section of the EC2 console.

1. Create a new Auto Scaling Group
    * You will be prompted to first create a launch configuration
    * Use the default values during the configuration, unless otherwise specified
2. Specify the AMI that was created during Lab 5
    * This can be found under the "My AMIs" tab
3. Specify an instance size of t2.micro
4. Configure the name: Lab_Launch_Config_Version_1
    * *Fun fact:* The AWS console will allow you to use spaces. However, spaces cause an error when you try to apply the launch configuration to the auto scaling group during the next wizard.
5. Under "Advanced Details" configure the settings needed to assign a public IP address to every instance
6. Use the security group that was created during the earlier step


## Step 3: Create an auto scaling group

Now that we have a launch configuration, we can create an auto scaling group. The previous wizard should have automatically lead you into the deployment wizard for an ASG.

Create an auto scaling group with the following attributes.

1. Group name: Lab ASG
2. Group size: Start with 1 instance
3. Network and subnet: specify your Lab VPC and public subnet
4. Configure scaling properties to adjust the capacity of the group
    * Scale between 1 and 3 instances
5. Click on "Scale the Auto Scaling group using step or simple scaling policies"
6. Set the Increase Group Size to the following attributes:
    * Click on "Create a simple scaling policy"
    * Add a new alarm with the following attributes:
        * Uncheck the notification
        * Whenever Average of CPU Utilization is **>** 75% for at least 1 consecutive period of 5 minutes
        * Name the alarm "Lab-ASG-High-CPU"
    * Set the action to add 1 instance
7. Set the Decrease Group Size to the following attributes:
    * Click on "Create a simple scaling policy"
    * Add a new alarm with the following attributes:
        * Uncheck the notification
        * Whenever Average of CPU Utilization is **<** 75% for at least 1 consecutive period of 5 minutes
        * Name the alarm "Lab-ASG-Low-CPU"
    * Set the action to remove 1 instance
8. Add a notification for the auto scaling group to notify your email address whenever instances are launched or terminated
9. Create the ASG
10. Ensure that your ASG deployed successfully by viewing the "Activity History" of the ASG
    * You should see a successful launch of a new EC2 instance.

## Step 4: Test the ASG

The ASG should have deployed a single instance, as this was the minimum number of instances specified during its creation. We can now test the ASG to ensure that it is responding to changes as expected.

1. Ensure that you can navigate to the web app on the newly created instance via a web browser
    * The newly created instance will appear in your EC2 dashboard, where you can find the public IP address
2. Try adding an image from the admin panel
    * This should fail, as the ASG instances are pointed at the read replica
3. Connect to the instance via SSH and begin a stress test
    * stress -c 5
4. Wait for at least 5 minutes
5. Navigate to the Instances page and review the "Monitoring" tab for the ASG instance
    * The spike in CPU utilization should be visible after a few minutes
6. Navigate back to the ASG page and review the "Activity History"
    * An event should be visible for a newly launched instance
    * Review the event details to see *why* the event occurred
7. Wait a few minutes for this second instance to be created
8. Navigate to the web app on the second instance via a web browser
    * The web application should be displayed successfully
9. Wait for at least 5 minutes
    * If overall CPU utilization is still greater than 75%, an additional instance may be launched by the ASG
10. Stop the stress test on the original instance
11. Navigate to the "Monitoring" tab on the ASG page and switch the display to EC2
    * You should notice that the average CPU utilization has dropped below 75%
12. Review the "Activity History" for the ASG
    * The drop in average CPU utilization should have triggered a Decrease Group Size event

## Documentation

You're in luck: there isn't really anthing that needs to be documented here!

## Teardown Information

You will incur fees if you do not delete the instances created by your ASG. Deleting the instances themselves won't work: the ASG will just launch new instances. Therefore, the entire ASG needs to be deleted. The teardown process is below.

1. Delete the ASG, Launch Configuration, and Security Group from the EC2 Dashboard
    * You will not incur fees for the Launch Configuration or Security Group

## Questions

1. Explain the difference between a simple scaling policy and a scaling policy with steps.

2. What types of notifications can be created for an auto scaling group? Are emails the only option?

3. When monitoring CPU utilization, you may notice that it takes a few minutes for the metrics to populate. Why is this? Is there a way to enable more frequent logging of performance metrics?

4. Where would you go to view the status of the alarms that were created for your ASG?

5. What happens when a launch configuration is changed on a running ASG? Are instances immediately terminated and recreated with the new launch configuration?
