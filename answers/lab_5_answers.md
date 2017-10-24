1. When deploying the read replica, there was an option for enhanced monitoring. This option was also present when deploying the original RDS instance. Explain what Enhanced Monitoring can provide. What is the difference between using Enhanced Monitoring versus the standards CloudWatch metrics that could be collected?

2. Should read replicas be used for increased availability or increased database performance?

Read replicas are used for increased database performance for operations that require additional database reads, but do not need database writes. A read replica doesn't provide any additional database availability.

3. Imagine that you create a read replica for your application, but later discover that you would like to use the instance as a normal database with read and write permissions. How can you achieve this?

The read replica can be promoted to a stand-alone database.

[https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/USER_ReadRepl.html#USER_ReadRepl.Promote](https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/USER_ReadRepl.html#USER_ReadRepl.Promote)

4. Why did the attempt to publish an image during step 3 fail?

The application configuration was using the RDS Read Replica. This database is read only, and will not permit write operations.

5. Describe some different ways that you could share an AMI with others.

AMIs can be shared by making them public or by only sharing them with specific AWS accounts. Making an AMI public will make it available to all AWS users in a region through the Community AMIs page. Alternatively, an AMI can be shared with specific AWS accounts if their account ID is known.

[http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/sharingamis-intro.html](http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/sharingamis-intro.html)
[http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/sharingamis-explicit.html](http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/sharingamis-explicit.html)

6. Do the public DNS name and IP address of an instance change during reboot?

No.
