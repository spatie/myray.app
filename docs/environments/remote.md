---
title: Remote Servers
weight: 5
---

When connected to a remote server, Ray will display the output of `ray` calls that happen on your remote server. The output is transferred securely from to server to your local machine via SSH.

To get started, click the "Servers" icon on the top right of the Ray app

![screenshot](/screenshots/remote-1.png)

On this screen you can define a server.

![screenshot](/screenshots/remote-2.png)

When the server is defined, click the connect button.

![screenshot](/screenshots/remote-3.png)

The output of any `ray` calls on the remote server will now be shown.

![screenshot](/screenshots/remote-4.png)

**Note:** if you are connecting to a docker container in a remote server (see [docker configuration](/docs/environments/docker)), you may need to enable `GatewayPorts yes` in server's `/etc/ssh/sshd_config` configuration (remember to restart the sshd daemon in order to apply your changes).
