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

## Ray as an AI output window

One of the most common use cases is using Ray as an output window for AI agents.

This is especially useful when agents generate:

- HTML and CSS
- UI prototypes
- Mermaid diagrams

Instead of dumping this content into their own terminal window or seperate files, agents can render it directly in Ray.

## Reading and analyzing output

Agents can also read everything displayed in Ray windows. This enables workflows like:

- Analyzing error messages or stack traces
- Reviewing debug output
- Inspecting generated files or intermediate results
- Suggesting fixes based on output
