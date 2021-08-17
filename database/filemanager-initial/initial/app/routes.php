<?php

$routes = [
    ['GET', '/login', 'AuthController@loginForm'],
    ['POST', '/login', 'AuthController@login'],
    ['GET', '/logout', 'AuthController@logout'],
    ['GET', '', 'FilesController@list'],
    ['POST', '/search', 'FilesController@search'],
    ['GET', '/add_file', 'FilesController@addFileForm'],
    ['POST', '/add_file', 'FilesController@addFile'],
    ['GET', '/add_directory', 'FilesController@addDirectoryForm'],
    ['POST', '/add_directory', 'FilesController@addDirectory'],
    ['GET', '/copy_file', 'FilesController@copyFileForm'],
    ['POST', '/copy_file', 'FilesController@copyFile'],
    ['GET', '/move_file', 'FilesController@moveFileForm'],
    ['POST', '/move_file', 'FilesController@moveFile'],
    ['GET', '/copy_directory', 'FilesController@copyDirectoryForm'],
    ['POST', '/copy_directory', 'FilesController@copyDirectory'],
    ['GET', '/move_directory', 'FilesController@moveDirectoryForm'],
    ['POST', '/move_directory', 'FilesController@moveDirectory'],
    ['GET', '/delete_file', 'FilesController@deleteFile'],
    ['GET', '/delete_directory', 'FilesController@deleteDirectory'],
    ['GET', '/edit_file', 'FilesController@editFileForm'],
    ['POST', '/edit_file', 'FilesController@editFile'],
    ['GET', '/add_user', 'UsersController@addUserForm'],
    ['POST', '/add_user', 'UsersController@addUser'],
    ['GET', '/change_password', 'UsersController@changePasswordForm'],
    ['POST', '/change_password', 'UsersController@changePassword']
];
