---
title: MCP server
weight: 10
---

Ray includes a built-in Model Context Protocol (MCP) server that allows AI agents to interact with Ray and lets agents read from Ray, write output to it, and trigger many of the same actions you would normally perform manually inside the app.

## Configuration

The MCP server runs automatically when Ray starts on port **2411**. You can inspect the currently available MCP tools directly from the settings page to see what tools your agents have access to.

The MCP server exposes multiple tools that agents can call, including:

- Reading window contents and debug output
- Sending text, HTML or markdown output to Ray
- Sending notifications
- Clearing messages

![screenshot](/images/screenshots/docs_settings_mcp.png)

## Ray as an AI output window

One of the most common use cases is using Ray as an output window for AI agents. Instead of dumping this content into their own terminal window or seperate files, agents can render it directly in Ray.

This is especially useful when AI agents generate:

- HTML and CSS
- UI prototypes
- ERD/Mermaid diagrams

Ray will try to parse many of the requests to use the most appropriate output format.

![screenshot](/images/screenshots/docs_mcp_mermaid.png)

## Reading and analyzing output

Agents can also access your Ray windows and read everything displayed in them. 

This enables workflows like:

- Analyzing error messages or stack traces
- Reviewing debug output
- Inspecting generated files or intermediate results
- Suggesting fixes based on output

![screenshot](/images/screenshots/docs_mcp_terminal_read.png)
