---
title: 'Expanding objects and array using Ray'
date: '2023-09-13T00:00:00.000000Z'
updated_at: '2023-10-13T13:00:09.000000Z'
published: true
summary: "We've added a new method that makes it easier to inspect the content of objects and arrays."
authors:
  -
    name: Sam
    avatar: /media/blog/authors/d3cf772c6c7a04179d8226d874f95e59.png
  -
    name: Freek
    avatar: /media/blog/authors/a1b4b398630bbd32b77a82cbc37fae9a.png
header_image: null
og_image: null
tags: {}
---
When you send arrays and large objects to Ray, we'll display them beautifully in our app.  Let's send the entire app instance of Laravel to Ray.

```
ray(app());
```

This is what that looks like in Ray.

![](/media/blog/ray/expanding-objects-and-array-using-ray/wel2vqjrnsifgi9ysq3siipa6tz6o02oag85ro66.jpg)



Because that object is huge, we'll display it collapsed. You can click any of the arrows to open up a node and get more details.

In the latest version of Ray, we added the ability to open up nodes programmatically. So, if you're interested in what's in the `reboundCallBacks` property, you can already expand it using the new `expand` method.

```
ray(app())->expand('reboundCallBacks');
```

And now that `reboundCallBacks ` property is automatically opened in Ray, there is no need to manually open it anymore.

![](/media/blog/ray/expanding-objects-and-array-using-ray/ffhq78bqb4kuetqtismiwyq9ickr5mfs3rln9mgd.jpg)



You can also pass multiple keys, and even use dot notation to reach nested nodes.

```
ray(app())->expand('reboundCallbacks', 'extenders.url');
```

![](/media/blog/ray/expanding-objects-and-array-using-ray/ohwujphoeuo97tigsk2eugjyk9lbs37ncycbtxv1.jpg)



This will also work with arrays.

Consider this array:

```
$myArray = [
    'parentKey' => [
        'childKey' => 'childValue',
    ],
    'anotherParentKey' => [
        'anotherChildKey' => 'anotherChildValue',
    ]
];
```

As demonstrated above, you can use `expand` to specify which nodes should be opened in Ray.

```
ray($myArray)->expand('parentKey.childKey');
```

![](/media/blog/ray/expanding-objects-and-array-using-ray/viy9kt5ongobdww7qg8oyialqsze1ytszluwcson.jpg)



Instead of passing a string, you can also pass a number. In that case, Ray will expand all nodes up to that level.

Here's an example that will expand all nodes.

```
ray($myArray)->expand(2);
```

![](/media/blog/ray/expanding-objects-and-array-using-ray/6z0yfjhpoieufgvxtjbzig8z6wm0ukddyfcff7gt.jpg)



A lot of users asked for this feature, so we're happy to have this available in the latest release of Ray.
