<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Topic</title>
</head>
<body>
<header>
   <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="topic.html">IPV4 vs IPV6</a></li>
        <li><a href="quiz.html">Quiz</a></li>
        <li><a href="enhancements.html">Enhancements</a></li>
      </ul>
</header>
<div class="scroll-container">
    <br>
    <h1 class="center-aligned">IPV4 vs IPV6</h1>
    <br>

    <div class="grid-container">
      <div class="grid-item">
        <div class="card">
          <div class="container">
            <h2 id="What-is-an-IP-address?">What is an IP address?</h2>
            <p>An IP address is a unique address that represent a unique device on a local network or on the internet. IP address refers to internet protocol and there are rules regarding to the IP nomenclature and the for the behavior of it. IP addresses are crucial in data transferring one device to the another as it stand as the identifier for the particular device in a large network. IP address contain the location and it makes easier for the communication process. In this world of devices connected to internet, there should a way to differentiate the devices to pass the data and information without any disturbances. </p>
          </div>
        </div>
      </div>
      <div class="grid-item">
        <div class="card">
          <div class="container">
            <h2 id="What-is-IPV4?">What is IPV4?</h2>
            <p>IPV4 is known as internet protocol version 4. It is the backbone of the networking science which make possible to connect the user to the internet via an electronic device. When a device wants to access the internet, it assigns to a numerical code named IP address such as 255.255.255.254. In here data packet is the smallest part of data which transfer between 2 or more devices via a relevant network to communicate among themselves.</p>  
          </div>
        </div>
      </div>
      <div class="grid-item">
        <div class="card">
          <div class="container">
            <h2 id="What-is-an-IPV6?">What is an IPV6?</h2>
            <p>IPv6 is the next-generation Internet Protocol (IP) standard that will eventually replace IPv4, which is still used by many Internet services. In order to communicate with other devices, each and every computer, mobile phone, and other device connected to the Internet requires an IP address. 
              IPv6 was first published as a draught standard in 1998, and then as an Internet Standard in 2017. Eight groups of four hexadecimal numbers are used to represent it, with colons separating each group. It also improves and implements hierarchical address allocation methods, extending the routing capabilities and limiting the size of routing tables. A few key aspects of IPv6 are listed below:
          </p>
          <ol>
                  <li>It allows for the storage of an endless number of IP addresses and is a good choice for interacting with neighbouring nodes.</li>
                  <li>It has a lot of features for both state-full and state-less settings.</li>
                  <li>It improves the infrastructure for hierarchical addressing.</li>
              </ol>
          </div>
        </div>
      </div>
    </div>
<br>
<hr>
    <h2 id="What-is-the-difference-between-IPV4-and-IPV6">What is the difference between IPV4 and IPV6</h2>
    <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Points of Difference</th>
        <th scope="col">IPV4</th>
        <th scope="col">IPV6</th>
      </tr>
    </thead>

    <tr>
    <td><strong>Compatibility with Mobile Devices</strong></td>
    <td>The use of dot-decimal notations is addressed, making it less suited for mobile networks.</td>
    <td>Hexadecimal colon-separated notations are used for addresses, making it better suited to mobile networks.</td>
    </tr>
    <tr>
    <td><strong>Mapping</strong></td>
    <td>To map to MAC addresses, the Address Resolution Protocol is employed.</td>
    <td>To map to a MAC address, the Neighbor Discovery Protocol is employed.</td>
    </tr>
    <tr>
    <td><strong>Dynamic Host Configuration Server</strong></td>
    <td>Clients must approach Dynamic Host Configuration Servers when connecting to a network.</td>
    <td>Clients are given permanent addresses and are not obligated to communicate with any specific server.</td>
    </tr>
    <tr>
    <td><strong>Internet Protocol Security</strong></td>
    <td>It is optional.</td>
    <td>It is mandatory.</td>
    </tr>
    <tr>
    <td><strong>Optional Fields</strong></td>
    <td>Present</td>
    <td>Absent. Instead of that, Extension headers are available.</td>
    </tr>
    <tr>
    <td><strong>Local Subnet Group Management</strong></td>
    <td>Uses Internet Group Management Protocol.</td>
    <td>Uses Multicast Listener Discovery or MLD.</td>
    </tr>
    <tr>
    <td><strong>IP to MAC resolution</strong></td>
    <td>For Broadcasting ARP.</td>
    <td>For Multicast Neighbor Solicitation.</td>
    </tr>
    <tr>
    <td><strong>Address Configuration</strong></td>
    <td>It is done manually or via DHCP.</td>
    <td>It uses stateless address autoconfiguration using the Internet Control Message Protocol or DHCP6.</td>
    </tr>
    <tr>
    <td><strong>DNS Records</strong></td>
    <td>Records are in Address (A).</td>
    <td>Records are in Address (AAAA).</td>
    </tr>
    <tr>
    <td><strong>Packet Header</strong></td>
    <td>Packet flow for QoS handling is not identified. This includes checksum options.</td>
    <td>Flow Label Fields specify packet flow for QoS handling.</td>
    </tr>
    <tr>
    <td>
    <strong>Packet Fragmentation</strong><strong>           </strong>
    </td>
    <td>Packet Fragmentation is allowed from routers when sending to hosts.</td>
    <td>For sending to hosts only.</td>
    </tr>
    <tr>
    <td><strong>Packet Size</strong></td>
    <td>The minimum packet size is 576 bytes.</td>
    <td>Minimum packet size 1208 bytes.</td>
    </tr>
    <tr>
    <td><strong>Security</strong></td>
    <td>It depends mostly on Applications.</td>
    <td>Has its own Security protocol called IPSec.</td>
    </tr>
    <tr>
    <td><strong>Mobility and Interoperability</strong></td>
    <td>Network topologies are relatively constrained, which restricts mobility and interoperability.</td>
    <td>IPv6 provides mobility and interoperability capabilities which are embedded in network devices</td>
    </tr>
    <tr>
    <td><strong>SNMP</strong></td>
    <td>Support included.</td>
    <td>Not supported.</td>
    </tr>
    <tr>
    <td><strong>Address Mask</strong></td>
    <td>It is used for the designated network from the host portion.</td>
    <td>Not Used</td>
    </tr>
    <tr>
    <td><strong>Address Features</strong></td>
    <td>Network Address Translation is used, which allows a single NAT address to mask thousands of non-routable addresses.</td>
    <td>Direct Addressing is possible because of the vast address space.</td>
    </tr>
    <tr>
    <td><strong>Configuration the Network</strong></td>
    <td>Networks are configured either manually or with DHCP.</td>
    <td>It has autoconfiguration capabilities.</td>
    </tr>
    <tr>
    <td><strong>Routing Information Protocol</strong></td>
    <td>Supports RIP routing protocol.</td>
    <td>IPv6 does not support RIP routing protocol.</td>
    </tr>
    <tr>
    <td><strong>Fragmentation</strong></td>
    <td>It’s done by forwarding and sending routes.</td>
    <td>It is done only by the sender.</td>
    </tr>
    <tr>
    <td><strong>Virtual Length Subnet Mask Support</strong></td>
    <td>Supports added.</td>
    <td>Support not added.</td>
    </tr>
    <tr>
    <td><strong>Configuration</strong></td>
    <td>To communicate with other systems, a newly installed system must be configured first.</td>
    <td>Configuration is optional.</td>
    </tr>
    <tr>
    <td><strong>Number of Classes</strong></td>
    <td>Five Different Classes, from A to E.</td>
    <td>It allows an unlimited number of IP Addresses to be stored.</td>
    </tr>
    <tr>
    <td><strong>Type of Addresses</strong></td>
    <td>Multicast, Broadcast, and Unicast</td>
    <td>Anycast, Unicast, and Multicast</td>
    </tr>
    <tr>
    <td><strong>Checksum Fields</strong></td>
    <td>Has checksum fields, example: 12.243.233.165</td>
    <td>Not present</td>
    </tr>
    <tr>
    <td><strong>Length of Header Filed</strong></td>
    <td>20</td>
    <td>40</td>
    </tr>
    <tr>
    <td><strong>Number of Header fields</strong></td>
    <td>12</td>
    <td>8</td>
    </tr>
    <tr>
    <td><strong>Address Method</strong></td>
    <td>It is a numeric address.</td>
    <td>It is an alphanumeric address.</td>
    </tr>
    <tr>
    <td><strong>Size of Address</strong></td>
    <td>32 Bit IP Address</td>
    <td>128 Bit IP Address</td>
    </tr>
    </tbody></table>
        <br>

<div class="grid-item">
        <div class="card">
          <div class="container">
            <h2 id="Reference">References</h2>
        <p><a href="https://www.internetsociety.org/deploy360/ipv6/&#63;gclid=Cj0KCQjw6J-SBhCrARIsAH0yMZg5FYgph8mExOo2P4hQisEGioqWHmnuRXq8lctlVRM3aMwN3iKnHLIaAtl_EALw_wcB&#37;22&#37;3EInternet" target="blank">Internet Society</a></p>
          </div>
        </div>
      </div>

<footer>
  <div class="grid-item">
        <div class="card">
          <div class="container">
            <h2 id="Contact">Contact me:</h2>
              <p> Contact me:
                <img id="email" src="images/email.jpg" alt="email">
                103597453@student.swin.edu.au
              </p>
          </div>
        </div>
      </div>
</footer>
</div>
</body>
</html>