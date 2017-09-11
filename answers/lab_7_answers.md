1. Explain the differences between an Application Load Balancer and a Classic Load Balancer.

2. What is an internal load balancer?

Internal load balancers are used to distribute traffic within a VPC, and are not reachable from the public Internet. They can be used for load balancing traffic between the private IP addresses of instances within a VPC.

[https://docs.aws.amazon.com/elasticloadbalancing/latest/classic/elb-internal-load-balancers.html](https://docs.aws.amazon.com/elasticloadbalancing/latest/classic/elb-internal-load-balancers.html)

3. What is the difference between the load balancer protocol and port, and the instance protocol and port?

4. During the lab, you changed the values of several load balancer timers. Explain the purpose of each timer:
    * Response timeout
    * Interval
    * Unhealthy threshold
    * Healthy threshold

5. What is connection draining? Why would it be useful?

6. What type of Route53 record would be necessary to point the zone apex at an elastic load balancer?

An alias record is needed.

[https://docs.aws.amazon.com/Route53/latest/DeveloperGuide/routing-to-elb-load-balancer.html](https://docs.aws.amazon.com/Route53/latest/DeveloperGuide/routing-to-elb-load-balancer.html)