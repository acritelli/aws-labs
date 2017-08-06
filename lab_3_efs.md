# Lab 3: Create an EFS

We would like to have some storage that can be shared between application server instances. All application servers will mount the web directory from EFS, allowing them to share the same code. Elastic File System (EFS) will provide us with the ability to create an elastic storage system that can be mounted to multiple EC2 instances via NFS.

Note that sharing the same code via a network share isn't something that is recommended in production. Rather, this contrived scenario is used to build familiarity with AWS service offerings.

**Estimated time to complete:** 10 minutes

**Cost:** EFS incurs a cost. Consult the [EFS Pricing Website](https://aws.amazon.com/efs/pricing/) for complete information.

## Step 1: Create a security group for NFS

EFS uses the Network Filesystem (NFS) protocol to present storage to clients. Before we can begin using NFS, we need to create a security group to allow NFS traffic.

Perform the following from the VPC console.

1. Create a security group with the following attributes:
    * Name tag: Allow NFS
    * Group name: Allow NFS
    * Description: Provide something descriptive for the security group
    * VPC: specify your lab VPC
2. Edit the inbound rules of the newly created security group:
    * Allow NFS traffic from your public lab subnet: 10.10.100.0/24

## Step 2: Create an Elastic File System

Perform the following from the EFS console.

1. Create a new file system with the following attributes:
    * VPC: select your lab VPC
    * Mount targets: add mount targets in the private subnet of each availability zone
    * Security groups: specify the security group created in step 1
    * Name: lab-app-filesystem
    * Performance mode: general purpose (default)

## Documentation

Document the information below about your environment. This documentation will be useful during later labs.

| EFS Name           | File System ID | DNS name                                |
| :----------------- | :------------- | :-------------------------------------- |
| lab-app-filesystem | fs-xxxxxxxx    | fs-xxxxxxxx.efs.us-east-1.amazonaws.com |

## Teardown Information

You will incur fees if you do not delete the EFS created during this lab. The teardown process is below.

1. Delete the EFS from the EFS console

## Questions

1. What version(s) of NFS is/are supported by EFS?

2. What makes EFS unique when compared to other types of storage? Why are we using EFS in this scenario? Why are other types of storage, such as S3 or EBS, inappropriate for this scenario?

3. What types of storage are available?

4. What is a mount target?
