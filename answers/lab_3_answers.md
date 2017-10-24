1. What version(s) of NFS is/are supported by EFS?

NFSv4.0 and NFSv4.1, with 4.1 being the recommended version.

[https://docs.aws.amazon.com/efs/latest/ug/mounting-fs.html#mounting-fs-nfs-info](https://docs.aws.amazon.com/efs/latest/ug/mounting-fs.html#mounting-fs-nfs-info)

2. What makes EFS unique when compared to other types of storage? Why are we using EFS in this scenario? Why are other types of storage, such as S3 or EBS, inappropriate for this scenario?

EFS is unique because it presents an elastic filesystem that can be mounted by **multiple** EC2 instances. This contrasts with a service like EBS, which is only mountable by a single instance at a time.

EFS is useful in our scenario because it allows us to have a mountable filesystem across multiple EC2 instances. Our topology uses shared storage for the backend web code. This would not be possible using EBS, as we can only have an EBS volume attached to a single instance. While we could probably write code to use the S3 API to constantly download and refresh our backend web code, that would not be ideal. S3 isn't a mountable filesystem.

3. What types of storage performance are available?

AWS offers two types of storage performance: General Purpose and Max I/O. General purpose storage is the default, and is optimized for latency-ensitive workloads. Max I/O is optimized for higher aggregate throughput and operations, but will experience slightly higher latency.

[http://docs.aws.amazon.com/efs/latest/ug/performance.html#performancemodes](http://docs.aws.amazon.com/efs/latest/ug/performance.html#performancemodes)

4. What is a mount target?

A mount target is an endpoint for NFS connectivity to an EFS. Mount targets are IP addresses in an availability zone. Instances within that availability zone connect to the mount target via NFS to access the EFS. NFS mounting is done using the DNS name of the mount target.

[http://docs.aws.amazon.com/efs/latest/ug/how-it-works.html](http://docs.aws.amazon.com/efs/latest/ug/how-it-works.html)