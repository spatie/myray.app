---
title: Remote debugging
weight: 5
---

When connected to a remote server, Ray will display the output of `ray` calls that happen on your remote server. The output is transferred securely from to server to your local machine via SSH.

## Create a remote connection

To get started, click the "Servers" icon on the top right of the Ray app, or by going to 'Remote server' through the settings.

You can define a new remote connection by clicking the "Add new server" button.

![screenshot](/images/screenshots/docs_settings_remote.png)

When you've entered connection information to your server is defined, click the 'Add server' button. You can now connect with the server.

When Ray can't connect to your server, it will show error information explaining why.

![screenshot](/screenshots/remote-2.png)

When the server is defined, click the connect button.

![screenshot](/screenshots/remote-3.png)

## Connect to your server

Remote servers will always be visible in their seperate window, away from your local debugging output. You can identify this window by looking at the bar at the bottom of the window. Each remote connection has its own separate window.

Any calls made from your remote server will be pushed to this window. There's no difference in functionality between local or remote debugging output.

![screenshot](/screenshots/remote-4.png)

> If you are connecting to a Docker container in a remote server (see [Docker configuration](/docs/environments/docker)), you may need to enable `GatewayPorts yes` in server's `/etc/ssh/sshd_config` configuration. Remember to restart the sshd daemon in order to apply your changes.
