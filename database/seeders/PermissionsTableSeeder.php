<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Purchasing
            ['id' => 1, 'name' => 'purchasing'],
            ['id' => 2, 'name' => 'view_purchase_request'],
            ['id' => 3, 'name' => 'list_purchase_request'],
            ['id' => 4, 'name' => 'create_purchase_request'],
            ['id' => 5, 'name' => 'edit_purchase_request'],
            ['id' => 6, 'name' => 'submit_purchase_request'],
            // Sales
            ['id' => 7, 'name' => 'sales'],
            ['id' => 8, 'name' => 'view_promotions'],
            ['id' => 9, 'name' => 'list_promotions'],
            ['id' => 10, 'name' => 'create_promotions'],
            ['id' => 11, 'name' => 'edit_promotions'],
            ['id' => 12, 'name' => 'delete_promotions'],
            // Warehouse
            ['id' => 13, 'name' => 'warehouse'],
            ['id' => 14, 'name' => 'view_inventory'],
            ['id' => 15, 'name' => 'list_inventory'],
            ['id' => 16, 'name' => 'create_inventory'],
            ['id' => 17, 'name' => 'edit_inventory'],
            ['id' => 18, 'name' => 'delete_inventory'],
            // Accounting
            ['id' => 19, 'name' => 'accounting'],
            ['id' => 20, 'name' => 'view_accounts'],
            ['id' => 21, 'name' => 'list_accounts'],
            ['id' => 22, 'name' => 'create_accounts'],
            ['id' => 23, 'name' => 'edit_accounts'],
            ['id' => 24, 'name' => 'delete_accounts'],
            ['id' => 25, 'name' => 'view_invoice'],
            ['id' => 26, 'name' => 'list_invoice'],
            ['id' => 27, 'name' => 'create_invoice'],
            ['id' => 28, 'name' => 'edit_invoice'],
            ['id' => 29, 'name' => 'delete_invoice'],
            // Finance
            ['id' => 30, 'name' => 'finance'],
            ['id' => 31, 'name' => 'view_payment'],
            ['id' => 32, 'name' => 'list_payments'],
            ['id' => 33, 'name' => 'create_payments'],
            ['id' => 34, 'name' => 'edit_payments'],
            ['id' => 35, 'name' => 'delete_payments'],
            ['id' => 36, 'name' => 'view_reports'],
            ['id' => 37, 'name' => 'list_reports'],
            ['id' => 38, 'name' => 'create_reports'],
            ['id' => 39, 'name' => 'edit_reports'],
            ['id' => 40, 'name' => 'delete_reports'],
            // Tax
            ['id' => 41, 'name' => 'tax'],
            ['id' => 42, 'name' => 'view_tax_payment'],
            ['id' => 43, 'name' => 'list_tax_payments'],
            ['id' => 44, 'name' => 'create_tax_payments'],
            ['id' => 45, 'name' => 'edit_tax_payments'],
            ['id' => 46, 'name' => 'delete_tax_payments'],
            ['id' => 47, 'name' => 'view_tax_reports'],
            ['id' => 48, 'name' => 'list_tax_reports'],
            ['id' => 49, 'name' => 'create_tax_reports'],
            ['id' => 50, 'name' => 'edit_tax_reports'],
            ['id' => 51, 'name' => 'delete_tax_reports'],
            // Human Resource
            ['id' => 52, 'name' => 'human_resource'],
            ['id' => 53, 'name' => 'view_employees'],
            ['id' => 54, 'name' => 'list_employees'],
            ['id' => 55, 'name' => 'create_employees'],
            ['id' => 56, 'name' => 'edit_employees'],
            ['id' => 57, 'name' => 'delete_employees'],
            ['id' => 58, 'name' => 'view_payroll'],
            ['id' => 59, 'name' => 'list_payroll'],
            ['id' => 60, 'name' => 'create_payroll'],
            ['id' => 61, 'name' => 'edit_payroll'],
            ['id' => 62, 'name' => 'delete_payroll'],
            // General Affairs
            ['id' => 63, 'name' => 'general_affairs'],
            ['id' => 64, 'name' => 'view_office_supplies'],
            ['id' => 65, 'name' => 'list_office_supplies'],
            ['id' => 66, 'name' => 'create_office_supplies'],
            ['id' => 67, 'name' => 'edit_office_supplies'],
            ['id' => 68, 'name' => 'delete_office_supplies'],
            ['id' => 69, 'name' => 'view_facilities'],
            ['id' => 70, 'name' => 'list_facilities'],
            ['id' => 71, 'name' => 'create_facilities'],
            ['id' => 72, 'name' => 'edit_facilities'],
            ['id' => 73, 'name' => 'delete_facilities'],
            // Logistics
            ['id' => 74, 'name' => 'logistics'],
            ['id' => 75, 'name' => 'view_shipping'],
            ['id' => 76, 'name' => 'list_shipping'],
            ['id' => 77, 'name' => 'create_shipping'],
            ['id' => 78, 'name' => 'edit_shipping'],
            ['id' => 79, 'name' => 'delete_shipping'],
            // Account Settings
            ['id' => 80, 'name' => 'account_settings'],
            ['id' => 81, 'name' => 'view_os_menu'],
            ['id' => 82, 'name' => 'view_user_settings'],
            ['id' => 83, 'name' => 'list_user_settings'],
            ['id' => 84, 'name' => 'create_user_settings'],
            ['id' => 85, 'name' => 'edit_user_settings'],
            ['id' => 86, 'name' => 'delete_user_settings'],
        ];

        Permission::insert($permissions);
    }
}
