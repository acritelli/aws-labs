# Work in progress, don't actually use any of this.

**Read the introduction in its entirety. It will actually be useful to understand the rest of the labs**

The goal of this series of labs is to act as a basic introduction to several services that are available through Amazon Web Services. Each lab also contains a set of questions to build knowledge in different areas of AWS. These labs also seek to help you actually build something, instead of simply deploying services without any higher purpose. While the web application that we're going to build is fairly contrived, it should still serve as a good introduction to the features and functionality of AWS.

This specific series of labs is currently designed to provide hands-on experience with the following services and features:

  * Identity and Access Management
  * Virtual Private Cloud (VPC)
    * Security Groups
    * Internet and NAT Gateways
    * Subnets and routing tables
  * Relational Database Service (RDS)
    * MySQL
    * Read Replicas
  * Elastic Compute Cloud (EC2)
    * Amazon Machine Images (AMI)
    * Auto Scaling Groups
    * Elastic Load Balancing
  * Elastic File System (EFS)

## Scenario and Topology

< Image of topology >

Screenshot of web app

We will be deploying a very simple web application during this series of labs. The application is designed to host photos for your photography website. It uses a very simple MySQL backend database to hold URL links to the images. A single administrative instance allows connectivity to a master MySQL database to add new images to the site. A set of web servers in an auto scaling group allow for public connectivity to view the website. These publicly accessible servers connect to a read replica of the MySQL database, and are unable to make any database changes. The actual PHP code for the web application is hosted on an EFS share that each web server instance connects to.

If this web app sounds ridiculously contrived, that's because it is. It's not designed to be a completely realistic application. Rather, it is designed to showcase services and features in AWS. You probably wouldn't use a database read replica in the real world to enforce security (MySQL users and permissions are good at that sort of thing). However, by seeing the effects of deploying a read replica, you can better understand their capabilities. **This is important:** Please view the application deployed in these labs as a pedagogical tool for teaching AWS, and not as a recommended application architecture.

## Assumptions

These labs assume that you can navigate the AWS web console and perform instructions without completely detailed direction. For example: the lab will ask you to deploy an EC2 instance with a set of attributes (instance size, AMI, etc). The lab **will not** walk you through each screen of the EC2 deployment with screenshots and painfully specific instructions (i.e. click here, then click here, etc).

You **do not** need to be an expert or even an advanced novice to perform these labs. As long as you are comfortable pointing and clicking your way around the AWS console, you should be good.

**Region:** The labs also assume that you are using the us-east-1 region, but you are free to use any region that you like. Be sure to check if all of the services used in the labs are supported in your regoin (i.e. EFS is only available in certain regions).

**Costs:** Be sure to fully understand the costs associated with any services that you deploy. This entire series of labs can be accomplished in one sitting for less than $5. Each lab contains teardown instructions for deleting the infrastructure that was created, so that you avoid incurring costs. Be sure that you thoroughly destroy any unneeded infrastructure when you are done, or you may incur fees. Each lab builds on the previous lab, so it is best to complete the series in one shot. Otherwise, you will either have to leave infrastructure running between labs or rebuild previous infrastructure to pick back up where you left off. Either option will result in additional costs.

## Lab Format

Labs will generally adhere to the format below.

1. **Overview:** provides an overview of the infrastructure that is being built

2. **Steps:** a series of steps to actually deploy the infrastructure. These are typically high level (i.e. launch a new RDS instance with specified parameters).

3. **Documentation:** specifies the important information about your infrastructure that sould be documented. This information will be useful in future labs, as they build off each other.
    * Documentation is also a useful way to understand the relationships between pieces of infrastructure "under the hood." This can be especially valuable when you begin working with the AWS APIs and SDKs, as you will typically be referencing services by their ID.

4. **Teardown Information:** details about how to destroy the infrastructure that was provisioned during the lab. For some labs this may be necessary to avoid costs (i.e. when an EC2 instance has been provisioned).
    * Keep in mind that each lab builds off the previous lab, so it may be best to complete all of them in one sitting to avoid the need to rebuild infrastructure.
    * Alternatively, you can teardown and rebuild the labs frequently to gain better familiarity.

## Getting Started

Now that you're read the intro, feel free to move on to Lab 0.
