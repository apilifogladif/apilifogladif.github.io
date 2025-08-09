<?php

use Illuminate\Support\Str;

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Filipa Fidalgo',
    'siteDescription' => 'Master\'s Student in Artificial Intelligence and AI Developer Analyst',

    // Add this line to explicitly define the source path
    'source' => 'source',

    // Algolia DocSearch credentials
    'docsearchApiKey' => '',
    'docsearchIndexName' => '',

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // Personal Information - centralized data
    'personalInfo' => [
        'name' => 'Filipa Fidalgo',
        'age' => 21,
        'location' => 'Porto, Portugal',
        'email' => 'filipajacobfidalgo@gmail.com',
        'github' => 'apilifogladif',
        'linkedin' => 'filipa-fidalgo-a28a48247',
        'cv' => 'assets/files/Filipa Fidalgo.pdf',
    ],

    // Collections
    'collections' => [
        'education' => [
            'path' => '_information/education/{filename}',
            'sort' => 'order',
            'sortDirection' => 'asc',
        ],
        'projects' => [
            'path' => '_information/projects/{filename}',
            'sort' => 'year',
            'sortDirection' => 'desc'
        ],
        'skills' => [
            'path' => 'source/_information/skills/{filename}',
            'section' => 'content',
            'sort' => 'proficiency',
            'sortDirection' => 'desc',
            'isPublic' => true,
            'extends' => '_layouts.skill'
        ],
        'languages' => [
            'path' => '_information/languages/{filename}',
            'sort' => 'proficiency',
            'sortDirection' => 'desc'
        ],
        'activities' => [
            'path' => '_information/activities/{filename}',
            'sort' => 'year',
            'sortDirection' => 'desc'
        ],
        'experience' => [
            'path' => '_information/experience/{filename}',
            'sort' => 'order',
            'sortDirection' => 'asc'
        ],
    ],

    // helpers
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return Str::startsWith($path, 'http') ? $path : '/' . trimPath($path);
    },
];
