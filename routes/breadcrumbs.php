<?php

// ユーザー一覧
Breadcrumbs::register('people', function ($breadcrumbs) {
    $breadcrumbs->push('ユーザー一覧', route('people.index'));
});

// ユーザー一覧 > {person}
Breadcrumbs::register('person', function ($breadcrumbs, $person) {
    $breadcrumbs->parent('people');
    $breadcrumbs->push($person->name, route('people.show', [$person]));
});

// ユーザー一覧 > {person} > {post}
Breadcrumbs::register('post', function ($breadcrumbs, $person, $post) {
    $breadcrumbs->parent('person', $person);
    $breadcrumbs->push($post->title, route('posts.show', [$person, $post]));
});

// // Home
// Breadcrumbs::register('home', function ($breadcrumbs) {
//     $breadcrumbs->push('Home', route('home'));
// });

// // Home > About
// Breadcrumbs::register('about', function ($breadcrumbs) {
//     $breadcrumbs->parent('home');
//     $breadcrumbs->push('About', route('about'));
// });

// // Home > Blog
// Breadcrumbs::register('blog', function ($breadcrumbs) {
//     $breadcrumbs->parent('home');
//     $breadcrumbs->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::register('category', function ($breadcrumbs, $category) {
//     $breadcrumbs->parent('blog');
//     $breadcrumbs->push($category->title, route('category', $category->name));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::register('post', function ($breadcrumbs, $post) {
//     $breadcrumbs->parent('category', $post->category);
//     $breadcrumbs->push($post->title, route('post', [$post->category->name, $post->id]));
// });