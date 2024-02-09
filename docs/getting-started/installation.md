---
title: Installation
weight: 1
---
# Installation
Ray helps you debug your web application faster and easier. It's a companion app available for Windows, Mac and Linux, and supports common languages and frameworks as PHP, Laravel, WordPress, JavaScript and Node.js.

## Install the Ray application
You can give Ray a try by downloading our free trial. After installing the application, link your app with Ray by installing the right package give it a try by running your first calls. Enjoying Ray? Get full access to the app by purchasing a license.You can give Ray a try by downloading our free trial. After installing the application, link your app with Ray by installing the right package give it a try by running your first calls. Enjoying Ray? Get full access to the app by purchasing a license.

## Connect your application to Ray
To send information from your web application to Ray, you have to install a package. We support common languages and frameworks, and setting them up is simple through a package manager.To send information from your web application to Ray, you have to install a package. We support common languages and frameworks, and setting them up is simple through a package manager.

To send information from your web application to Ray, you have to install a package. We support common languages and frameworks, and setting them up is simple through a package manager.To send information from your web application to Ray, you have to install a package. We support common languages and frameworks, and setting them up is simple through a package manager.

## Sending your first call
To make sure everything is functioning correctly, just send a request to Ray from your application. The ray() command differs by language, but for PHP, you can write the following function and execute it in your application:

```php
ray('Hello world!');
```

```php
namespace App\Http\Front\Controllers;

use App\Domain\Docs\Models\Navigation;

class DocsController
{
    public function index()
    {
        $navigation = Navigation::build();
        $page = $navigation->topCategory->firstPage();

        return view('front.docs.index', compact('page'));
    }

    public function show(string $slug)
    {
        $page = sheets()->collection('docs')->get($slug);

        return view('front.docs.index', compact('page'));
    }
}
```

This will display the following in Ray:

Every time you use Ray, the details of each call will show up in this window. There are various types of calls, each presenting information in useful ways. Some of them are unique for each integration, so make sure to check out the documentation for your integration to see what’s possible.
