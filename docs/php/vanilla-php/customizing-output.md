---
menuTitle: Customizing Output
title: Customizing the output in Ray
weight: 3
---

## Expanding arrays and objects

When sending an array or object to Ray, it will be displayed in a collapsed state.

To open up a node, you can use the `expand` method.

```php
// will open up the first level of nodes
ray($arrayOrObject)->expand();

// will open up the first three levels of nodes
ray($arrayOrObject)->expand(3);

// will open the node with key named `myKey`
ray($arrayOrObject)->expand('myKey');

// open up all nodes with the given names
ray($arrayOrObject)->expand('myKey', 'anotherKey');

// you can use dot notation to expand deeper nodes
ray($arrayOrObject)->expand('myKey.nestedKey');
```

You can also use the `expandAll()` method to expand all levels.

## Using colors

You can colorize things you sent to Ray by using one of the color functions.

```php
ray('this is green')->green();
ray('this is orange')->orange();
ray('this is red')->red();
ray('this is blue')->blue();
ray('this is purple')->purple();
ray('this is gray')->gray();
```

![screenshot](/screenshots/colors.png)

## Using sizes

Ray can display things in different sizes.

```php
ray('small')->small();
ray('regular');
ray('large')->large();
```

![screenshot](/screenshots/sizes.png)

## Adding a label

You can customize the label displayed next to item with the `label` function.

```php
ray(['John', 'Paul', 'George', 'Ringo'])->label('Beatles');
```

![screenshot](/screenshots/labels.png)

## Displaying a table

You can send an associative array to Ray with the `table` function.

```php
ray()->table([
    'First' => 'First value',
    'Second' => 'Second value',
    'Third' => 'Third value',
]);
```

![screenshot](/screenshots/table.png)

As a second argument, you can pass a label that will be displayed next to the table.

```php
ray()->table(['John', 'Paul', 'George', 'Ringo'], 'Beatles');
```

![screenshot](/screenshots/table-label.png)
