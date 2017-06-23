# ip分片的测试


## 基本原理

### 理论知识

  [MTU & MSS](http://blog.csdn.net/leafqing04/article/details/6619225)
  
  
### 代码原理

  在本机服务器A朝远端服务器B发送一个1800字节的数据，由于MTU设置为1500，那么会分成两个字节的包
  
  监控本机的网络，看本机发送的包情况
  
  远端服务器B监听收到的包情况，看最终收到的包
  
  
  
  
## 操作步骤

- 本机执行 php udpclient.php
- 本机执行 tcpdump -i eth0 -nnv host remote_ip
- 远端服务执行 tcpdump -i eth0 -nnv host local_ip