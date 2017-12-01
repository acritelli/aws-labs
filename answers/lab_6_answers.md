### 1. Explain the difference between a simple scaling policy and a scaling policy with steps.

Simple scaling policies require that a scaling activity complete before the ASG is able to respond to additional alarms. Scaling policies with steps are able to respond to additional alarms, even when a scaling activity is occurring. As their name suggests, step policies can also have multiple steps to take different actions. For example, a step policy could be configured to add 1 instance when CPU utilization is between 25% and 50%, 2 instances when it is between 50% and 75%, and 3 instances beyond 75%.

[https://docs.aws.amazon.com/autoscaling/latest/userguide/as-scaling-simple-step.html](https://docs.aws.amazon.com/autoscaling/latest/userguide/as-scaling-simple-step.html)

### 2. What types of notifications can be created for an auto scaling group? Are emails the only option?

An ASG can also be configured to send notifications to Simple Notification Services (SNS) and leverage all of the features that it offers.

[https://docs.aws.amazon.com/autoscaling/latest/userguide/ASGettingNotifications.html](https://docs.aws.amazon.com/autoscaling/latest/userguide/ASGettingNotifications.html)

### 3. When monitoring CPU utilization, you may notice that it takes a few minutes for the metrics to populate. Why is this? Is there a way to enable more frequent logging of performance metrics?

Instances use basic monitoring by default. Basic monitoring sends metric data to CloudWatch every 5 minutes. More frequent metric collection can be enabled by detailed monitoring. This comes with an associated fee, but it will send performance metrics to CloudWatch every 1 minute.

[http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/using-cloudwatch.html](http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/using-cloudwatch.html)

### 4. Where would you go to view the status of the alarms that were created for your ASG?

Alarm status can be viewed in a few places. The ASG page has the "Activity History" and "Instances" sections that will show events associated with the ASG and the health of instances in the ASG. Health checks, metrics, and events can also be sent to CloudWatch and reviewed from the CloudWatch dashboard.

[https://docs.aws.amazon.com/autoscaling/latest/userguide/as-monitoring-features.html](https://docs.aws.amazon.com/autoscaling/latest/userguide/as-monitoring-features.html)

### 5. What happens when a launch configuration is changed on a running ASG? Are instances immediately terminated and recreated with the new launch configuration?

Changing a launch configuration will **not** have any impact on currently running instances. Rather, new instances will be configured according to the launch configured when they are launched by the ASG.

[https://docs.aws.amazon.com/autoscaling/latest/userguide/change-launch-config.html](https://docs.aws.amazon.com/autoscaling/latest/userguide/change-launch-config.html)