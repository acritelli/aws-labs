1. Can a VPC be spread across multiple regions?

No, a VPC is deployed into only one region.

2. What is the largest allowed CIDR block for a VPC?

The largest CIDR block is a /16.

[https://docs.aws.amazon.com/AmazonVPC/latest/UserGuide/VPC_Subnets.html#VPC_Sizing](https://docs.aws.amazon.com/AmazonVPC/latest/UserGuide/VPC_Subnets.html#vpc-subnet-basics)

3. What does enabling "DNS Hostnames" do? Based on your knowledge of the environment that we are building, why might it be necessary?

4. How many availability zones can a subnet be located in?

A subnet can only be located in a single availability zone.

[https://docs.aws.amazon.com/AmazonVPC/latest/UserGuide/VPC_Subnets.html#vpc-subnet-basics](https://docs.aws.amazon.com/AmazonVPC/latest/UserGuide/VPC_Subnets.html#vpc-subnet-basics)

5. What are the allowed CIDR ranges of a subnet?

6. How many IPs are reserved by AWS in a subnet? What are they used for?

[https://docs.aws.amazon.com/AmazonVPC/latest/UserGuide/VPC_Subnets.html#VPC_Sizing](https://docs.aws.amazon.com/AmazonVPC/latest/UserGuide/VPC_Subnets.html#VPC_Sizing)

7. What happens to a subnet if it is not associated with a specific routing table?

The subnet is associated with the main routing table, which is created at the same time as the VPC.

[https://docs.aws.amazon.com/AmazonVPC/latest/UserGuide/VPC_Subnets.html#SubnetRouting](https://docs.aws.amazon.com/AmazonVPC/latest/UserGuide/VPC_Subnets.html#SubnetRouting)

8. Building on the answer to the previous question: why is it a good idea to explicitly create a "public" routing table for the Internet Gateway association?

Creating a "public" routing table ensures that only specifically authorized subnets are Internet accessible. New subnets must be manually placed into this separate routing table. While it would be possible to add an Internet or NAT gateway to the default routing table, this would result in newly created subnets being Internet accessible (or have Internet access) by default, and this might not be expected behavior.
