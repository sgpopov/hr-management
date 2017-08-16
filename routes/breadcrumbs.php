<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Employees
Breadcrumbs::register('employee.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Employees', route('employees.index'));
});

Breadcrumbs::register('employee.create', function ($breadcrumbs) {
    $breadcrumbs->parent('employee.index');
    $breadcrumbs->push('Add new employee', route('employees.create'));
});

Breadcrumbs::register('employee.view', function ($breadcrumbs, $employee) {
    $breadcrumbs->parent('employee.index');
    $breadcrumbs->push($employee->fullname);
});

Breadcrumbs::register('employee.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('employee.index');
    $breadcrumbs->push('Update employee information');
});

// Departments
Breadcrumbs::register('departments.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Departments', route('departments.index'));
});

Breadcrumbs::register('departments.create', function ($breadcrumbs) {
    $breadcrumbs->parent('departments.index');
    $breadcrumbs->push('Add new department');
});

Breadcrumbs::register('departments.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('departments.index');
    $breadcrumbs->push('Update department');
});

// Documents' templates
Breadcrumbs::register('document-templates.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Templates', route('documentTemplates.index'));
});

Breadcrumbs::register('document-templates.create', function ($breadcrumbs) {
    $breadcrumbs->parent('document-templates.index');
    $breadcrumbs->push('Create new template');
});

Breadcrumbs::register('document-templates.view', function ($breadcrumbs, $template) {
    $breadcrumbs->parent('document-templates.index');
    $breadcrumbs->push($template->title);
});

Breadcrumbs::register('document-templates.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('document-templates.index');
    $breadcrumbs->push('Edit template');
});

// Users
Breadcrumbs::register('users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users', route('users.index'));
});

Breadcrumbs::register('users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push('Create new user');
});

Breadcrumbs::register('users.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push('Update user information');
});

// Users roles
Breadcrumbs::register('users-roles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users roles', route('roles.index'));
});

Breadcrumbs::register('users-roles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('users-roles.index');
    $breadcrumbs->push('Create new user role');
});

Breadcrumbs::register('users-roles.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('users-roles.index');
    $breadcrumbs->push('Update');
});
