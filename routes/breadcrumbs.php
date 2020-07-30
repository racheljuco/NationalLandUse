<?php

// Home
Breadcrumbs::for('landing', function ($trail) {
    $trail->push('Home', route('landing'));
});


//Users
Breadcrumbs::for('admin.user.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('Users', route('admin.user.index'));
});

Breadcrumbs::for('admin.user.create', function ($trail) {
    $trail->parent('admin.user.index');
    $trail->push('New User', route('admin.user.create'));
});

Breadcrumbs::for('admin.user.show', function ($trail,$user) {
    $trail->parent('admin.user.index');
    $trail->push("Show / ".ucfirst($user->name), route('admin.user.show',$user->id));
});

Breadcrumbs::for('admin.user.edit', function ($trail,$user) {
    $trail->parent('admin.user.index');
    $trail->push(ucfirst($user->name)." / Edit", route('admin.user.edit',$user->id));
});

Breadcrumbs::for('admin.user.edit_role', function ($trail,$user) {
    $roles = $user->getRoleNames();
    $trail->parent('admin.user.index');
    foreach($roles as $role){

    $trail->push($role, route('admin.user.edit_role',$user->id));

    }
    $trail->push("Edit", route('admin.user.edit_role',$user->id));

});

//Roles

Breadcrumbs::for('admin.role.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('Roles', route('admin.role.index'));
});

Breadcrumbs::for('admin.role.create', function ($trail) {
    $trail->parent('admin.role.index');
    $trail->push('New Role', route('admin.role.create'));
});

Breadcrumbs::for('admin.role.show', function ($trail,$role) {
    $trail->parent('admin.role.index');
    $trail->push('Show / '.$role->name, route('admin.role.create',$role->id));
});

Breadcrumbs::for('admin.role.edit', function ($trail,$role) {
    $trail->parent('admin.role.index');
    $trail->push($role->name.' / Edit', route('admin.role.edit',$role->id));
});




//Permissions

Breadcrumbs::for('admin.permission.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('Permissions', route('admin.permission.index'));
});


Breadcrumbs::for('admin.permission.create', function ($trail) {
    $trail->parent('admin.permission.index');
    $trail->push('New Permission', route('admin.permission.create'));
});


Breadcrumbs::for('admin.permission.show', function ($trail,$permission) {
    $trail->parent('admin.permission.index');
    $trail->push('Show / '.$permission->name, route('admin.permission.show',$permission->id));
});

Breadcrumbs::for('admin.permission.edit', function ($trail,$permission) {
    $trail->parent('admin.permission.index');
    $trail->push($permission->name.' / Edit', route('admin.permission.edit',$permission->id));
});


//Region

Breadcrumbs::for('admin.region.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('regions', route('admin.region.index'));
});


Breadcrumbs::for('admin.region.create', function ($trail) {
    $trail->parent('admin.region.index');
    $trail->push('New region', route('admin.region.create'));
});


Breadcrumbs::for('admin.region.show', function ($trail,$region) {
    $trail->parent('admin.region.index');
    $trail->push('Show / '.$region->name, route('admin.region.show',$region->id));
});

Breadcrumbs::for('admin.region.edit', function ($trail,$region) {
    $trail->parent('admin.region.index');
    $trail->push($region->name.' / Edit', route('admin.region.edit',$region->id));
});



//District

Breadcrumbs::for('admin.district.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('districts', route('admin.district.index'));
});


Breadcrumbs::for('admin.district.create', function ($trail) {
    $trail->parent('admin.district.index');
    $trail->push('New district', route('admin.district.create'));
});


Breadcrumbs::for('admin.district.show', function ($trail,$district) {
    $trail->parent('admin.district.index');
    $trail->push('Show / '.$district->name, route('admin.district.show',$district->id));
});

Breadcrumbs::for('admin.district.edit', function ($trail,$district) {
    $trail->parent('admin.district.index');
    $trail->push($district->name.' / Edit', route('admin.district.edit',$district->id));
});


//Ward

Breadcrumbs::for('admin.ward.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('wards', route('admin.ward.index'));
});


Breadcrumbs::for('admin.ward.create', function ($trail) {
    $trail->parent('admin.ward.index');
    $trail->push('New ward', route('admin.ward.create'));
});


Breadcrumbs::for('admin.ward.show', function ($trail,$ward) {
    $trail->parent('admin.ward.index');
    $trail->push('Show / '.$ward->name, route('admin.ward.show',$ward->id));
});

Breadcrumbs::for('admin.ward.edit', function ($trail,$ward) {
    $trail->parent('admin.ward.index');
    $trail->push($ward->name.' / Edit', route('admin.ward.edit',$ward->id));
});


//Villages

Breadcrumbs::for('admin.village.index', function ($trail) {
    $trail->parent('landing');
    $trail->push('villages', route('admin.village.index'));
});


Breadcrumbs::for('admin.village.create', function ($trail) {
    $trail->parent('admin.village.index');
    $trail->push('New village', route('admin.village.create'));
});


Breadcrumbs::for('admin.village.show', function ($trail,$village) {
    $trail->parent('admin.village.index');
    $trail->push('Show / '.$village->name, route('admin.village.show',$village->id));
});

Breadcrumbs::for('admin.village.edit', function ($trail,$village) {
    $trail->parent('admin.village.index');
    $trail->push($village->name.' / Edit', route('admin.village.edit',$village->id));
});
