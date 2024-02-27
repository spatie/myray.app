---
menuTitle: Output Formats
title: Outputting specific formats in Ray
weight: 4
---

## Working with JSON

Want to display the JSON representation of anything you'd like in Ray? Use `toJson`. You can provide any value that can
be converted to JSON with [json_encode](https://www.php.net/json_encode).

```php
ray()->toJson(['a' => 1, 'b' => ['c' => 3]]);
```

![screenshot](/screenshots/json.png)

The `toJson` function can also accept multiple arguments.

```php
// all of these will be displayed in Ray
$object = new \stdClass();
$object->company = 'Spatie';

ray()->toJson(
    ['a' => 1, 'b' => ['c' => 3]],
    ['d' => ['e' => 5]],
    $object
);
```

You can send a valid JSON string to Ray with the `json` function.

It will be displayed nicely and collapsable in Ray.

```php
$jsonString = json_encode(['a' => 1, 'b' => ['c' => 3]]);

ray()->json($jsonString);
```

![screenshot](/screenshots/from-json.png)

The `json` function can also accept multiple valid JSON strings.

```php
// all of these will be displayed in Ray
ray()->json($jsonString, $anotherJsonString, $yetAnotherJsonString);
```

## Working with XML

You can send a valid XML string to Ray with the `xml` function.

It will be displayed as formatted XML and collapsable in Ray.

```php
$xmlString = '<one><two><three>3</three></two></one>';

ray()->xml($xmlString);
```

![screenshot](/screenshots/xml.png)

## Working with Carbon instances

[Carbon](https://carbon.nesbot.com/docs/) is a popular datetime package. You can send instances of `Carbon` to Ray with `carbon`.

```php
ray()->carbon(new \Carbon\Carbon());
```

![screenshot](/screenshots/carbon.png)

## Working with files

You can display the contents of any file in Ray with the `file` function.

```php
ray()->file('somefile.txt');
```

## Displaying images

To display an image, call the `image` function and pass a fully-qualified filename, url, or a valid base64-encoded image as its only argument.

```php
ray()->image('https://placekitten.com/200/300');
ray()->image('/home/user/kitten.jpg');

// display base64-encoded images
ray()->image('data:image/png;base64,iVBORw0KGgoAAA…truncated');
ray()->image('iVBORw0KGgoAAA…truncated');
```

## Displaying a link

You can render a clickable link in Ray, by using the `link` (or `url`) methods.

```php
ray()->link('spatie.be'); // we'll assume that you meant `https://spatie.be`
ray()->link('spatie.be', 'Spatie homepage'); // optionally, you can pass a label
ray()->url('myray.app'); // `url` is an alias of `link`
```

## Rendering HTML

To render a piece of HTML directly in Ray, you can use the `html` method.

```php
ray()->html('<b>Bold string<b>');
```

## Displaying text content

To display raw text while preserving whitespace formatting, use the `text` method.  If the text contains HTML, it will be displayed as-is and is not rendered.

```php
ray()->text('<em>this string is html encoded</em>');
ray()->text('  whitespace formatting' . PHP_EOL . '   is preserved as well.');
```
