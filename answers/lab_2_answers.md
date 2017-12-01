### 1. What is a DB subnet group?

A DB subnet group is simply a set of subnets that are designated for usage by RDS instances.

[http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/USER_VPC.WorkingWithRDSInstanceinaVPC.html#USER_VPC.Subnets](http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/USER_VPC.WorkingWithRDSInstanceinaVPC.html#USER_VPC.Subnets)

### 2. What is multi-AZ? Is it used for increased capacity or availability? Are there different endpoints for each database instance in a multi-AZ configuration?

A multi-AZ deployment maintains a replicated standby DB instance in a different availability zone. This standby instance is on physically distinct infrastructure to guard against failure of an entire availability zone. Multi-AZ configurations are used to increase availability, **not** capacity. When you set up multi-AZ, you still only have a single RDS endpoint. This endpoint is transparently failed-over to the standby DB instance in the event of a problem.

[https://aws.amazon.com/rds/details/multi-az/](https://aws.amazon.com/rds/details/multi-az/)

### 3. There was an option for configuring a parameter group. This option was left at its default value. Explain what a parameter group is.

A DB Parameter Group is a set of configuration values for a database engine. Parameter groups are useful because they can be applied to multiple database instances. This saves time during initial configuration, and it also allows for changes to be made more quickly across an environment. For example: if a parameter must change, it can be changed across all of the RDS Instances that use the parameter group.

[http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/USER_WorkingWithParamGroups.html](http://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/USER_WorkingWithParamGroups.html)

### 4. Do you have any access to the underlying operating system of an RDS instance?

No. The underlying infrastructure for an RDS instance is entirely managed by AWS.
