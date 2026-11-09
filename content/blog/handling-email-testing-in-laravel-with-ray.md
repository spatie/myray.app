---
title: 'Handling email testing in Laravel with Ray'
date: '2024-05-15T00:00:00.000000Z'
updated_at: '2024-05-16T13:09:10.000000Z'
published: true
summary: 'Testing emails in Laravel has never been easier.'
authors:
  -
    name: Zuzana
    avatar: /media/blog/authors/8a083734e04b5b11002a8716a35be6d8.png
header_image: null
og_image: null
tags:
  - deep-dives
---
Emails are an important aspect of many web applications, and making sure that emails are sent correctly and contain the expected content is essential. Laravel provides convenient tools for sending emails, but testing them effectively can sometimes be challenging. In this article, we'll look into how to use Ray for testing email in Laravel applications.

One of the way to test your email flow might be to use third party tools designed specifically for local email testing.

But there is yet another way - using tools you already have to test emails in Laravel.

[Ray](https://spatie.be/products/ray) is a debugging tool that provides real-time insights into your application's execution flow, and once installed, it pretty much just works. But did you know Ray can also be used to test emails?

Ray reads the content of the log file and displays it in the Ray window. In order to use Ray to test emails in Laravel, make sure you choose `log` as your mailer log in your `.env` file:

```php
MAIL_MAILER=log
```

Let's say we are sending a giveaway entry confirmation to a user. Once we have our mailable created and configured, we will set up a simple test url that will trigger the email. We will also pass in a name variable and expect the value to show in the email:

```php
Route::get('/giveaway-entered', function () {
    $name = "Zuzana";
    Mail::to('zuzana@example.com')->send(new GiveawayEntered($name));
});
```

This is what our email view file might look like:

```php
<h1>Hello, {{ $name }}!</h1>

<p>You have entered the giveaway!</p>

<p>Good luck!</p>

<p>Best regards, <br> The Giveaway Team</p>
```

When we access the route, Ray output will be triggered automatically and it will display our email message:

![](/media/blog/ray/testing-emails-in-laravel-with-ray/ray-giveaway-confirmation.png)

Another use case is the password reset flow. Again, there is no need to configure Ray to capture the email - as long as the `MAIL_MAILER` is set to `log`, it will work automatically.

When the password reset is triggered, this is what Ray displays:

![](/media/blog/ray/testing-emails-in-laravel-with-ray/ray-password-reset.png)

From here, you can click on this link and it will open the password reset form in the browser.



Using Ray to test your emails, you can view email data in real-time, which provides immediate feedback on the email's structure, content, and any variables passed into it. This makes debugging emails in Laravel a breeze.

Check out other Ray functions in the [documentation](https://myray.app/docs/getting-started/introduction).
