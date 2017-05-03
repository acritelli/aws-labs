1. When deploying the read replica, there was an option for enhanced monitoring. This option was also present when deploying the original RDS instance. Explain what Enhanced Monitoring can provide. What is the difference between using Enhanced Monitoring verus the standards CloudWatch metrics that could be collected?

2. Should read replicas be used for increased availability or increased database performance?

Read replicas are used for increased database performance for operations that require additional database reads, but do not need database writes. A read replica doesn't provide any additional database availability.

3. Imagine that you create a read replca for your application, but later discover that you would like to use the instance as a normal database with read and write permissions. How can you achieve this?

4. Why did the attempt to publish an image during step 3 fail?

The application configuration was using the RDS Read Replica. This database is read only, and will not permit write operations.

5. Describe some different ways that you could share an AMI with others.

6. Do the public DNS name and IP address of an instance change during reboot?

No.
