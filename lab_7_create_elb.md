# Lab 7: Create an Elastic Load Balancer

Now that we have deployed an auto scaling group to contain our public instances, we can place an Elastic Load Balancer (ELB) in front of our publicly accessible instances. This will allow for better traffic distribution across the group of public instances. Additionally, it provides for a much better user experience: an ELB can have a single DNS name, instead of having to manually navigate to the address of individual instances within the ASG.

**Estimated time to complete:** 45 minutes

Cost - 

# Step 1: Deploy an ELB

Perform the following from the Load Balancers section of the EC2 console.

1. Create a new classic load balancer
2. Set the load balancer name to "Lab-ELB"
3. Create the load balancer within your Lab VPC and public subnet
4. Leave the load balancer and instance protocol and port set to HTTP/80
5. Use the existing security group that permits web traffic from anywhere and SSH from your IP only
6. Configure the health check with the following attributes:
    * Ping path: /index.php
    * Advanced details:
      * Response timeout: 2
      * Interval: 5
      * Unhealthy threshold: 2
      * Healthy threshold: 2
7. Do not add any EC2 instances to the load balancer
    * We will add the load balancer to the ASG in the next step
8. Uncheck "enable connection draining"
9. Create the ELB
10. 

## Step 2: Connect the ELB to ASG

Perform the following from the auto scaling groups page of the EC2 console.

1. Select the previously created ASG and choose "Edit" from the "Actions" menu
2. Specify the newly created ELB as the load balancer for the group
3. Save your changes

## Step 3: Test basic ELB functionality

Now that we have an ELB deployed, we can begin to test it.

Perform the following.

1. Navigate to the DNS name of the ELB
    * Our web app should load
2. Navigate to the public IP address of the **admin** instance
3. Navigate to the Admin page
4. Add a new picture
5. Navigate to the DNS name of the ELB and ensure that the new picture is visible

## Step 4: Test failover ELB functionality

Now that we are confident in the basic functionality of the ELB, we want to ensure that it can handle instance failover situations. To accomplish this, we will simulate a failed instance.

Perform the following.

1. Edit your ASG from the "Auto Scaling Groups" section of the EC2 Dashboard
    * Change the number of Desired instances to 2
    * This will cause the ASG to launch a total of 2 instances at all times
2. Navigate to the "Load Balancers" section of the EC2 Dashboard and review the Instances tab for your load balancer
    * You should see both instances from the ASG listed and InService
    * This may take a few minutes
3. Navigate to the DNS name of the ELB and ensure that the web app loads
4. Simulate an instance failure by stopping (**not terminating**) one of the public instances from the "Instances" section of the EC2 Dashboard
5. Review the Instances tab for the ELB. You should notice that the stopped instance is now marked OutOfService
6. Navigate to the DNS name of the ELB and ensure that the web app still loads

## Documentation

Document the information below about your environment. 

| ELB Name | DNS Name                                       |
| :------- | :--------------------------------------------- |
| Lab-ELB  | Lab-ELB-xxxxxxxxxx.us-east-1.elb.amazonaws.com |

## Teardown Information

You will incur fees if you do not delete the ELB instance created during this lab. The teardown process is below.

1. Delete the ELB from the Load Balancers page of the EC2 console

## Questions

1. Explain the differences between an Application Load Balancer and a Classic Load Balancer

2. What is an internal load balancer?

3. What is the difference between the load balancer protocol and port, and the instance protocol and port?

4. During the lab, you changed the values of several load balancer timers. Explain the purpose of each timer:
    * Response timeout
    * Interval
    * Unhealthy threshold
    * Healthy threshold

5. What is connection draining? Why would it be useful?

6. What type of Route53 record would be necessary to point the zone apex at an elastic load balancer?
