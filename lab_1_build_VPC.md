# Lab 1: Build a VPC

Before deploying any other services into the lab environment, we must create a virtual private cloud (VPC). A VPC is like a virtual datacenter, spread across multiple availability zones within a region. Our VPC will contain the EC2 instances, RDS databases, and all other services that support our lab environment.

**Estimated time to complete:** 30 minutes

**Cost:** No cost is associated with this lab

## Step 1: Create a new VPC for the lab environment

**Note:** Be sure to select the desired region for your lab activities. These activities were performed in the *US East - N. Virginia* region when written.

1. Create a new VPC with the following attributes:
    * Name tag: Lab VPC
    * IPv4 CIDR block: 10.10.0.0/16
2. Ensure that DNS Resolution is enabled for the VPC
    * This can be checked via Actions -> Edit DNS Resolution
3. Ensure that DNS Hostnames are enabled
    * This can be checked via Actions -> Edit DNS Hostnames

## Step 2: Create the necessary subnets

We must now create the necessary subnets. All subnets below should be deployed into your Lab VPC.

1. Create a private subnet with the following attributes:
    * Name tag: Lab private subnet 1
    * Availability Zone: choose an AZ for this subnet
    * IPv4 CIDR block: 10.10.10.0/24
2. Create an additional private subnet with the following attributes:
    * Name tag: Lab private subnet 2
    * Availability Zone: choose a **different** AZ for this subnet
    * IPv4 CIDR block: 10.10.20.0/24
3. Create a public subnet with the following attributes:
    * Name tag: Lab public subnet
    * Availability Zone: place into the same AZ as one of the private subnets
      * This is done to allow EC2 and RDS to communicate within the same availability zone to reduce costs later
    * IPv4 CIDR block: 10.10.100.0/24
    * Modify this subnet to automatically distribute public IP addresses.
      * This can be done via Subnet Actions -> Modify auto-assign IP settings

## Step 3: Provide Internet connectivity to the public subnet

Instances deployed into the public subnet should have direct Internet connectivity, as they represent the web front-end for the environment. To prevent unnecessary costs, we will start by only deploying an Internet Gateway. Unlike a NAT Gateway or Instance, an Internet Gateway does not incur any costs.

1. Create an Internet Gateway
2. Attach the Internet Gateway to the Lab VPC

## Step 4: Create a public route table

Now that we have attached an Internet Gateway to our VPC, we need to configure routing to provide Internet connectivity to the appropriate subnets.

1. Create a route table with the following attributes:
    * Name tag: Lab public route table
    * VPC: Place into the Lab VPC
2. Add a default route with the following attributes:
    * Destination: 0.0.0.0/0
    * Target: The previously created Internet Gateway
3. Add a subnet association for the Lab pubic subnet

## Documentation

Document the information below about your environment. This documentation will be useful during later labs.

| VPC Name       | VPC ID         |
| :------------- | :------------- |
| Lab VPC        | vpc-xxxxxxxx   |

| Subnet Name          | Subnet CIDR    | Availability Zone | Subnet ID       |
| :------------------- | :------------- | :---------------- | :-------------- |
| Lab private subnet 1 | 10.10.10.0/24  | us-east-xx        | subnet-xxxxxxxx |
| Lab private subnet 2 | 10.10.20.0/24  | us-east-xx        | subnet-xxxxxxxx |
| Lab public subnet    | 10.10.100.0/24 | us-east-xx        | subnet-xxxxxxxx |

## Teardown Information

None of the resources provisioned during this lab will incur any costs. However, the teardown process is below.

1. Delete the Lab VPC from the VPC console
    * This will remove all subnets, Internet Gateways, and Route Tables that were created.

## Questions

Answer the questions below based on the lab exercise and AWS documentation.

1. Can a VPC be spread across multiple regions?

2. What is the largest allowed CIDR block for a VPC?

3. What does enabling "DNS Hostnames" do? Based on your knowledge of the environment that we are building, why might it be necessary?

4. How many availability zones can a subnet be located in?

5. What are the allowed CIDR ranges of a subnet?

6. How many IPs are reserved by AWS in a subnet? What are they used for?

7. What happens to a subnet if it is not associated with a specific routing table?

8. Building on the answer to the previous question: why is it a good idea to explicitly create a "public" routing table for the Internet Gateway association?
