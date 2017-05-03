1. What version(s) of NFS is/are supported by EFS?

2. What makes EFS unique when compared to other types of storage? Why are we using EFS in this scenario? Why are other types of storage, such as S3 or EBS, inappropriate for this scenario?

EFS is unique because it presents an elastic filesystem that can be mounted by **multiple** EC2 instances. This contrasts with a service like EBS, which is only mountable by a single instance at a time.

EFS is useful in our scenario because it allows us to have a mountable filesystem across multiple EC2 instances. Our topology uses shared storage for the backend web code. This would not be possible using EBS, as we can only have an EBS volume attached to a single instance. While we could probably write code to use the S3 API to constantly download and refresh our backend web code, that would not be ideal. S3 isn't a mountable filesystem.

3. What types of storage are available?

4. What is a mount target?
