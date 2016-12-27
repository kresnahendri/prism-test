<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'shop/product';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['/'] = "admin/report";
$route['admin'] = "auth";

// admin/product routes
$route['admin/product'] = "admin/product";
$route['admin/product/(:num)'] = "admin/product/detail/$1";
$route['admin/product/(:num)/edit'] = "admin/product/update/$1";
$route['admin/product/(:num)/delete'] = "admin/product/delete/$1";

// admin/category routes
$route['admin/category'] = "admin/category";
$route['admin/category/(:num)'] = "admin/category/detail/$1";
$route['admin/category/(:num)/edit'] = "admin/category/update/$1";
$route['admin/category/(:num)/delete'] = "admin/category/delete/$1";

// admin/revies routes
$route['admin/review'] = "admin/review";
$route['admin/review/(:num)'] = "admin/review/detail/$1";
$route['admin/review/(:num)/edit'] = "admin/review/update/$1";
$route['admin/review/(:num)/delete'] = "admin/review/delete/$1";

// admin/supplier routes
$route['admin/supplier'] = "admin/supplier";
$route['admin/supplier/(:num)'] = "admin/supplier/detail/$1";
$route['admin/supplier/(:num)/edit'] = "admin/supplier/update/$1";
$route['admin/supplier/(:num)/delete'] = "admin/supplier/delete/$1";

// admin/customer routes
$route['admin/customer'] = "admin/customer";
$route['admin/customer/(:num)'] = "admin/customer/detail/$1";
$route['admin/customer/(:num)/edit'] = "admin/customer/update/$1";
$route['admin/customer/(:num)/delete'] = "admin/customer/delete/$1";

// admin/sale routes
$route['admin/sale'] = "admin/sale";
$route['admin/sale/(:num)'] = "admin/sale/detail/$1";
$route['admin/sale/(:num)/edit'] = "admin/sale/update/$1";
$route['admin/sale/(:num)/delete'] = "admin/sale/delete/$1";

// admin/purchase routes
$route['admin/purchase'] = "admin/purchase";
$route['admin/purchase/(:num)'] = "admin/purchase/detail/$1";
$route['admin/purchase/(:num)/edit'] = "admin/purchase/update/$1";
$route['admin/purchase/(:num)/delete'] = "admin/purchase/delete/$1";

// shop/product routes
$route['shop'] = "shop/product";
$route['shop/product/(:num)'] = "shop/product/detail/$1";
$route['shop/category/(:num)'] = "shop/product/category/$1";
$route['shop/brand/(:any)'] = "shop/product/brand/$1";

// shop/cart routes
$route['shop/checkout'] = "shop/cart/checkout";

// shop/payment_confirmation
$route['payment-confirmation'] = "shop/payment/confirmation";
