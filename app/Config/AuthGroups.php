<?php

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'user';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * The available authentication systems, listed
     * with alias and class name. These can be referenced
     * by alias in the auth helper:
     *      auth('api')->attempt($credentials);
     */
    public array $groups = [
        'superadmin' => [
            'title'       => 'Super Admin',
            'description' => 'Complete control of the site.',
        ],
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'developer' => [
            'title'       => 'Developer',
            'description' => 'Site programmers.',
        ],
        'staffadmin' => [
            'title'       => 'staffadmin',
            'description' => 'administrasi sales.',
        ],
        'gudang' => [
            'title'       => 'Gudang',
            'description' => 'administrasi gudang.',
        ],
        'purchasing' => [
            'title'       => 'Purchasing',
            'description' => 'administrasi purchasing.',
        ],
        'pimpinan' => [
            'title'       => 'Pimpinan',
            'description' => 'full access to read.',
        ],
        'user' => [
            'title'       => 'Users',
            'description' => 'full access to read.',
        ],
        'beta' => [
            'title'       => 'Beta User',
            'description' => 'Has access to beta-level features.',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system. Each system is defined
     * where the key is the
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access'        => 'Can access the sites admin area',
        'admin.settings'      => 'Can access the main site settings',
        'users.manage-admins' => 'Can manage other admins',
        'users.create'        => 'Can create new non-admin users',
        'users.edit'          => 'Can edit existing non-admin users',
        'users.delete'        => 'Can delete existing non-admin users',
        'item.access'        => 'Can access the sites item area',
        'item.create'        => 'Can create new item',
        'item.edit'          => 'Can edit existing item',
        'item.delete'        => 'Can delete existing item',
        'beta.access'         => 'Can access beta-level features',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'users.*',
            'beta.*',
            'item.*',
            //'sales_order.*',
            //'purchasing_order.*'
        ],
        'admin' => [
            'admin.access',
            'item.access',
            'users.create',
            'users.edit',
            'users.delete',
            'beta.access',
        ],
        'developer' => [
            'admin.access',
            'admin.settings',
            'users.create',
            'users.edit',
            'beta.access',
        ],
        'user' => [],
        'staffadmin' => [],
        'gudang' => [
            'item.access',
            'item.create',
            'item.edit',
        ],
        'purchasing' => [
            'item.access',
            'item.create',
            'item.edit',

        ],
        'pimpinan' => [],
        'beta' => [
            'beta.access',
        ],
    ];
}