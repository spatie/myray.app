<?php

it('can show the docs index page', function () {
    $this->get('/docs')
        ->assertStatus(200)
        ->assertSee('Docs');
});

it('can show a detail page', function () {
    $this->get('/docs/integrations/laravel/installation')
        ->assertStatus(200)
        ->assertSee('Docs');
});

it('can redirect from a category slug to the first item', function () {
    $this->get('/docs/integrations/laravel')
        ->assertStatus(302)
        ->assertRedirectToRoute('docs.show', 'integrations/laravel/installation');
});
