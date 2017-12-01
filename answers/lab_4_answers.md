### 1. We manually performed all of the above configuration steps after our instance launched. How could this have been performed automatically during the instance provisioning process?

Scripts can be passed as user data to an EC2 instance during provisioning.

[https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/user-data.html](https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/user-data.html)

### 2. How would you obtain the public IP address of your instance while logged into the instance and without using the EC2 console?
    * Hint: This will involve making a web request to a specific URL

The public IP address of an instance is available in the instance metadata, which can be obtained from http://169.254.169.254/latest/meta-data/ At the command line, this URL could be queried by using cURL or wget.

The specific URL for the public IP address would be http://169.254.169.254/latest/meta-data/public-ipv4

[https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-instance-metadata.html#instancedata-data-retrieval](https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-instance-metadata.html#instancedata-data-retrieval)

[https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-instance-metadata.html#instancedata-data-categories](https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-instance-metadata.html#instancedata-data-categories)

### 3. Explain the difference between user data and metadata.

Instance user data includes scripts or configurations that were passed to the instance during launch. Instance metadata is information about the instance, such as the public hostname, AMI, instance ID, or other identifying characteristics about an instance. Both are accessible within an instance after launch, and can be found at http://169.254.169.254/latest/user-data and http://169.254.169.254/latest/meta-data for user data and metadata, respectively.

[https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-instance-metadata.html](https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-instance-metadata.html)

### 4. Consider the following scenario: while working on your instance, you make a mistake and determine that terminating and recreating the instance is the best resolution. The instance has only been on for 5 minutes. How will you be charged?

You will be charged for a full hour for the original instance, and an additional full hour if you create a new instance.

### 5. Does rebooting your instance incur charge for a full hour? In other words, if you reboot a single instance, are you charged for two hours?

No.

[https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-instance-reboot.html](https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-instance-reboot.html)
