---
title: 'Leveraging the Power of Macros in Ray'
date: '2024-06-11T00:00:00.000000Z'
updated_at: '2024-09-19T12:21:00.000000Z'
published: true
summary: "One of Ray's powerful features you might not have heard of is adding your own logic to it via **macros**. Macros in Ray allow you to define custom methods that can be reused throughout your application, making debugging more efficient and tailored to your needs."
authors:
  -
    name: Tim
    avatar: /media/blog/authors/cf964d2af4fefbde315855982cde3a32.png
header_image: null
og_image: null
tags: {}
---
One of Ray's powerful features you might not have heard of is adding your own logic to it via **macros**. Macros in Ray allow you to define custom methods that can be reused throughout your application, making debugging more efficient and tailored to your needs.

Let’s take a simple example of a macro that adds an uppercase method, which will uppercase the value that is passed to it:

```php
Ray::macro('uppercase', function(string $value) {
    $uppercasedValue = strtoupper($value);

    $this->send($uppercasedValue);

    return $this;
});
```

You can use it like this:

```php
ray()->uppercase('abc'); // Outputs in Ray: ABC
```

This basic example shows how you can extend Ray's functionality with just a few lines of code. The uppercase macro takes a string, converts it to uppercase, and sends the result to Ray. It's a neat trick that can be useful for quick text transformations.

Ok, that’s very cute, but let’s try something more practical: Imagine you often need to debug Orders and OrderLines in your application. Manually formatting this data every time can be tedious and error-prone. This is where macros truly shine, allowing you to encapsulate complex logic in a reusable way.

Below, we created a macro that receives an object of class Order and formats it so it can be used with the [table](https://myray.app/docs/php/vanilla-php/customizing-output#displaying-a-table) method Ray offers.

```php
Ray::macro('order', function(Order $value) {
    $tableData = [
        'Customer' => $value->customer(),
        'Total' => '€' . $value->total(),
        'Orderlines:' => '',
    ];

    $orderLineTableData = collect($value->orderLines)->mapWithKeys(function(OrderLine $line) {
        return [
            ' - ' . $line->product . " (x $line->quantity)" => "€{$line->total()}"
        ];
    })->toArray();

    $tableData = array_merge($tableData, $orderLineTableData);

    $this->table($tableData, "Order  #{$value->orderNumber}");

    return $this;
});

```

This would allow you to use it like this:

```php
ray()->order($order);
```

Which results in the following output in Ray:

<img class="mb-4" src="/media/blog/ray/leveraging-the-power-of-macros-in-ray/ray-macros.png" alt="results in Ray" width="420" />
<br>
 
This is just one example of how you could leverage macros in Ray, but we are sure Ray users can think of countless other great use cases for them.

You can read more about macros in the documentation: [Adding Your Own Ray Functions in PHP](https://myray.app/docs/php/vanilla-php/custom).
