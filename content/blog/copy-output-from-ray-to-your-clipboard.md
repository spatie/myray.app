---
title: 'Copy output from Ray to your clipboard'
date: '2023-09-06T00:00:00.000000Z'
updated_at: '2024-03-07T09:36:09.000000Z'
published: true
summary: 'At Spatie, we keep working on Ray continuously. We’re adding small quality-of-life improvements every week. We’re happy to announce that you can now copy logged arrays and objects to your clipboard from Ray.'
authors:
  -
    name: Tim
    avatar: /media/blog/authors/cf964d2af4fefbde315855982cde3a32.png
header_image: null
og_image: null
tags: {}
---
At Spatie, we keep working on Ray continuously. We’re adding small quality-of-life improvements every week. We’re happy to announce that you can now copy logged arrays and objects to your clipboard from Ray.

Previously, copying the output of a variable could be a hassle because Ray outputs it with some extra styling and interactivity. With this update, this should get a lot easier.

If you update to the latest version of the Ray app and PHP package you will now see a copy button on the topright corner. Clicking the button will copy the output to your clipboard.

For example, if you log a variable that looks like this in Ray:

![](/media/blog/ray/copy-output-from-ray-to-your-clipboard/ysmgfn6gvhvsitbpyp7sxgbwy2yyomdougzhgemq.png)



It can be copied to your clipboard like this:

```
array (
  'title' => 'A New Hope',
  'year' => 1977,
  'han_shot_first' => true,
)
```

The output is determined by PHP's `var_export`, and the same limitations as for `var_export` are in place, so more complex variables, like ones with circular references, will not be available to copy.

We hope you enjoy this QoL feature. If you would like to see the copy button expanded to other places in the app, we are happy to hear about your use-case!
