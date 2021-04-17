<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', url('/'));
});

Breadcrumbs::for('product', function ($trail, $product) {
    $trail->parent('home');
    $trail->push(ucwords($product->name), url('/'.$product->slug));
});

Breadcrumbs::for('shop', function ($trail, $category) {
    $trail->parent('home');
    $trail->push('Shop');
    $trail->push(ucfirst($category->title), url('shop', $category->slug));
});

Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', url('blog'));
});

Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('blog');
    $trail->push('Post');
    $trail->push(ucfirst($post->title), url('post', $post->slug));
});

Breadcrumbs::for('help', function ($trail) {
    $trail->parent('home');
    $trail->push('Help', url('help'));
});

Breadcrumbs::for('privacy_policy', function ($trail) {
    $trail->parent('home');
    $trail->push('Privacy Policy', url('privacy_policy'));
});

Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('home');
    $trail->push('Cart', url('cart'));
});

Breadcrumbs::for('checkout', function ($trail) {
    $trail->parent('home');
    $trail->push('Checkout', url('checkout'));
});

Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('Contact Us', url('contact'));
});

Breadcrumbs::for('compare', function ($trail) {
    $trail->parent('home');
    $trail->push('Compare', url('compare'));
});

Breadcrumbs::for('my-account', function ($trail) {
    $trail->parent('home');
    $trail->push('My-Account');
    $section = ucfirst(request()->segment(2));
    $trail->push($section, url('my-acount/', $section));
});

Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
   $trail->push('Sign In', url('login'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
   $trail->push('Register', url('reg'));
});

Breadcrumbs::for('verify', function ($trail) {
    $trail->parent('home');
   $trail->push('Verify', url('verify'));
});

Breadcrumbs::for('sitemap', function ($trail) {
    $trail->parent('home');
   $trail->push('Sitemap', url('sitemap'));
});