<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

route::resource('/admin/users', UserController::class)->names('admin.users');