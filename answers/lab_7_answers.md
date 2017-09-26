1. Explain the differences between an Application Load Balancer and a Classic Load Balancer.

Classic Load Balancers operate at layer 4, while Application Load Balancers operate at layer 7. Application Load Balancers provide several advanced features, such as the ability to route requests based on URL.

[https://docs.aws.amazon.com/elasticloadbalancing/latest/classic/introduction.html](https://docs.aws.amazon.com/elasticloadbalancing/latest/classic/introduction.html)

[https://docs.aws.amazon.com/elasticloadbalancing/latest/application/introduction.html](https://docs.aws.amazon.com/elasticloadbalancing/latest/application/introduction.html)

2. What is an internal load balancer?

Internal load balancers are used to distribute traffic within a VPC, and are not reachable from the public Internet. They can be used for load balancing traffic between the private IP addresses of instances within a VPC.

[https://docs.aws.amazon.com/elasticloadbalancing/latest/classic/elb-internal-load-balancers.html](https://docs.aws.amazon.com/elasticloadbalancing/latest/classic/elb-internal-load-balancers.html)

3. What is the difference between the load balancer protocol and port, and the instance protocol and port?

The load balancer protocol and port is the front-end protocol and port that an end user will make a connection to. The instance protocol and port is the back-end protocol and port that the load balancer will connect to. For example, an end user may connect to the ELB over HTTP on port 80. The ELB may load balance this connection to a back-end server over HTTP on port 8080.
[https://docs.aws.amazon.com/elasticloadbalancing/latest/classic/elb-listener-config.html](https://docs.aws.amazon.com/elasticloadbalancing/latest/classic/elb-listener-config.html)

4. During the lab, you changed the values of several load balancer timers. Explain the purpose of each timer:
    * Response timeout
    * Interval
    * Unhealthy threshold
    * Healthy threshold

The response timeout is the amount of time that the load balancer will wait before hearing a response for a health check.
The interval is the number of seconds between health checks.
The unhealthy threshold is the number of consecutive failed health checks before the ELB will mark the instance unhealthy.
The healthy threshold is the number of consecutive successful health checks that must occur before the ELB will mark the instance healthy.

5. What is connection draining? Why would it be useful?

Connection draining allows a load balancer to continue servicing active connections to a load balanced instance when the instances becomes unhealthy or de-registers from the load balancer. It can be useful because it prevents a connection from being unexpectedly terminated when an instance leaves a load balancer. This can provide a better application experience for stateful connections.

[https://docs.aws.amazon.com/elasticloadbalancing/latest/classic/config-conn-drain.html](https://docs.aws.amazon.com/elasticloadbalancing/latest/classic/config-conn-drain.htmls)

6. What type of Route53 record would be necessary to point the zone apex at an elastic load balancer?

An alias record is needed.

[https://docs.aws.amazon.com/Route53/latest/DeveloperGuide/routing-to-elb-load-balancer.html](https://docs.aws.amazon.com/Route53/latest/DeveloperGuide/routing-to-elb-load-balancer.html)