<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(SectionLookupsTableSeeder::class);
        $this->call(LookupsTableSeeder::class);
        $this->call(SiteSettingsTableSeeder::class);
        $this->call(ValidationSectionsTableSeeder::class);
        $this->call(ValidationsTableSeeder::class);
        $this->call(DefaultCompaniesTableSeeder::class);
        $this->call(BusinessHoursTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(IconsTableSeeder::class);
        $this->call(TemplatesTableSeeder::class);
        $this->call(CmsTemplatesTableSeeder::class);
        $this->call(CmsPagesTableSeeder::class);
        $this->call(CmsComponentsTableSeeder::class);
        $this->call(ComponentPagesTableSeeder::class);
        $this->call(CmsMenusTableSeeder::class);
        $this->call(CmsPostsTableSeeder::class);
        $this->call(CmsFilesTableSeeder::class);
        $this->call(ZipCodesTableSeeder::class);
        // $this->call(CouponsTableSeeder::class);

        // product
        $this->call(CompaniesTableSeeder::class);

        $this->call(ColorsTableSeeder::class);

        $this->call(SizesTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);

        $this->call(BrandsTableSeeder::class);

        $this->call(ProductsTableSeeder::class);


        $this->call(ProductCategoriesTableSeeder::class);

        $this->call(ProductSizesTableSeeder::class);

        $this->call(ProductColorsTableSeeder::class);

        $this->call(InventoriesTableSeeder::class);

        $this->call(PackageTypesTableSeeder::class);

        $this->call(PackagePricesTableSeeder::class);

        $this->call(PackagePriceItemsTableSeeder::class);


        $this->call(AccountHeadsTableSeeder::class);
        $this->call(AccountSubHeadsTableSeeder::class);
        $this->call(AccountSubHeadItemsTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(FaqRepliesTableSeeder::class);
        $this->call(PreferredTimesTableSeeder::class);
    }
}
